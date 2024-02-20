<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Livre;
use App\Http\Requests\Admin\Client\ClientFormRequest;
use Illuminate\Support\Facades\Storage;



class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.clients.index', ['clients' => Client::paginate(8)]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Client::make();
        $client->fill([
            'nom' => 'Diallo',
            'prenom' => 'Youssouf',
        ]);
        return view('admin.clients.create', ['client' => $client]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientFormRequest $request)
    {
        $data = $request->validated();
        $image = $request->validated('image');
        $imagePath = $image->store('clientImg', 'public');
        $data['image'] = $imagePath;
        $client = Client::create($data);
        return to_route("admin.client.index")->with("success", 'Client ajouter avec succes');
 
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
       $livres = Livre::whereIn('id', $client->emprunts->pluck('livre_id'))->get();
       return view("admin.clients.show", ['client' => $client, 'livres' => $livres]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('admin.clients.create', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientFormRequest $request, Client $client)
    {
        $data = $request->validated();
        $image = $request->file('image');
    
        if ($image) {
            $oldImagePath = $client->image;
    
            if ($oldImagePath) {
                Storage::disk('public')->delete($oldImagePath);
            }
    
            $imagePath = $image->store('clientImg', 'public');
            $data['image'] = $imagePath;
        }
    
        $client->update($data);
    
        return redirect()->route("admin.client.index")->with("success", 'Client modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $oldImagePath = $client->image;
    
            if ($oldImagePath) {
                Storage::disk('public')->delete($oldImagePath);
            }
        $client->delete();

        return to_route("admin.client.index")->with("success", 'Client supprimer avec succes');
    }
}
