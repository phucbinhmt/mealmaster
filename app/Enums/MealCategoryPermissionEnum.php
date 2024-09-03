<?php

namespace App\Enums;

enum MealCategoryPermissionEnum: string
{
    case View = 'meal_categories.view';
    case Create = 'meal_categories.create';
    case Edit = 'meal_categories.edit';
    case Delete = 'meal_categories.delete';

    public function label(): string
    {
        return match ($this) {
            self::View => 'View Meal Categories',
            self::Create => 'Create Meal Categories',
            self::Edit => 'Edit Meal Categories',
            self::Delete => 'Delete Meal Categories',
        };
    }
}
