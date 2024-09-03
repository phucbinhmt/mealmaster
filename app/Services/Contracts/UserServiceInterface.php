<?php

namespace App\Services\Contracts;

interface UserServiceInterface
{
    public function getAllUsers();

    public function getUserById($id);

    public function createUser(array $data);

    public function updateUser($id, array $data);

    public function deleteUser($id);

    public function getDataTableData();

    public function changePassword($id, $new_password);
}
