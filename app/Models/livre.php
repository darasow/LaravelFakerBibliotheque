<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Livre extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'titre'];

    public function author()
    {
        return $this->belongsTo(Author::class); // un livre est creer par un seul auteur
    }


    public function isEmprunter()
    {
        return (($this->emprunter)? "Emprunter" : "Non Emprunter");
    }
}
