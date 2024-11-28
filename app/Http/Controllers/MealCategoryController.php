<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealCategoryRequest;
use App\Services\MealCategoryService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MealCategoryController extends Controller
{
    private $mealCategoryService;
    public function __construct(MealCategoryService $mealCategoryService)
    {
        $this->mealCategoryService = $mealCategoryService;
    }

    public function index()
    {
        return view('pages.meal-categories');
    }

    public function store(StoreMealCategoryRequest $request)
    {
        $mealCategory = $this->mealCategoryService->createMealCategory($request->name);
        return response()->json([
            'status' => 'success',
            'data' => $mealCategory,
            'message' => "Meal category created successfully",
        ], Response::HTTP_CREATED);
    }

    public function show(string $id)
    {
        $mealCategory = $this->mealCategoryService->getMealCategory($id);
        return response()->json([
            'status' => 'success',
            'data' => $mealCategory,
        ], Response::HTTP_OK);
    }

    public function update(StoreMealCategoryRequest $request, string $id)
    {
        $mealCategory = $this->mealCategoryService->updateMealCategory($id, $request->name);
        return response()->json([
            'status' => 'success',
            'data' => $mealCategory,
            'message' => "Meal category updated successfully",
        ], Response::HTTP_OK);
    }

    public function destroy(string $id)
    {
        $this->mealCategoryService->deleteMealCategory($id);
        return response()->noContent();
    }


    public function data()
    {
        return $this->mealCategoryService->getDataTableData();
    }
}
