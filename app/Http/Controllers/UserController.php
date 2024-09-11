<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function home()
    {
        return view('dashboard');
    }

    public function patient()
    {
        return view('patient');
    }

    public function medecin()
    {
        return view('medecin');
    }

    public function hopital()
    {
     
    }

    public static function generationID()
    {
        $prefix = "DS";
        $lettreAleatoire = ["A", "B", "C", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
        $lettre = $lettreAleatoire[array_rand($lettreAleatoire)]; 
        $num = substr(str_shuffle("0123456789"), 0, 7);
        $annee = date('y');
        return "$prefix$lettre$num$annee";
        
    }

    public static function hospitalID()
    {
        $prefix = "H";
        $num = substr(str_shuffle("ABCDEFGIJKLMNOPQRSTUVWXYZ0123456789"), 0, 8);
        $annee = date('y');
        return "$prefix$annee$num";
        
    }
}
