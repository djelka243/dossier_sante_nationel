<?php

namespace App\Http\Controllers;

use App\Models\Hopital;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HopitalController extends Controller
{
    public function viewHopital()
    {
        $hopitaux = Hopital::paginate(10);
        return view('hopital', ['hopitaux' => $hopitaux]);
    }
    public function addHopital(Request $request)
    {
        $request->validate([
            'nom' => 'required|min:3|max:255|string',
            'adresse' => 'required|min:3|string',
        ]);

        Hopital::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('success', 'Enregistrement effectué avec succès');
    }

    public function delHopital(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $opp = Hopital::findOrFail($request->id);
        $opp->delete();
        return redirect()->back()->with('msg', 'L\'hopital a été supprimer.');
    }


    public function LinkPatientToHosto(){
        $patients = Patient::paginate(100);
        return view('linkpatienthosto', ['patients' => $patients]);
    }

    public function LinkPatientToMedecin(){
        
        return view('linkpatientmed');
    }
}
