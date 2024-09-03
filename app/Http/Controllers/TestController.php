<?php

namespace App\Http\Controllers;

use App\Helpers\PermissionHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class TestController extends Controller
{
    public function index()
    {
        foreach (Arr::flatten(PermissionHelper::getPermissions()) as $permission) {
            echo ($permission);
        }
    }
}
