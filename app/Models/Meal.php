<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_path',
        'status',
        'meal_category_id',
    ];

    /**
     * Get the meal category associated with the meal.
     */
    public function mealCategory()
    {
        return $this->belongsTo(MealCategory::class);
    }
}
