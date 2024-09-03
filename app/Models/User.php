<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Enums\UserStatusEnum;
use App\Enums\GenderEnum;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employee_code',
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'gender',
        'date_of_birth',
        'status',
        'profile_picture_path',
        'email',
        'password',
        'ward_id',
        'district_id',
        'province_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'gender' => GenderEnum::class,
        'status' => UserStatusEnum::class,
    ];

    protected $attributes = [
        'status' => 'inactive',
        'password' => '$2a$10$M7JSCNsUaWs6T6i3FCHWJeltlxHcqMNJA5QG.EC7Pk9b7BbRLZ96a', //123456
    ];

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = Carbon::createFromFormat('d/m/Y', $value);
    }
}
