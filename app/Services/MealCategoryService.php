<?php

namespace App\Services;

use App\Repositories\Contracts\MealCategoryRepositoryInterface;
use App\Services\Contracts\MealCategoryServiceInterface;
use Yajra\DataTables\Facades\DataTables;

class MealCategoryService implements MealCategoryServiceInterface
{
    protected $mealCategoryRepository;

    public function __construct(MealCategoryRepositoryInterface $mealCategoryRepository)
    {
        $this->mealCategoryRepository = $mealCategoryRepository;
    }

    public function getAllMealCategories()
    {
        return $this->mealCategoryRepository->all();
    }

    public function getMealCategory($id)
    {
        return $this->mealCategoryRepository->find($id);
    }

    public function createMealCategory($name)
    {
        return $this->mealCategoryRepository->create(['name' => $name]);
    }

    public function updateMealCategory($id, $name)
    {
        return $this->mealCategoryRepository->update($id, ['name' => $name]);
    }

    public function deleteMealCategory($id)
    {
        $this->mealCategoryRepository->delete($id);
    }

    public function getDataTableData()
    {
        $model = $this->mealCategoryRepository->select(['id', 'name']);
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', function ($mealCategory) {
                return view('datatable.meal-categories-action', compact('mealCategory'));
            })
            ->toJson();
    }
}
