<?php

namespace App\Interfaces;


interface OrderRepositoryInterface
{
    public function getAllOrders();
    public function getOrderById($orderId);
    public function createOrder(array $data);
    public function updateOrder($orderId, array $data);
    public function deleteOrder($orderId);
}