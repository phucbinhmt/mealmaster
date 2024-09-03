<?php

namespace App\Enums;

enum UserPermissionEnum: string
{
    case View = 'users.view';
    case Create = 'users.create';
    case Edit = 'users.edit';
    case Delete = 'users.delete';

    public function label(): string
    {
        return match ($this) {
            self::View => 'View Users',
            self::Create => 'Create Users',
            self::Edit => 'Edit Users',
            self::Delete => 'Delete Users',
        };
    }
}
