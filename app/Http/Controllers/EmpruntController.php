<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprunt;

class EmpruntController extends Controller
{
    public  function index(){

        return view("emprunts.index", ['emprunts' => Emprunt::paginate(8)]);
    }
}
