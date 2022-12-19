<?php

declare(strict_types=1);

namespace App\Roles\Http\Controllers;

use App\Base\Http\Controllers\Controller;
use App\Roles\Models\RoleRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private RoleRepositoryInterface $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
//        $this->middleware('auth');
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $limit = $request->get('limit') ?? 20;
            $roles = $this->roleRepository->all((int) $limit);
            return response()->json(['roles' => $roles, 'message' => 'success']);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $roleData = $request->all();
            $this->roleRepository->create($roleData);
            return response()->json(['message' => 'success']);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function find(int $id): JsonResponse
    {
        try {
            $role = $this->roleRepository->find($id);
            return response()->json(['role' => $role, 'message' => 'success']);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function delete(int $id): JsonResponse
    {
        try {
            $result = $this->roleRepository->delete($id);
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
        $roleData = json_decode($request->getContent(), true);
        try {
            $result = $this->roleRepository->update($id, $roleData);
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
