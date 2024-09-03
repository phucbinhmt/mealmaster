<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Support\Facades\Hash;
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

    public function getDataTableData()
    {
        $model = $this->userRepository->select(['id', 'employee_code', 'first_name']);
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', function ($user) {
                return view('table-actions.users-action', compact('user'));
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}
