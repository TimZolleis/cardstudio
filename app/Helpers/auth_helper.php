<?php

namespace App\Helpers;

use App\Models\AuthException;
use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;
use LDAP\Connection;

/**
 * @throws AuthException
 */
function isLoggedIn(): bool
{
    return !is_null(getCurrentUser());
}

/**
 * @throws AuthException
 */
function isAdmin(): bool
{
    $user = getCurrentUser();
    if (is_null($user))
        return false;

    return $user->isAdmin();
}

/**
 * @throws AuthException
 */
function login(string $username, string $password): void
{
    $connection = createConnection($username, $password);
    createUserModel($connection, $username);
    session()->set('USER', $username);
}

function logout(): void
{
    session()->remove('USER');
}

/**
 * @throws AuthException
 */
function getCurrentUser(): ?UserModel
{
    $userName = session('USER');
    if (!$userName) {
        return null;
    }

    $connection = createAdminConnection();
    return createUserModel($connection, $userName);
}

/**
 * @throws AuthException
 */
function createUserModel(Connection $ldap, string $username): UserModel
{
    $domain = getenv('ad.domain');
    $result = @ldap_search($ldap, "dc=$domain,dc=local", "(sAMAccountName=$username)");
    if (!$result)
        throw new AuthException('userGone');

    $entries = @ldap_get_entries($ldap, $result);
    if (!$entries)
        throw new AuthException('userGone');

    // Assuming that the user was disabled or deleted since last login
    if (!isset($entries['count']) || $entries['count'] !== 1)
        throw new AuthException('userGone');

    // Beautify data
    $data = [];
    foreach ($entries[0] as $key => $value) {
        if (is_numeric($key)) continue;
        if ($key === 'count') continue;

        $data[$key] = (array)$value;
        unset($data[$key]['count']);
    }

    // Check groups memberships
    helper('group');
    $allGroups = getAllGroups();
    $userGroups = [];

    foreach ($data['memberof'] as $value) {
        foreach ($allGroups as $group) {
            if (str_contains($value, "CN=$group->internalName")) {
                $userGroups[] = $group;
            }
        }
    }

    // Cancel if user is not a member of any user group
    if (!$userGroups) {
        throw new AuthException('noPermissions');
    }

    return new UserModel($username, $data['displayname'][0], $userGroups);
}

/**
 * @throws AuthException
 */
function createAdminConnection(): Connection
{
    return createConnection(getenv('ad.admin.username'), getenv('ad.admin.password'));
}

/**
 * @throws AuthException
 */
function createConnection(string $username, string $password): Connection
{
    $ldap = @ldap_connect(getenv('ad.ldap'));
    if (!$ldap)
        throw new AuthException('noConnection');

    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    // Log in as domain user
    $domain = getenv('ad.domain');
    $bind = @ldap_bind($ldap, "$domain\\$username", $password);
    if (!$bind)
        throw new AuthException('invalidCredentials');

    return $ldap;
}

function handleAuthException(AuthException $exception): RedirectResponse
{
    return redirect('login')->with('error', $exception->getMessage());
}