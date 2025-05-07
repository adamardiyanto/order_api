<?php

namespace App\Interfaces;

interface ClientRepositoryInterface
{
    public function getAllClients();
    public function getClientById($clientId);
    public function createClient(array $data);
    public function updateClient($clientId, array $data);
    public function deleteClient($clientId);
}
