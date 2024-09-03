<?php

namespace App\Services;

use App\Repositories\Contracts\RoleRepositoryInterface;
use App\Services\Contracts\RoleServiceInterface;
use Yajra\DataTables\Facades\DataTables;

class RoleService implements RoleServiceInterface
{
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAllRoles()
    {
        return $this->roleRepository->all();
    }

    public function getRole($id)
    {
        return $this->roleRepository->find($id);
    }

    public function createRole($name, $display_name)
    {
        return $this->roleRepository->create(['name' => $name, 'display_name' => $display_name]);
    }

    public function updateRole($id, $name, $display_name)
    {
        return $this->roleRepository->update($id, ['name' => $name, 'display_name' => $display_name]);
    }

    public function updatePermissions($id, $permissions)
    {
        return $this->roleRepository->updatePermissions($id, $permissions);
    }

    public function getPermissions($id)
    {
        return $this->roleRepository->getPermissions($id);
    }

    public function deleteRole($id)
    {
        $this->roleRepository->delete($id);
    }

    public function getDataTableData()
    {
        $model = $this->roleRepository->select(['id', 'name', 'display_name']);
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', function ($role) {
                return view('table-actions.roles-action', compact('role'));
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}
