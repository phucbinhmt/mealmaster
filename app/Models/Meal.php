<?php

namespace App\Models;

use App\Enums\MealStatusEnum;
use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory, ImageUpload;

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

    protected $casts = [
        'status' => MealStatusEnum::class,
    ];

    /**
     * Get the meal category associated with the meal.
     */
    public function mealCategory()
    {
        return $this->belongsTo(MealCategory::class);
    }

    public function getStatusNameAttribute()
    {
        return $this->status->value;
    }

    public function getCategoryNameAttribute()
    {
        return $this->mealCategory->name;
    }
}
