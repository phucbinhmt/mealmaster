<?php

namespace App\Services\Contracts;

interface RoleServiceInterface
{
    public function getAllRoles();
    public function createRole($name, $display_name);
    public function getDataTableData();
    public function getRole($id);
    public function updateRole($id, $name, $display_name);
    public function updatePermissions($id, $permissions);
    public function getPermissions($id);
    public function deleteRole($id);
}
