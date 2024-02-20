<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'image']; // pour indiquer les champs qui sont en l'ecture et ecriture

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }

   

}
