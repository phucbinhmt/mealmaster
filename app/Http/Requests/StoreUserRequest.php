<?php

namespace App\Http\Requests;

use App\Enums\GenderEnum;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('user');
        return [
            'employee_code' => 'required|string|max:50|unique:users,employee_code,' . $id,
            'role' => 'required|exists:roles,name',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone_number' => 'required|numeric|digits_between:10,15|unique:users,phone_number,' . $id,
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date_format:d/m/Y',
            'profile_picture_path' => 'nullable|image|max:2048',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            // 'password' => 'required|string|min:8|confirmed',
            'ward_id' => 'required|exists:wards,id',
            'district_id' => 'required|exists:districts,id',
            'province_id' => 'required|exists:provinces,id',
        ];
    }
}
