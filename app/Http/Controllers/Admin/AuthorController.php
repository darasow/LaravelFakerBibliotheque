<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\Author\AuthorFormRequest;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    
    public function index()
    {
        // Créer un utilisateur avec mot de passe haché
        // $user = User::create([
        //     'name' => 'dara',
        //     'email' => 'sow1998dara@gmail.com',
        //     'password' => Hash::make('000')
        // ]);
    
        return view('admin.authors.index', ['authors' => Author::paginate(2)]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
        $author = Author::make();
        $author->fill([
            'nom' => 'Sow',
            'prenom' => 'Mamadou Dara',
        ]);
        return view('admin.authors.create', ['author' => $author]);
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorFormRequest $request)
    {
        
        $data = $request->validated();
        $image = $request->validated('image');
        $imagePath = $image->store('authorImg', 'public');
        // dd($imagePath);
        $data['image'] = $imagePath;
        // dd($data);
        $propriete = Author::create($data);

        return to_route("admin.author.index")->with("success", 'Propriete ajouter avec succes');
 
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view("admin.authors.show", ['author'=> $author, 'livres' => $author->livres]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('admin.authors.create', ['author' => $author]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorFormRequest $request, Author $author)
    {
        $data = $request->validated();
        $image = $request->file('image');
    
        if ($image) {
            $oldImagePath = $author->image;
    
            if ($oldImagePath) {
                Storage::disk('public')->delete($oldImagePath);
            }
    
            $imagePath = $image->store('authorImg', 'public');
            $data['image'] = $imagePath;
        }
    
        $author->update($data);
    
        return redirect()->route("admin.author.index")->with("success", 'Auteur modifié avec succès');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $oldImagePath = $author->image;
    
            if ($oldImagePath) {
                Storage::disk('public')->delete($oldImagePath);
            }
        $author->delete();
        return to_route("admin.author.index")->with("success", 'Auteur supprimer avec succes');

    }
}
