<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth as at;
use Illuminate\Support\Facades\Hash;
class Auth extends Component
{
    public $matricule;
    public $password;


    protected $rules = [
        'password' => 'required|min:6|string',
        'matricule' => 'required|string|min:8|max:255',
    ];



    public function submit()
    {
    
        
        //KP36A8JB
       // $validatedData = $this->validate($this->rules);
        //dd($validatedData);
    
        if (at::guard('medecin')->attempt([
            'matricule' => $this->matricule,
            'password' => $this->password
        ])) {
            return redirect()->route('medecin.home');
        } else {
            return redirect()->route('medecin.home');

        }


      
    }

    public function render()
    {
        return view('livewire.auth');
    }
}
