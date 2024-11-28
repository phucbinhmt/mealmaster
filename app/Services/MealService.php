<?php

namespace App\Services;

use App\Repositories\Contracts\MealRepositoryInterface;
use App\Services\Contracts\MealServiceInterface;
use Yajra\DataTables\Facades\DataTables;

class MealService implements MealServiceInterface
{
    protected $mealRepository;

    public function __construct(MealRepositoryInterface $mealRepository)
    {
        $this->mealRepository = $mealRepository;
    }

    public function getAllMeals()
    {
        return $this->mealRepository->all();
    }

    public function getMeal($id)
    {
        return $this->mealRepository->find($id);
    }

    public function createMeal(array $data)
    {
        $meal =  $this->mealRepository->create($data);
        $imagePath = isset($data['image']) ? $meal->uploadImage($data['image'], 'meals') : '';
        $this->mealRepository->update($meal->id, ['image_path' => $imagePath]);
        return $meal;
    }

    public function updateMeal($id, array $data)
    {
        $meal =  $this->mealRepository->find($id);
        $imagePath = isset($data['image']) ? $meal->uploadImage($data['image'], 'meals') : '';
        $data['image_path'] = $imagePath;
        return $this->mealRepository->update($id, $data);
    }

    public function deleteMeal($id)
    {
        $this->mealRepository->delete($id);
    }

    public function getDataTableData()
    {
        $model = $this->mealRepository
            ->select(['id', 'name', 'description', 'price', 'image_path', 'status', 'meal_category_id'])
            ->with('mealCategory')
            ->get()
            ->map(function ($meal) {
                $meal->category_name = $meal->category_name;
                return $meal;
            });
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('name', function ($meal) {
                return view('datatable.meal-name-block', compact('meal'));
            })
            ->addColumn('status_name', function ($meal) {
                return view('datatable.status-block')->with(['status' => $meal->status_name]);
            })
            ->addColumn('action', function ($meal) {
                return view('datatable.meals-action', compact('meal'));
            })
            ->toJson();
    }
}
