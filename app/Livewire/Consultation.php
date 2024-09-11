<?php

namespace App\Livewire;

use App\Models\Consultation as ModelsConsultation;
use App\Models\PasserConsultation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Consultation extends Component
{
    public $patient_id;
    public $diagnostic;

    protected $rules = [
        'patient_id' => 'required|numeric',
        'diagnostic' => 'required|string',
    ];

    public function mount($patient_id)
    {
        $this->patient_id = $patient_id;
    }

    public function consulter()
    {

        $validatedData = $this->validate($this->rules);


        $data = ['diagnostic' => $validatedData['diagnostic']];

        $cons = ModelsConsultation::create($data);

        $idcons = $cons->id;

        $patienid = $this->patient_id;

        $idmedecin = Auth::guard('medecin')->id();
        $data2 = [
            'patient_id' => $patienid,
            'medecin_id' => $idmedecin,
            'consultation_id' => $idcons,

        ];

        PasserConsultation::create($data2);

        return redirect()->back()->with([
            'success' => 'Le diagnostic a etait ajouté avec succes'
        ]);

    }

    public function render()
    {
        return view('livewire.consultation');
    }
}
