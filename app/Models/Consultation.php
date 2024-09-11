<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    public $fillable = ['diagnostic'];

    // public function users(){
    //     return $this->belongsTo(User::class);
    // }
}
