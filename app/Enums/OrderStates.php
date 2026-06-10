<?php

namespace App\Enums;

enum OrderStates: string
{
    case Pending = 'pending';
    case Completed = 'completed';
}
