<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affilier extends Model
{
    use HasFactory;
    public $fillable = ['hopital_id', 'medecin_id'];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
