<?php

namespace App\Repositories;

use App\Interfaces\ClientRepositoryInterface;
use App\Models\Client;

class ClientRepository implements ClientRepositoryInterface
{
    public function getAllClients()
    {
        return Client::all();
    }

    public function getClientById($clientId)
    {
        return Client::find($clientId);
    }

    public function createClient(array $data)
    {
        return Client::create($data);
    }

    public function updateClient($clientId, array $data)
    {
        return Client::where('id', $clientId)->update($data);
    }

    public function deleteClient($clientId)
    {
        $client = Client::find($clientId);
        if ($client) {
            $client->delete();
            return true;
        }
        return false;
    }
}