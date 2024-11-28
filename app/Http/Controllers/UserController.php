<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ChangeUserStatusRequest;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateAvatarRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.users');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = $this->userService->createUser($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $user,
            'message' => 'User created successfully.',
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userService->getUserById($id);
        return response()->json([
            'status' => 'success',
            'data' => $user,
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, string $id)
    {
        $user = $this->userService->updateUser($id, $request->all());
        return response()->json([
            'status' => 'success',
            'data' => $user,
            'message' => 'User updated successfully.',
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userService->deleteUser($id);
        return response()->noContent();
    }

    public function changePassword(ChangePasswordRequest $request, string $id)
    {
        $this->userService->changePassword($id, $request->new_password);
        return response()->json([
            'status' => 'success',
            'message' => 'Password changed successfully.',
        ], Response::HTTP_OK);
    }

    public function updateAvatar(UpdateAvatarRequest $request, string $id)
    {
        $this->userService->updateAvatar($id, $request->avatar);
        return response()->json([
            'status' => 'success',
            'message' => 'Avatar updated successfully.',
        ], Response::HTTP_OK);
    }

    public function changeStatus(ChangeUserStatusRequest $request, string $id)
    {
        $this->userService->changeStatus($id, $request->status);
        return response()->json([
            'status' => 'success',
            'message' => 'Status changed successfully.',
        ], Response::HTTP_OK);
    }

    public function data()
    {
        return $this->userService->getDataTableData();
    }
}
