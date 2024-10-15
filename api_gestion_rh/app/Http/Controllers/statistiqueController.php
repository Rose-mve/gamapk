<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use App\Models\Employee;
use App\Models\Fiche_de_paie;
use Illuminate\Http\Request;

class statistiqueController extends Controller
{
    public function statistiques()
    {
        $nombreEmployes = Employee::where('statut', '!=', 1)->count();
        $nombrefiches_de_paie = Fiche_de_paie::where('statut', '!=', 1)->count();
        $nombreCourriers = Courrier::where('statut', '!=', 1)->count();
        $courrier_par_employe = Employee::withCount('courriers')->get();
        $fiches_de_paie_par_employe = Employee::withCount('fiche_de_paies')->get();
    
        return response()->json([
            'nombre_employes' => $nombreEmployes,
            'nombre_fiches_de_paie' => $nombrefiches_de_paie,
            'nombre_Courriers' => $nombreCourriers,
            'courrier_par_employe'=>$courrier_par_employe,
            'fiches_de_paie_par_employe'=>$fiches_de_paie_par_employe,
        ]);
    }

    

  
}
