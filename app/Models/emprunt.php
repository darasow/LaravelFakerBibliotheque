<?php

namespace App\Models;

use App\Models\Livre;
use App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emprunt extends Model
{
    use HasFactory;

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
