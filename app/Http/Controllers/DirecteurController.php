<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Realiseraction;
use App\Models\Realiseractivite;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Dompdf\Adapter\PDFLib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

// use Barryvdh\DomPDF\Facade as PDF;
use function Pest\Laravel\get;

class DirecteurController extends Controller
{

    public function index(){

        $employes=DB::table('services')
            ->join('users', 'services.id', '=', 'users.services_id')
            ->orderBy('N_SOM','desc')->paginate(9);
        return view('directeur.index',compact('employes'));
    }



    public function showEmploye(string $id){
        $user=User::findOrFail($id);
        $service_id=DB::table('users')->where('id',$user->id)->pluck('services_id')->first();
        $service=Service::findOrFail($service_id);
        return view('directeur.showEmploye',compact('user','service'));

    }

    public function search(Request $request){
        $output="";
        // $user=User::where('nom','Like','%'.$request->search.'%')->get();

        $user=DB::table('services')
        ->join('users', 'services.id', '=', 'users.services_id')
        ->where('nom','Like','%'.$request->search.'%')->get();

        foreach($user as $us)
        {
            $output.=
           
            '<tr>
            <td>'.$us->N_SOM.'</td>
            <td>'.$us->nom.' '.$us->prenom.'</td>
            
            <td>'.$us->nomService.'</td>
            
            <td>
            '.'
            <a href="#"
                     class="btn btn-sm btn-primary mr-2">
                     <i class="mdi mdi-eye \f2fd"></i>  
            </a>
            <a href="#"
                  class="btn btn-sm btn-warning mr-2">
                  <i class="bx bxs-download"></i>
                </a>

           
            
            '.'
            </td>
            </tr>';
        }
        return response($output);

    }

    

    
    public function directeurShowRapports(int $id){

        $employe=User::find($id);
           return view('directeur.rapports.archive',compact('employe'));

    }

    public function imprimer(int $id){

        $user=User::find($id);
        $userObj=User::find($id);

          
        //les activites
        $users = DB::table('users')->where('id',$id)->pluck('id')->first();

        $activites = Realiseractivite::join('activites','realiseractivites.activite_id','activites.id')
                
                ->where('activites.etat','=', 'Valider')
                ->whereMonth('activites.created_at', Carbon::now()->month)
                ->where('realiseractivites.user_id','=', $id)
                ->select('activites.intitulé','realiseractivites.date_D',
                'realiseractivites.date_F')
                ->get();



        //count activites
        $activites_id=DB::table('realiseractivites')->where('user_id','=',$id)->pluck('activite_id');
        $activitesC=DB::table('activites')->whereIn('id',$activites_id)
        ->where('etat','Valider')
        ->whereMonth('created_at', Carbon::now()->month)
         ->pluck('id');
         $conctActivite=$activitesC->count();


        
        //les contraintes
            $activitesID=DB::table('activites')->whereIn('id',$activites_id)
            ->where('etat','Valider')
            ->whereMonth('created_at', Carbon::now()->month)
            ->pluck('id');
            $contraintes=DB::table('contraints')->whereIn('activites_id',$activitesID)
            ->where('etat','Valider')
            ->get();

        //les propositions
            $propositions=DB::table('propositions')->where('users_id',$id)
            ->where('etat','Valider')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        
        //les actions
        $actions = Realiseraction::join('actions','realiseractions.action_id','actions.id')
                
        ->where('actions.etat','=', 'Valider')
        ->whereMonth('actions.created_at', Carbon::now()->month)
        ->where('realiseractions.user_id','=', $id)
        ->select('actions.titre','realiseractions.date_D',
        'realiseractions.date_F')
        ->get();

        $actions_id=DB::table('realiseractions')->where('user_id','=',$id)->pluck('action_id');


        //count actions
            $actionsC=DB::table('actions')->whereIn('id',$actions_id)
                ->where('etat','Valider')
                ->whereMonth('created_at', Carbon::now()->month)
                ->pluck('id');
            $countActions=$actionsC->count();

        //nom du chef service
        $service_id=DB::table('users')->where('id',$id)->pluck('services_id')->first();
        $nomChef=DB::table('users')->where('services_id',$service_id)->where('role','3')->first();
       
     
        //view PDF
        $pdf = Pdf::loadView('rapport.imprim',compact('activites','actions','countActions','conctActivite','contraintes','user','propositions','nomChef','userObj'));
        return $pdf->stream('rapport'.$user.'.pdf');


    }

  
}
