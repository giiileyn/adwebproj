<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index()
    {
        try {
            $clients = Client::all();
            return response()->json($clients, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Clients not found'], 404);
        }
    }

    public function show($id)
    {
        try {
            $client = Client::findOrFail($id);
            return response()->json($client, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Client not found'], 404);
        }
    }

    public function updateStatus(Request $request, $id)
        {
            $client = Client::findOrFail($id);
            $client->status = $request->input('status');
            $client->save();

            return response()->json(['message' => 'Client status updated successfully', 'client' => $client]);
        }

        public function store()
        {
            //add new client parang signup
        }

    
        public function update(Request $request, $id)
        {
            $client = Client::find($id);
            if (!$client) {
                return response()->json(['message' => 'Client not found'], 404);
            }

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:client,username,' . $id,
                'email' => 'required|string|email|max:255|unique:client,email,' . $id,
                'address' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:11',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $client->update($request->all());

            return response()->json(['message' => 'Client updated successfully', 'client' => $client]);
        }
}


