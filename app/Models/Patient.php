<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    public $fillable = ['numeroNational','nom', 'postnom', 'prenom', 'genre', 'dateNaissance', 'groupeSanguin', 'poids', 'taille', 'password', 'user_id'];


    public function users(){
        return $this->belongsTo(User::class);
    }


}
