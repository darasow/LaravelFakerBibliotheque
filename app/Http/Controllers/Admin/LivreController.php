<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\Author;
use App\Http\Requests\Admin\Livre\LivreFormRequest;
use Illuminate\Support\Facades\Storage;


class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.livres.index", ['livres' => Livre::paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $livre = Livre::make();
        $authors = Author::all();
        $livre->fill([
            'titre' => 'C++',
        ]);
        return view('admin.livres.create', ['livre' => $livre, 'authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LivreFormRequest $request)
    {
        $data = $request->validated();
        $image = $request->validated('image');
        $imagePath = $image->store('livreImg', 'public');
        $data['image'] = $imagePath;
        $livre = Livre::create($data);
        return to_route("admin.livre.index")->with("success", 'Livre ajouter avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livre $livre)
    {
        return view("admin.livres.show", ['livre' => $livre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
        return view('admin.livres.create', ['livre' => $livre, 'authors' => Author::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LivreFormRequest $request, Livre $livre)
    {
        $data = $request->validated();
        $image = $request->file('image');
    
        if ($image) {
            $oldImagePath = $livre->image;
            if ($oldImagePath) {
                Storage::disk('public')->delete($oldImagePath);
            }
    
            $imagePath = $image->store('livreImg', 'public');
            $data['image'] = $imagePath;
        }
        $livre->update($data);
        return redirect()->route("admin.livre.index")->with("success", 'Livre modifié avec succes');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre)
    {
        $oldImagePath = $livre->image;
    
            if ($oldImagePath) {
                Storage::disk('public')->delete($oldImagePath);
            }
        $livre->delete();

        return to_route("admin.livre.index")->with("success", 'Livre supprimer avec succes');
    }
}
