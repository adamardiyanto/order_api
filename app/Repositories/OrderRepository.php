<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function getAllOrders()
    {
        return Order::with('client')->get();
    }

    public function getOrderById($orderId)
    {
        return Order::with('client')->find($orderId);
    }

    public function createOrder(array $data)
    {
        return Order::create($data);
    }

    public function updateOrder($orderId, array $data)
    {
        return Order::where('id', $orderId)->update($data);
    }

    public function deleteOrder($orderId)
    {
        $order = Order::find($orderId);
        if ($order) {
            $order->delete();
            return true;
        }
        return false;
    }
}