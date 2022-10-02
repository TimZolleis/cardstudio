<!doctype html>
<html lang="<?= service('request')->getLocale(); ?>">
<head>
    <title><?= lang('app.name') ?></title>
    <link rel="icon" href="<?=base_url()?>/icon.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/styles.css">
    <style>
        body{
            background-color: #0B111F;
            overflow: hidden;
        }
    </style>
</head>
<body>
