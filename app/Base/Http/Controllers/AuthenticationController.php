<?php

declare(strict_types=1);

namespace App\Base\Http\Controllers;

use App\Users\Models\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Base\Http\Requests\RegisterRequest;

class AuthenticationController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function authenticate(Request $request): JsonResponse
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = $this->userRepository->getUserByEmail($request->input('email'));

        if (Hash::check($request->input('password'), $user->password)) {
            $apikey = base64_encode(Str::random(40));
            $user = $this->userRepository->find($user->id);
            $user->api_key = $apikey;
            $user->save();

            return response()->json(['status' => 'success', 'api_key' => $apikey]);
        } else {
            return response()->json(['status' => 'fail'], 401);
        }
    }

    public function register(Request $request): JsonResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);
        
        $user = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'document' => $request->get('document'),
            'password' => Hash::make($request->get('password')),
            'role_id' => 2,
            'api_key' => base64_encode(Str::random(40))
        ];

        $this->userRepository->create($user);

        return response()->json(['status' => 'success', 'api_key' => $user['api_key']]);
    }
}
