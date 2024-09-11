<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Medecin extends Model implements Authenticatable
{
    use HasFactory ;
    use AuthenticatableTrait;

    protected $table = 'medecins';

    public $fillable = ['nom', 'postnom',  'prenom', 'genre', 'specialite', 'dateNaissance', 'matricule', 'password', 'user_id'];

    public function users(){
        return $this->belongsTo(User::class);
    }

}




// use Illuminate\Contracts\Auth\Authenticatable;
// use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

// class Medecin extends Model implements Authenticatable
// {
//     use HasFactory ;
//     use AuthenticatableTrait;