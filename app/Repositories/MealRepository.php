<?php

namespace App\Repositories;

use App\Models\Meal;
use App\Repositories\Contracts\MealRepositoryInterface;

class MealRepository extends BaseRepository implements MealRepositoryInterface
{
    public function __construct(Meal $meal)
    {
        parent::__construct($meal);
    }
}
