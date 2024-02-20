<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Emprunt\EmpruntFormeRequest;
use App\Models\Emprunt;
use App\Models\Livre;
use App\Models\Client;

class EmpruntCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public  function index(){

        return view("admin.emprunts.index", ['emprunts' => Emprunt::paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $emprunt = Emprunt::make();
        $clients = Client::all();
        $livres = Livre::all();
        return view('admin.emprunts.create', ['emprunt' => $emprunt, 'livres' => $livres,"clients" => $clients]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpruntFormeRequest $request)
    {
        
        $data = $request->validated();
        $emprunt = Emprunt::create($data);
        $emprunt->livre->update(['emprunter' => true]);
        dd($emprunt->livre_id);
        return to_route("admin.emprunt.index")->with("success", 'Emprunt effectuez avec succes');

    }

    /**
     * Display the specified resource.
     */

    public function edit(Emprunt $emprunt)
    {
        return view('admin.emprunts.create', ['emprunt' => $emprunt, 'clients' => Client::all(), 'livres' => Livre::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpruntFormeRequest $request, Emprunt $emprunt)
    {
        $data = $request->validated();
        $emprunt->update($data);
        return redirect()->route("admin.emprunt.index")->with("success", 'Emprunt modifié avec succes');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprunt $emprunt)
    {
        $emprunt->delete();

        return to_route("admin.emprunt.index")->with("success", 'Emprunt supprimer avec succes');

    }
}
