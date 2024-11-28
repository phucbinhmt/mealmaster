<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealRequest;
use App\Services\Contracts\MealServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MealController extends Controller
{
    protected $mealService;

    public function __construct(MealServiceInterface $mealService)
    {
        $this->mealService = $mealService;
    }

    public function index()
    {
        return view('pages.meals');
    }

    public function store(StoreMealRequest $request)
    {
        $meal = $this->mealService->createMeal($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $meal,
            'message' => 'Meal created successfully.',
        ], Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $meal = $this->mealService->getMeal($id);
        return response()->json([
            'status' => 'success',
            'data' => $meal,
        ], Response::HTTP_OK);
    }

    public function update(StoreMealRequest $request, $id)
    {
        $meal = $this->mealService->updateMeal($id, $request->all());
        return response()->json([
            'status' => 'success',
            'data' => $meal,
            'message' => 'Meal updated successfully.',
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $this->mealService->deleteMeal($id);
        return response()->noContent();
    }

    public function data()
    {
        return $this->mealService->getDataTableData();
    }
}
