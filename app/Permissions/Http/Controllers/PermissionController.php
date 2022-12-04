<?php

declare(strict_types=1);

namespace App\Permissions\Http\Controllers;

use App\Base\Http\Controllers\Controller;
use App\Permissions\Models\PermissionRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private PermissionRepositoryInterface $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->middleware('auth');
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $limit = $request->get('limit') ?? 20;
            $permissions = $this->permissionRepository->all((int) $limit);
            return response()->json(['permissions' => $permissions, 'message' => 'success']);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $permissionData = $request->all();
            $this->permissionRepository->create($permissionData);
            return response()->json(['message' => 'success']);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function find(int $id): JsonResponse
    {
        try {
            $permission = $this->permissionRepository->find($id);
            return response()->json(['permission' => $permission, 'message' => 'success']);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function delete(int $id): JsonResponse
    {
        try {
            $result = $this->permissionRepository->delete($id);
            if ($result) {
                return response()->json(['message' => 'success']);
            } else {
                throw new Exception("can't delete");
            }
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $permissionData = json_decode($request->getContent(), true);
        try {
            $result = $this->permissionRepository->update($id, $permissionData);
            if ($result) {
                return response()->json(['message' => 'success']);
            } else {
                throw new Exception("can't update");
            }
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }
}
