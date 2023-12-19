<?php

namespace App\Models;
use App\Models\Livre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom'];

    public function livres()
    {
        return $this->hasMany(Livre::class); // un auteur peut avoir plusieurs livres
    }

    public function getSlug() : string
    {
        return Str::slug($this->nom);
    }
}
