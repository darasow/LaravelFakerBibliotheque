<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    public function index()
    {
          // Créer un utilisateur avec mot de passe haché
        // $user = User::create([
        //     'name' => 'dara',
        //     'email' => 'sow1998dara@gmail.com',
        //     'password' => Hash::make('000')
        // ]);
        // $pdf = new fpdf();
        return view("authors.index", ['authors'=> Author::paginate(8)]);
    }
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('index');
    }

    public function show(Author $author)
    {
        return view("authors.show", ['author'=> $author, 'livres' => $author->livres]);
    }
}