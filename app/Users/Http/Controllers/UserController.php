<?php

declare(strict_types=1);

namespace App\Users\Http\Controllers;

use App\Base\Http\Controllers\Controller;
use App\Users\Models\UserRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('auth');
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $auth = Auth::user();
            $limit = $request->get('limit') ?? 20;
            $users = $this->userRepository->all((int) $limit);
            return response()->json(['users' => $users, 'data' => $auth, 'message' => 'success']);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $userData = $request->all();
            $userData['password'] = Hash::make($userData['password']);
            $this->userRepository->create($userData);
            return response()->json(['message' => 'success']);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function find(int $id): JsonResponse
    {
        try {
            $user = $this->userRepository->find($id);
            return response()->json(['user' => $user, 'message' => 'success']);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function delete(int $id): JsonResponse
    {
        try {
            $result = $this->userRepository->delete($id);
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
        $userData = json_decode($request->getContent(), true);
        $userData['password'] = Hash::make($userData['password']);
        try {
            $result = $this->userRepository->update($id, $userData);
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
