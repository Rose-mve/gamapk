<?php

namespace App\Http\Controllers;
use App\Models\Fiche_de_paie;
use App\Models\Employee;
use App\Models\User;

use App\Notifications\FicheDePaieCreer;
use Illuminate\Http\Request;

class fiche_de_paieController extends Controller
{
    public function creerFiche_de_paie(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
             'date_fiche_de_paie'=>'required',
             'salaire_brut'=>'required',
             'primes'=>'required',
             'impots'=>'required',
             'securite_sociale'=>'required',
             'autre_retenus'=>'required',
             'salaire_net'=>'required',
             'id_employe'=>'required',
             'statut'=>'nullable|string',



        ]);

       
        
        $Fiche_de_paie = new Fiche_de_paie();
        $Fiche_de_paie->date_fiche_de_paie = $validatedData['date_fiche_de_paie'];
        $Fiche_de_paie->salaire_brut = $validatedData['salaire_brut'];
        $Fiche_de_paie->primes = $validatedData['primes'];
        $Fiche_de_paie->impots = $validatedData['impots'];
        $Fiche_de_paie->securite_sociale = $validatedData['securite_sociale'];
        $Fiche_de_paie->autre_retenus = $validatedData['autre_retenus'];
        $Fiche_de_paie->salaire_net = $validatedData['salaire_net'];
        $Fiche_de_paie->id_employe = $validatedData['id_employe'];
        $Fiche_de_paie->statut = $validatedData['statut'] ?? null;
        
        
        $Fiche_de_paie->save();
        
       /* return response()->json([
            'statut' => true,
            'body' => $Fiche_de_paie
        ]);*/

        return redirect()->route('listeFiche_de_paie')->with('success', 'fiche ajouté avec succès.');
    }
    public function listeFiche_de_paie()
    {
       
        $Fiche_de_paies = Fiche_de_paie::where(function($query) {
            $query->where('statut', '!=', '1')
                  ->orWhereNull('statut');
        })->get();
            return view('remuneration.liste', compact('Fiche_de_paies'));
       /* return response()->json([
            'statut' => true,
            'body' => $Fiche_de_paies
        ]);*/

    }

    public function edite_Fiche_de_paie($id)
    {
        $Fiche_de_paie = Fiche_de_paie::find($id);
        return view('remuneration.modifier', compact('Fiche_de_paie'));

        /*return response()->json([
            'statut' => true,
            'body' => $Fiche_de_paie
        ]);*/
    }

    public function modifier_Fiche_de_paie(Request $request, $id)
    {
        $Fiche_de_paie = Fiche_de_paie::find($id);
        $validatedData = $request->validate([
            'date_fiche_de_paie'=>'required',
            'salaire_brut'=>'required',
            'primes'=>'required',
            'impots'=>'required',
            'securite_sociale'=>'required',
            'autre_retenus'=>'required',
            'salaire_net'=>'required',
            'id_employe'=>'required',
            'statut'=> 'nullable|string',

        ]);

        $Fiche_de_paie->fill($validatedData);

        $Fiche_de_paie->save();
       /* if ($Fiche_de_paie) {
            return response()->json([
                'statut' => true,
                'body' => $Fiche_de_paie,
                'message' => 'Fiche de paie  modifié'
            ]);
        } else {
            return response()->json([
                'statut' => false,
                'message' => 'modification non effectué'
            ], 404);
        }*/
        if ($Fiche_de_paie) {
            return redirect()->route('listeFiche_de_paie')->with('success', 'fiche modifié.');   
        } else {
            return redirect()->route('listeFiche_de_paie')->with('echoue', 'modification non effectué.');
        }



    }


    public function recherche_Fiche_de_paie($matricule)
    {
        $employe = Employee::where('matricule', $matricule)->first();
    
        if ($employe) {
            
            $ficheDePaie = Fiche_de_paie::where('id_employe', $employe->id)->first();
    
            if ($ficheDePaie) {
                return response()->json([
                    'statut' => true,
                    'body' => $ficheDePaie
                ]);
            } else {
                return response()->json([
                    'statut' => true,
                    'message' => 'Fiche de paie non trouvée'
                ], 404);
            }
        } else {
            return response()->json([
                'statut' => false,
                'message' => 'Employé non trouvé'
            ], 404);
        }
    }

    public function archiver_Fiche_de_paie($id)
    {
        $Fiche_de_paie = Fiche_de_paie::find($id);

        $Fiche_de_paie->statut = 1;
        $Fiche_de_paie->save();

        if ($Fiche_de_paie) {
            return redirect()->route('listeFiche_de_paie')->with('success', 'Fiche de paie archivé.');   
        } else {
            return redirect()->route('listeFiche_de_paie')->with('echoue', 'Archivage  non effectué.');
        }


       /* if ($Fiche_de_paie) {
            return response()->json([
                'statut' => true,
                'message' => 'Fiche de paie archivé'
            ]);
        } else {
            return response()->json([
                'statut' => false,
                'message' => 'Archivage  non effectué'
            ], 404);
        }*/


    }

    public function listeFiche_de_paieArchive()
    {
        $Fiche_de_paies = Fiche_de_paie::where('statut', '=', 1)->get();


        if ($Fiche_de_paies) {
            return response()->json([
                'statut' => true,
                'body' => $Fiche_de_paies
            ]);
        } else {
            return response()->json([
                'statut' => false,
                'message' => 'Aucun employé archivé'
            ], 404);
        }

    }
   
    public function formulaireAjoutfichedepaie($id)
{
    $employe = Employee::find($id);
    return view('remuneration.ajout', compact('employe'));
}
   
}
