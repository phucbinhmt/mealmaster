<?php

namespace App\Repositories;

use App\Repositories\Contracts\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(Role $role)
    {
        parent::__construct($role);
    }

    public function updatePermissions($id, $permissions)
    {
        $role = $this->find($id);
        $role->syncPermissions($permissions);
        return $role;
    }

    public function getPermissions($id)
    {
        $role = $this->find($id);
        return $role->permissions()->pluck('name');
    }
}
