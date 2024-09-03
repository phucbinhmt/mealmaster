<?php

namespace App\Helpers;

use App\Enums\UserPermissionEnum;
use App\Enums\MealPermissionEnum;

class PermissionHelper
{
    public static function getPermissions(): array
    {
        return [
            'User Permissions' => UserPermissionEnum::cases(),
            'Meal Permissions' => MealPermissionEnum::cases(),
            //
        ];
    }
}
