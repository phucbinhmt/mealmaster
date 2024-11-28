<?php

namespace App\Repositories;

use App\Models\MealCategory;
use App\Repositories\Contracts\MealCategoryRepositoryInterface;

class MealCategoryRepository extends BaseRepository implements MealCategoryRepositoryInterface
{
    public function __construct(MealCategory $mealCategory)
    {
        parent::__construct($mealCategory);
    }

    //
}
