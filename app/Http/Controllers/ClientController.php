<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Livre;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view("clients.index", ["clients" => Client::paginate(8)]);
    }
    public function show(Client $client)
    {
        $livres = [];
        foreach ($client->emprunts as $emprunt) {
           $livres[] = Livre::find($emprunt->livre_id);
        }
        return view("clients.show", ['client'=> $client, 'livres' => $livres]);
    }
}
