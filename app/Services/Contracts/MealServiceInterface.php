<?php

namespace App\Services\Contracts;

interface MealServiceInterface
{
    public function getAllMeals();
    public function getMeal($id);
    public function createMeal(array $data);
    public function updateMeal($id, array $data);
    public function deleteMeal($id);
    public function getDataTableData();
}
