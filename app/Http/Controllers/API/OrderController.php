<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller
{
    private $ordersRepository;
    public function __construct(OrderRepositoryInterface $ordersRepository)
    {
        $this->ordersRepository = $ordersRepository;
    }

    public function index()
    {
        $orders = $this->ordersRepository->getAllOrders();
        return response()->json($orders);
    }

    public function show($id)
    {
        $order = $this->ordersRepository->getOrderById($id);
        if ($order) {
            return response()->json($order);
        }
        return response()->json(['message' => 'Order not found'], 404);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $order = $this->ordersRepository->createOrder($data);
        return response()->json($order, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $order = $this->ordersRepository->updateOrder($id, $data);
        if ($order) {
            return response()->json($order);
        }
        return response()->json(['message' => 'Order not found'], 404);
    }

    public function destroy($id)
    {
        $deleted = $this->ordersRepository->deleteOrder($id);
        if ($deleted) {
            return response()->json(['message' => 'Order deleted successfully']);
        }
        return response()->json(['message' => 'Order not found'], 404);
    }
}
