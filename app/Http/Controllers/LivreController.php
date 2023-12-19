<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index(){

        return view("livres.index", ['livres' => Livre::paginate(8)]);
    }
    public function show(Livre $livre)
    {
        return view("livres.show", ['livre' => $livre]);
    }
}
