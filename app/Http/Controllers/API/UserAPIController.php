<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Requests\API\CreateUserAPIRequest;
use App\Http\Requests\API\UpdateUserAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserAPIController extends AppBaseController
{
    /**
     * Display a listing of the User.
     * GET /api/users
     */
    public function index(Request $request): JsonResponse
    {
        $query = User::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Users retrieved successfully');
    }

    /**
     * Store a newly created User.
     * POST /api/users
     */
    public function store(CreateUserAPIRequest $request): JsonResponse
    {
        $user = User::create($request->all());
        return $this->sendResponse($user->toArray(), 'User saved successfully');
    }

    /**
     * Display the specified User.
     * GET /api/users/{id}
     */
    public function show(int $id): JsonResponse
    {
        $user = User::find($id);
        if (empty($user)) {
            return $this->sendError('User not found');
        }
        return $this->sendResponse($user->toArray(), 'User retrieved successfully');
    }

    /**
     * Update the specified User.
     * PUT /api/users/{id}
     */
    public function update(int $id, UpdateUserAPIRequest $request): JsonResponse
    {
        $user = User::find($id);
        if (empty($user)) {
            return $this->sendError('User not found');
        }
        $user->fill($request->all())->save();
        return $this->sendResponse($user->toArray(), 'User updated successfully');
    }

    /**
     * Remove the specified User.
     * DELETE /api/users/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $user = User::find($id);
        if (empty($user)) {
            return $this->sendError('User not found');
        }
        $user->delete();
        return $this->sendSuccess('User deleted successfully');
    }
}