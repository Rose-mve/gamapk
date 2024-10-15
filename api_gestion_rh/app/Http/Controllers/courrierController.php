<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use App\Models\Employee;
use Illuminate\Http\Request;

class courrierController extends Controller
{
    public function demande_Abscence_conge(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'date_du_courrier' => 'required',
            'type_de_courrier' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'motif' => 'required',
            'fichier_justificatif' => 'required',
            'statut' => 'required',
            'id_employe' => 'required',

        ]);

        // Enregistrement de l'employé
        $courrier = new Courrier();
        $courrier->date_du_courrier = $validatedData['date_du_courrier'];
        $courrier->type_de_courrier = $validatedData['type_de_courrier'];
        $courrier->date_debut = $validatedData['date_debut'];
        $courrier->date_fin = $validatedData['date_fin'];
        $courrier->motif = $validatedData['motif'];
        $courrier->statut = $validatedData['statut'];
        $courrier->id_employe = $validatedData['id_employe'];

        $fichier_justificatif = $request->file('fichier_justificatif');
        $fichier_justificatifPath = $fichier_justificatif->store('courriers', 'public');
        $courrier->fichier_justificatif = $fichier_justificatifPath;

        $courrier->save();
        if ($courrier) {

            return response()->json([
                'statut' => true,
                'body' => $courrier
            ]);
        } else {
            return response()->json([
                'statut' => false,
                'message' => 'envois impossible'
            ]);
        }



        //redirect()->route('employes.liste')->with('success', 'Employé ajouté avec succès.');
    }


    public function sanction(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'date_du_courrier' => 'required',
            'type_de_courrier' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'motif' => 'required',
            'type_de_sanction'=>'required',
            'mesure_corrective'=>'required',
            'statut' => 'nullable|string',
            'id_employe' => 'required',

        ]);
       

        
        $courrier = new Courrier();
        $courrier->date_du_courrier = $validatedData['date_du_courrier'];
        $courrier->type_de_courrier = $validatedData['type_de_courrier'];
        $courrier->date_debut = $validatedData['date_debut'];
        $courrier->date_fin = $validatedData['date_fin'];
        $courrier->motif = $validatedData['motif'];
        $courrier->type_de_sanction = $validatedData['type_de_sanction'];
        $courrier->mesure_corrective = $validatedData['mesure_corrective'];
        $courrier->statut = $validatedData['statut'] ?? null;
        $courrier->id_employe = $validatedData['id_employe'];
        
        $courrier->save();
       /* if ($courrier) {

            return response()->json([
                'statut' => true,
                'body' => $courrier
            ]);
        } else {
            return response()->json([
                'statut' => false,
                'message' => 'envois impossible'
            ]);
        }*/


        return redirect()->route('listeFiche_de_courrrier')->with('success', 'sanction envoyé avec succès.');
    }

    public function accepter_demande($id)
    {
        $courrier = Courrier::find($id);

        $courrier->statut = 2;
        $courrier->save();

        if ($courrier) {
            return response()->json([
                'statut' => true,
                'message' => 'demande accepté'
            ]);
        } else {
            return response()->json([
                'statut' => false,
                'message' => 'demande refusé'
            ], 404);
        }


    }
    public function refuser_demande($id)
    {
        $courrier = Courrier::find($id);

        $courrier->statut = 3;
        $courrier->save();

        if ($courrier) {
            return response()->json([
                'statut' => true,
                'message' => 'demande refusé'
            ]);
        } else {
            return response()->json([
                'statut' => false,
                'message' => 'erreur'
            ], 404);
        }


    }
    public function formulaireAjoutSanction($id)
      {
        $employe = Employee::find($id);
        return view('courrier.ajout', compact('employe'));
    
       
       
      }

      
   
      public function listeFiche_de_courrrier()
      {
       $courriers = Courrier::where(function($query) {
           $query->where('statut', '!=', '1')
                 ->orWhereNull('statut');
       })->get();
           return view('courrier.liste', compact('courriers'));
          
      }






}
