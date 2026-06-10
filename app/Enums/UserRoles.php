<?php

namespace App\Enums;

enum UserRoles: string
{
    case Admin = 'admin';
    case Worker = 'worker';
    case Storekeeper = 'storekeeper';
}
