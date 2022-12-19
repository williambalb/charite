<?php

declare(strict_types=1);

namespace App\Users\Http\Controllers\Addresses;

use App\Base\Http\Controllers\Controller;
use App\Users\Models\Addresses\AddressRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    private AddressRepositoryInterface $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
//        $this->middleware('auth');
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $limit = $request->get('limit') ?? 20;
            $addresses = $this->addressRepository->all((int) $limit);
            return response()->json(['addresses' => $addresses, 'message' => 'success']);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $addressData = $request->all();
            $this->addressRepository->create($addressData);
            return response()->json(['message' => 'success']);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function find(int $id): JsonResponse
    {
        try {
            $address = $this->addressRepository->find($id);
            return response()->json(['address' => $address, 'message' => 'success']);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function delete(int $id): JsonResponse
    {
        try {
            $result = $this->addressRepository->delete($id);
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
        $addressData = json_decode($request->getContent(), true);
        try {
            $result = $this->addressRepository->update($id, $addressData);
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
