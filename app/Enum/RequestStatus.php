<?php

namespace App\Enum;
abstract class RequestStatus
{
    public const OPEN = 'OPEN';
    public const PRINTED = 'PRINTED';
    public const PICKED_UP = 'PICKED_UP';
}