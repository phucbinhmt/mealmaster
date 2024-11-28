<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Support\Facades\Hash;
use Stringable;
use Yajra\DataTables\Facades\DataTables;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->all();
    }

    public function getUserById($id)
    {
        $user = $this->userRepository->find($id);
        $user->role = $user->roles->first();
        unset($user->roles);
        return $user;
    }

    public function createUser(array $data)
    {
        $user =  $this->userRepository->create($data);
        $user->assignRole($data['role']);
        return $user;
    }

    public function updateUser($id, array $data)
    {
        $user = $this->userRepository->update($id, $data);
        $user->syncRoles([$data['role']]);
        return $user;
    }

    public function deleteUser($id)
    {
        $this->userRepository->delete($id);
    }

    public function changePassword($id, $new_password)
    {
        $this->userRepository->update($id, ['password' => Hash::make($new_password)]);
    }

    public function updateAvatar($id, $new_avatar)
    {
        $user = $this->userRepository->find($id);
        $imagePath = $new_avatar ? $user->uploadImage($new_avatar, 'users') : '';
        $this->userRepository->update($id, ['profile_picture_path' => $imagePath]);
    }

    public function changeStatus($id, $new_status)
    {
        $this->userRepository->update($id, ['status' => $new_status]);
    }

    public function getDataTableData()
    {
        $model = $this->userRepository
            ->select(['id', 'employee_code', 'first_name', 'last_name', 'email', 'profile_picture_path', 'status'])
            ->with('roles')
            ->get()
            ->map(function ($user) {
                $user->full_name = $user->full_name;
                $user->position_name = $user->position_name;
                $user->status_name = $user->status_name;
                return $user;
            });
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('full_name', function ($user) {
                return view('datatable.full-name-block', compact('user'));
            })
            ->addColumn('status_name', function ($user) {
                return view('datatable.status-block')->with(['status' => $user->status_name]);
            })
            ->addColumn('action', function ($user) {
                return view('datatable.users-action', compact('user'));
            })
            ->toJson();
    }
}
