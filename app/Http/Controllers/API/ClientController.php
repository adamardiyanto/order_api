<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ClientRepositoryInterface;

class ClientController extends Controller
{
    private $clientRepository;
    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        $clients = $this->clientRepository->getAllClients();
        return response()->json($clients);
    }

    public function show($id)
    {
        $client = $this->clientRepository->getClientById($id);
        if ($client) {
            return response()->json($client);
        }
        return response()->json(['message' => 'Client not found'], 404);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $client = $this->clientRepository->createClient($data);
        return response()->json($client, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $client = $this->clientRepository->updateClient($id, $data);
        if ($client) {
            return response()->json($client);
        }
        return response()->json(['message' => 'Client not found'], 404);
    }

    public function destroy($id)
    {
        $deleted = $this->clientRepository->deleteClient($id);
        if ($deleted) {
            return response()->json(['message' => 'Client deleted successfully']);
        }
        return response()->json(['message' => 'Client not found'], 404);
    }
}
