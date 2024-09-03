<?php

namespace App\Enums;

enum MealPermissionEnum: string
{
    case View = 'meals.view';
    case Create = 'meals.create';
    case Edit = 'meals.edit';
    case Delete = 'meals.delete';

    public function label(): string
    {
        return match ($this) {
            self::View => 'View Meals',
            self::Create => 'Create Meals',
            self::Edit => 'Edit Meals',
            self::Delete => 'Delete Meals',
        };
    }
}
