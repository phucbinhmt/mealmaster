<?php

namespace App\Services\Contracts;

interface MealCategoryServiceInterface
{
    public function getAllMealCategories();
    public function getMealCategory($id);
    public function createMealCategory($name);
    public function updateMealCategory($id, $name);
    public function deleteMealCategory($id);
    public function getDataTableData();
}
