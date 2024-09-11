<?php

namespace App\Livewire;

use App\Models\Hopital;
use App\Models\Medecin;
use Livewire\Component;
use App\Models\Affilier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FormMedecin extends Component
{

    public $nom;
    public $postnom;
    public $prenom;
    public $genre;
    public $date;
    public $hopital;
    public $matricule;
    public $specialite;


    protected $rules = [
        'nom' => 'required|min:3|max:255|string',
        'postnom' => 'required|string|min:3|max:255',
        'prenom' => 'required|string|min:3|max:255',
        'genre' => 'required|string|min:3|max:255',
        'date' => 'required|date',
        'hopital' => 'required|string',
        'matricule' => 'required|string|min:3|max:255',
        'specialite' => 'required|string|min:3|max:255',
    ];



    public function submit()
    {

        $validatedData = $this->validate($this->rules);
        $defaultPassword = substr(str_shuffle("ABCDEFGIJKLMNOPQRSTUVWXYZ0123456789@$#"), 0, 8);

        $data = [
            'nom' => $validatedData['nom'],
            'postnom' => $validatedData['postnom'],
            'prenom' => $validatedData['prenom'],
            'genre' => $validatedData['genre'],
            'dateNaissance' => $validatedData['date'],
            'specialite' => $validatedData['specialite'],
            'matricule' => $validatedData['matricule'],
            'password' => Hash::make($defaultPassword),
            'user_id' => Auth::user()->id
        ];

        $medecin = Medecin::create($data);

        $liaison = [
            'medecin_id' => $medecin->id,
            'hopital_id' => $validatedData['hopital'],
        ];

        Affilier::create($liaison);

        $this->nom = '';
        $this->postnom = '';
        $this->prenom = '';
        $this->genre = '';
        $this->date = '';
        $this->hopital = '';
        $this->matricule = '';
        $this->specialite = '';

        return redirect()->back()->with([
            'success' => 'Medecin ajouté avec succes',
            'matricule' => $validatedData['matricule'],
            'password' => $defaultPassword
        ]);
    }

    public function render()
    {
        $hopitaux = Hopital::select('id', 'nom')->orderBy('nom')->get();
        return view('livewire.form-medecin', compact('hopitaux'));
    }
}
