<?php

declare(strict_types=1);

namespace App\Items\Http\Controllers;

use App\Base\Http\Controllers\Controller;
use App\Items\Models\ItemRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private ItemRepositoryInterface $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
        $this->middleware('auth');
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $limit = $request->get('limit') ?? 20;
            $items = $this->itemRepository->all((int) $limit);
            return response()->json(['items' => $items, 'message' => 'success']);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $itemData = $request->all();
            $this->itemRepository->create($itemData);
            return response()->json(['message' => 'success']);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function find(int $id): JsonResponse
    {
        try {
            $item = $this->itemRepository->find($id);
            return response()->json(['item' => $item, 'message' => 'success']);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Error: ' . $exception->getMessage()]);
        }
    }

    public function delete(int $id): JsonResponse
    {
        try {
            $result = $this->itemRepository->delete($id);
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
        $itemData = json_decode($request->getContent(), true);
        try {
            $result = $this->itemRepository->update($id, $itemData);
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
