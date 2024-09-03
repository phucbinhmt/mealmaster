<?php

namespace App\Repositories\Contracts;

interface RoleRepositoryInterface extends BaseRepositoryInterface
{
    public function updatePermissions($id, $permissions);
    public function getPermissions($id);
}
