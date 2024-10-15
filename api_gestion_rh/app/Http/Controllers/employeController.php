<?php

namespace App\Http\Controllers;
use App\Models\Contrat;
use App\Models\Employee;

use Illuminate\Http\Request;
use PDF;


class employeController extends Controller
{
   
    public function creerEmploye(Request $request)
    {
        
        // Validation des données du formulaire
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'genre' => 'required|string',
                'profession' => 'required|string|max:255',
                'tel' => 'required|string|max:20',
                'email' => 'required|email|unique:employees,email',
                'photo' => 'required|image|max:2048',
                'date_debut_contrat' => 'required|date',
                'date_fin_contrat' => 'required|date',
                'type_contrat' => 'required|string',
                'salaire' => 'required|numeric',
                'statut' => 'nullable|string',
            ]);

        // Enregistrement de l'employé
        $employee = new Employee();
        $employee->nom = $validatedData['nom'];
        $employee->prenom = $validatedData['prenom'];
         $employee->genre = $validatedData['genre'];
         $employee->profession = $validatedData['profession'];
         $employee->tel = $validatedData['tel'];
         $employee->email = $validatedData['email'];
         
         $employee->statut = $validatedData['statut'] ?? null; 
         $photo = $request->file('photo');
         $photoPath = $photo->store('employees', 'public');
         $employee->photo = $photoPath;

        $employee->save();
         if(!empty($employee->id)){
            Employee::where('id',$employee->id)->update([
                'matricule' =>'GG_RH'.$employee->id,
            ]);
            $contrat = new Contrat();
            $contrat->date_debut_contrat = $validatedData['date_debut_contrat'];
            $contrat->date_fin_contrat = $validatedData['date_fin_contrat'];
            $contrat->type_contrat = $validatedData['type_contrat'];
            $contrat->salaire = $validatedData['salaire'];
            $contrat->id_employe=$employee->id;
    
            $contrat->save();

         }else{
            return redirect()->route('formulaireAjoutemploye')->with('error', 'Une erreur s\'est produite');
         }

       

       /* return response()->json([
            'statut' => true,
            'body' => $employee
        ]);*/

        return redirect()->route('listeemploye')->with('success', 'Employé ajouté avec succès.');


    }

    public function listeEmployes()
   {
    $employees = Employee::where(function($query) {
        $query->where('statut', '!=', '1')
              ->orWhereNull('statut');
    })->get();
        return view('employes.liste', compact('employees'));
        /*  return response()->json([
                'statut' => true,
                'body' => $employees
            ]);*/
    
   }
     public function formulaireAjoutemploye()
      {
    
        return view('employes.ajout');
       
    
      }
   
      

    public function edite_employe($id)
    {
        $employe = Employee::find($id);
        return view('employes.modifier', compact('employe'));

        /*return response()->json([
            'statut' => true,
            'body' => $employee
        ]);*/
    }

    public function modifier_employe(Request $request, $id)
    {
        $employe = Employee::find($id);
        $validatedData = $request->validate([
            /*'nom' => 'required',
            'prenom' => 'required',
            'genre' => 'required',
            'profession' => 'required',
            'matricule' => 'required',
            'tel' => 'required',
            'email' => 'required|email',
            'photo' => 'required|image|max:2048',*/
            'date_embauche' => 'required',
            'date_debut_contrat' => 'required',
            'date_fin_contrat' => 'required',
            'type_contrat' => 'required',
            'salaire' => 'required',
            'statut' => 'nullable|string',
        ]);

        if(!empty($employe)){
            $contrat = new Contrat();
            $contrat->date_debut_contrat = $validatedData['date_debut_contrat'];
            $contrat->date_fin_contrat = $validatedData['date_fin_contrat'];
            $contrat->type_contrat = $validatedData['type_contrat'];
            $contrat->salaire = $validatedData['salaire'];
            $contrat->id_employe=$employe->id;
    
            $contrat->save();

         }else{
            return redirect()->route('edite_employe')->with('error', 'Une erreur s\'est produite');
         }

         return redirect()->route('listeemploye')->with('sucess', 'nouveau contrat etablis');

    }


    public function recherche_employe($matricule)
    {
        $employee = Employee::where('matricule', $matricule)->first();

        if ($employee) {
            return response()->json([
                'statut' => true,
                'body' => $employee
            ]);
        } else {
            return response()->json([
                'statut' => false,
                'message' => 'Employé non trouvé'
            ], 404);
        }
    }

    public function archiver_employe($id)
    {
        $employee = Employee::find($id);

        $employee->statut = 1;
        $employee->save();

        if ($employee) {
            return redirect()->route('listeemploye')->with('success', 'Employé archivé.');
        
        } else {
            return redirect()->route('listeemploye')->with('echoue', 'Archivage  non effectué');
        }


    }

    public function listeEmployesArchive()
    {
        $employees = Employee::where('statut', '=', 1)->get();


        if ($employees) {
            return response()->json([
                'statut' => true,
                'body' => $employees
            ]);
        } else {
            return response()->json([
                'statut' => false,
                'message' => 'Aucun employé archivé'
            ], 404);
        }

    }
    public function genererContrat(Employee $employee, $id)
    {
       
        $employee = Employee::where('id',$id)->first();

        if($employee)
        {
            $contrats = Contrat::where('id_employe',$employee->id)->orderBy('created_at','desc')->take(1)->get()->toArray();

            //dd($contrats->toArray());
        }
       
        //$employee = Employee::with('contrats' )->find($id);


        return view('employes.contrat', compact('employee','contrats'));
       

    }

    public function exporterpdf($id)
    {
        $employee = Employee::find($id);
    
        if (!$employee) {
            return redirect()->back()->with('error', 'Employé non trouvé.');
        }
    
        $contrat = [
            'nom' => $employee->nom,
            'prenom' => $employee->prenom,
            'profession' => $employee->profession,
            'date_embauche' => $employee->date_embauche,
            'date_debut_contrat' => $employee->date_debut_contrat,
            'date_fin_contrat' => $employee->date_fin_contrat,
            'type_contrat' => $employee->type_contrat,
            'salaire' => $employee->salaire,
            'employee_id' => $employee->id,
        ];
    
        $pdf = PDF::loadView('employes.contrat', compact('contrat'));
        
        return $pdf->download('contrat_' . $employee->id . '.pdf');
    }

    public function consulterEmployer($id)
    {
      
        $employee = Employee::with('fiche_de_paies', 'courriers','contrats' )->find($id);

        $infocontrat = Contrat::where('id_employe',$employee->id)->orderBy('created_at','desc')->take(1)->get()->toArray();




        return view('employes.consulter', compact('employee','infocontrat'));
    
       
    }
































}
