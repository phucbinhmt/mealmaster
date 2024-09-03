<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Services\Contracts\RoleServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleServiceInterface $roleService)
    {
        $this->roleService = $roleService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.roles');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $role = $this->roleService->createRole($request->name, $request->display_name);
        return response()->json([
            'status' => 'success',
            'data' => $role,
            'message' => "Role created successfully",
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = $this->roleService->getRole($id);
        return response()->json([
            'status' => 'success',
            'data' => $role,
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRoleRequest $request, string $id)
    {
        $role = $this->roleService->updateRole($id, $request->name, $request->display_name);
        return response()->json([
            'status' => 'success',
            'data' => $role,
            'message' => "Role updated successfully",
        ], Response::HTTP_OK);
    }

    public function updatePermissions(Request $request, string $id)
    {
        $this->roleService->updatePermissions($id, $request->permissions);
        return response()->json([
            'status' => 'success',
            'message' => "Permissions updated successfully",
        ], Response::HTTP_OK);
    }

    public function getPermissions(string $id)
    {
        $permissions =  $this->roleService->getPermissions($id);
        return response()->json([
            'status' => 'success',
            'data' => $permissions,
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->roleService->deleteRole($id);
        return response()->noContent();
    }

    public function data()
    {
        return $this->roleService->getDataTableData();
    }
}
