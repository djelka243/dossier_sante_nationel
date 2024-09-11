<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hopital extends Model
{
    use HasFactory;

    public $fillable = ['nom', 'adresse', 'user_id'];

    public function users(){
        return $this->belongsTo(User::class);
    }


}
