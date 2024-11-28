<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\MealCategoryController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/test', [TestController::class, 'index'])->name('test');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/users/data', [UserController::class, 'data'])->name('users.data');
Route::put('/users/{user_id}/change-password', [UserController::class, 'changePassword'])->name('users.change-password');
Route::put('/users/{user_id}/update-avatar', [UserController::class, 'updateAvatar'])->name('users.update-avatar');
Route::put('/users/{user_id}/change-status', [UserController::class, 'changeStatus'])->name('users.change-status');
Route::resource('users', UserController::class);

Route::get('/roles/data', [RoleController::class, 'data'])->name('roles.data');
Route::put('/roles/{role_id}/permissions', [RoleController::class, 'updatePermissions'])->name('roles.update-permissions');
Route::get('/roles/{role_id}/permissions', [RoleController::class, 'getPermissions'])->name('roles.permissions');
Route::resource('roles', RoleController::class)->except(['create', 'edit']);

Route::get('/meal-categories/data', [MealCategoryController::class, 'data'])->name('meal-categories.data');
Route::resource('meal-categories', MealCategoryController::class)->except('create', 'edit');

Route::get('/meals/data', [MealController::class, 'data'])->name('meals.data');
Route::resource('meals', MealController::class)->except(['create', 'edit']);

Route::resource('menus', MenuController::class)->except(['create', 'edit']);


Route::get('/provinces', [ProvinceController::class, 'getAllProvinces'])->name('provinces');
Route::get('/provinces/{province_id}/districts', [DistrictController::class, 'getDistrictsByProvinceId'])->name('provinces.districts');
Route::get('/districts/{district_id}/wards', [WardController::class, 'getWardsByDistrictId'])->name('districts.wards');
Route::get('/districts', [DistrictController::class, 'getAllDistricts'])->name('districts');
Route::get('/wards', [WardController::class, 'getAllWards'])->name('wards');
