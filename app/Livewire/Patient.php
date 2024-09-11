<?php

namespace App\Livewire;

use App\Models\Hopital;
use App\Models\Patient as pt;
use Livewire\Component;
use App\Models\affecter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Patient extends Component
{
    public $nom;
    public $postnom;
    public $prenom;
    public $genre;
    public $date;
    public $groupe;
    public $poids;
    public $taille;
    public $hopital;


    protected $rules = [
        'nom' => 'required|min:3|max:255|string',
        'postnom' => 'required|string|min:3|max:255',
        'prenom' => 'required|string|min:3|max:255',
        'genre' => 'required|string|min:3|max:255',
        'date' => 'required|date',
        'groupe' => 'required|string',
        'hopital' => 'required|string',
        'poids' => 'required|integer',
        'taille' => 'required|integer',
    ];


  


    public function submit()
    {

        $validatedData = $this->validate($this->rules);

        $prefix = "DS";
        $lettreAleatoire = ["A", "B", "C", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
        $lettre = $lettreAleatoire[array_rand($lettreAleatoire)];
        $num = substr(str_shuffle("0123456789"), 0, 7);
        $annee = date('y');
        $numNat = "$prefix$lettre$num$annee";
        $defaultPassword = substr(str_shuffle("ABCDEFGIJKLMNOPQRSTUVWXYZ0123456789@$#"), 0, 8);

        $data = [
            'numeroNational' => $numNat,
            'nom' => $validatedData['nom'],
            'postnom' => $validatedData['postnom'],
            'prenom' => $validatedData['prenom'],
            'genre' => $validatedData['genre'],
            'dateNaissance' => $validatedData['date'],
            'taille' => $validatedData['taille'],
            'poids' => $validatedData['poids'],
            'groupeSanguin' => $validatedData['groupe'],
            'password' => Hash::make($defaultPassword),
            'user_id' => Auth::user()->id
        ];

        $patient = pt::create($data);

        $liaison = [
            'patient_id' => $patient->id,
            'hopital_id' => $validatedData['hopital'],
        ];

        affecter::create($liaison);

        $this->nom = '';
        $this->postnom = '';
        $this->prenom = '';
        $this->genre = '';
        $this->date = '';
        $this->groupe = '';
        $this->poids = '';
        $this->taille = '';
        $this->hopital = '';

        return redirect()->back()->with([
            'success' => 'Patient créé avec succès. Merci de lui communiquer ces identifiants pour se connecter avec son application mobile. Le mot de passe est défini par défaut et devra être changé lors de la première connexion.',
            'identifier' => $numNat, 
            'password' => $defaultPassword,
        ]);
        
    }

    public function render()
    {
        $hopitaux = Hopital::select('id', 'nom')->orderBy('nom')->get();
        return view('livewire.patient', compact('hopitaux'));
    }
}
