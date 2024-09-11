<?php

namespace App\Http\Controllers;

use App\Models\affecter;
use App\Models\Affilier;
use App\Models\Hopital;
use App\Models\Medecin;
use App\Models\PasserConsultation;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MedecinController extends Controller
{
    public function viewMedecin()
    {
        $hopitaux = Hopital::all();
        return view('medecin', ['hopitaux' => $hopitaux]);
    }

    public function addMedecin(Request $request)
    {

        $request->validate([
            'nom' => 'required|min:3|max:255|string',
            'postnom' => 'required|min:3|max:255|string',
            'prenom' => 'required|min:3|max:255|string',
            'dateNaissance' => 'required|date',
            'genre' => 'required|min:3|max:255|string',
            'adresse' => 'required|min:3|string',
        ]);

        Medecin::create([
            'nom' => $request->nom,
            'postnom' => $request->postnom,
            'prenom' => $request->prenom,
            'genre' => $request->genre,
            'dateNaissance' => $request->dateNaissance,
            'specialite' => $request->specialite,
            'adresse' => $request->adresse,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('success', 'Enregistrement effectué avec succès');
    }

    public function delMedecin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $opp = Medecin::findOrFail($request->id);
        $opp->delete();
        return redirect()->back()->with('msg', 'Le medecin a été supprimer.');
    }

    public function auth()
    {
        return view('medecin.auth');
    }

    public function medHome()
    {
        return view('medecin.home');
    }

    public function medPatient()
    {
        // $medecinId = Auth::guard('medecin')->id();
        // $patientIds = PasserConsultation::where('medecin_id', $medecinId)->pluck('patient_id')->toArray();
        // $patients = Patient::whereIn('id', $patientIds)->paginate(10);
        // Récupère l'ID du médecin connecté
        // Récupère l'ID du médecin connecté
        $medecinId = Auth::guard('medecin')->id();
        

        // Récupère les IDs des hôpitaux associés au médecin
        $hopitalIds = Affilier::where('medecin_id', $medecinId)->pluck('hopital_id')->toArray();
        
        // Récupère les IDs des patients associés aux hôpitaux du médecin
        $patientIds = Affecter::whereIn('hopital_id', $hopitalIds)->pluck('patient_id')->toArray();

        // Récupère les informations des patients à partir de leurs IDs
        $patients = Patient::whereIn('id', $patientIds)->paginate(100);

        return view('medecin.patient', ['patients' => $patients]);
    }

    public function medLogout()
    {
        Auth::guard('medecin')->logout();
        return redirect()->route('medecin.auth');
    }
}
