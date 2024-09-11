<?php

namespace App\Livewire;

use App\Models\Consultation;
use App\Models\PasserConsultation;
use Livewire\Component;

class Prescription extends Component
{
    public $consultation_id;
    public $prescription;
    public $posologie;
    public $consultations;


    protected $rules = [
        'consultation_id' => 'required|numeric',
        'prescription' => 'required|string',
        'posologie' => 'required|string',
    ];

    public function mount()
    {
        
        $this->loadConsultations();
    }
 

    public function loadConsultations()
    {
      //  $idpatient = PasserConsultation::select('consultation_id')->where('patient_id', )
      //  $this->consultations = Consultation::select('id', 'diagnostic')->where('id', $idpatient)->get();

    }

    public function prescrire()
    {

        $validatedData = $this->validate($this->rules);

        $data = [
            'posologie' => $this->posologie,
            'medicament_prescrit' => $this->prescription,
            'consultation_id' => $this->consultation_id,

        ];

        Prescription::create($data);

        return redirect()->back()->with([
            'success' => 'La prescription a etait établi avec succes'
        ]);

    }
    public function render()
    {
 
        return view('livewire.prescription');
    }
}
