<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Activite;
use App\Models\Contraint;
use App\Models\Proposition;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChefServiceController extends Controller
{
    public function AfficherListF()
    {
        $user=Auth::id();
        $sercice_id=DB::table('users')
                    ->where('id','=',$user)
                    ->pluck('services_id')->first();


        $fonctionnaires=DB::table('users')
                         ->select('id','N_SOM','nom','prenom','services_id')
                        ->where('services_id','=', $sercice_id)
                        ->whereNot('id',$user)
                        ->orderBy('id','desc')
                        ->paginate(6);

            return view('chefService.activite.index',compact('fonctionnaires'));
    }

    public function afficherInformationSaisies(string $id){
        //TABLE ACTIVITES
        $user=User::findOrFail($id); 
        $activites_id=DB::table('realiseractivites')
                        ->where('user_id','=',$id)
                        ->pluck('activite_id')
                        ->groupBy('user_id')                  
                        ->first();

        if (! $activites_id) 
        {
            $activites_id = [];
        }
                          
        $activites=DB::table('activites')
                        ->wherein('id', $activites_id)
                        ->whereNot('etat','Regeter')
                        ->orderBy('id','desc')
                        ->paginate(5);
                       
        //TABLE ACTIONS
        $actions_id=DB::table('realiseractions')
                        ->where('user_id','=',$id)
                        ->pluck('action_id')
                        ->groupBy('user_id')                  
                        ->first();

        if (! $actions_id) 
        {
            $actions_id = [];
        }

        $actions=DB::table('actions')
                        ->wherein('id', $actions_id)
                        ->whereNot('etat','Regeter')
                        ->orderBy('id','desc')
                        ->paginate(4);

        // //TABLE PROPOSITIONS

        $propositions=DB::table('propositions')->where('users_id','=',$id)
                        ->whereNot('etat','Regeter')
                        ->orderBy('id','desc')
                        ->paginate(4);    
        
        $countPropositions=DB::table('propositions')->where('users_id','=',$id)->count();  
        
        $countActivite=DB::table('activites')
        ->wherein('id', $activites_id)
        ->count();

        $countActions=DB::table('actions')
        ->wherein('id', $actions_id)
        ->count();

        return view('chefService.activite.show',compact('activites','user','actions','propositions','countActivite','countActions','countPropositions'));
    }




    public function valider(Request $request , $id_act,$user_id){
        $activitesInfo=Activite::findOrFail($id_act);

        $contraints=DB::table('contraints')->where('activites_id',$activitesInfo->id)->get();

        $countActivite=DB::table('contraints')->where('activites_id',$activitesInfo->id)->count();
        

        $date_Deb=0;
        foreach($activitesInfo->users as $user){
            $date_Deb=$user->pivot->date_D;
        }
        $date_fin=0;
        foreach($activitesInfo->users as $user){
            $date_fin=$user->pivot->date_F;
        }      
         $user=User::findOrFail($user_id); 
  

        return view('chefService.activite.edit',compact('activitesInfo','date_Deb','date_fin','contraints','countActivite','user'));

    }

    public function regeter(Request $request, int $id,int $userr){

        $activite = Activite::findOrFail($id); 
        if($activite){   
        
            $activite->etat="Regeter";
            $activite->save();
            

            $idRow=$request->idCont;
    
            if($idRow){
            
            for($i=0;$i<count($idRow);$i++){
                $contraints = [
                    'id'=>$idRow[$i],

                    'etat'=>'Regeter',
                ];
                Contraint::where('id',$idRow[$i])->update($contraints);
                }
            }
        Toastr::success('Informations Successfully regeted','Success');

        return redirect()->route('InformationSaisies', ['id' => $userr]);
   
   
        }else{
            Toastr::error('Informations non validat','Error');
            return redirect()->back();
        }
        
        
    }

    public function updatActv(Request $request, int $id,int $userr){
       

        $activite = Activite::findOrFail($id); 
        if($activite){   
        
            $activite->etat="Valider";
            $activite->save();

            $contraints=DB::table('contraints')->where('activites_id',$id)->pluck('id');
        
            for($i=0;$i<count($contraints);$i++){
                $contrain = [
                    
                    'etat'=>'valider',
                ];
                Contraint::where('id',$contraints[$i])->update($contrain);
          
            }
            Toastr::success('Informations Successfully validat','Success');
            return redirect()->route('InformationSaisies', ['id' => $userr]);
            }else{
                Toastr::error('Informations non validat','Error');
                return redirect()->back();
            }
        }

        public function regeterAction(Request $request, int $id,int $userr){

            $action = Action::findOrFail($id); 
            if($action){   
            
                $action->etat="Regeter";
                $action->save();
                
    
                
            Toastr::success('Informations Successfully regeted','Success');
    
            return redirect()->route('InformationSaisies', ['id' => $userr]);
       
       
            }else{
                Toastr::error('Informations non validat','Error');
                return redirect()->back();
            }
            
            
        }

        public function editAction(Request $request , $id_act, $user_id){
            $actionsInfo=Action::findOrFail($id_act);
            $date_Deb=0;
            foreach($actionsInfo->users as $user){
                $date_Deb=$user->pivot->date_D;
            }
            $date_fin=0;
            foreach($actionsInfo->users as $user){
                $date_fin=$user->pivot->date_F;
            }      
            $user=User::findOrFail($user_id); 
            return view('chefService.action.edit',compact('actionsInfo','date_Deb','date_fin','user'));
    
    
        }

        public function validerAction(Request $request, int $id,int $userr){
       

            $action = Action::findOrFail($id); 
            if($action){   
            
                $action->etat="Valider";
                $action->save();
    
               
                Toastr::success('Informations Successfully validat','Success');
                return redirect()->route('InformationSaisies', ['id' => $userr]);
                }else{
                    Toastr::error('Informations non validat','Error');
                    return redirect()->back();
                }
            }




            public function editProp(string $id ,int $userr){

                $user=User::findOrFail($userr);
                $proposition=Proposition::findOrFail($id);
                
                return view('chefService.propositions.edit',compact('proposition','user'));
        }

            public function validerProp( int $id,int $userr){
       

                $proposition = Proposition::findOrFail($id); 
                if($proposition){   
                
                    $proposition->etat="Valider";
                    $proposition->save();
        
                    
                    Toastr::success('Informations Successfully validat','Success');
                    return redirect()->route('InformationSaisies', ['id' => $userr]);
                    }else{
                        Toastr::error('Informations non validat','Error');
                        return redirect()->back();
                    }
         
                }

                public function regeterProp( int $id,int $userr){

                    $proposition = Proposition::findOrFail($id); 
                    if($proposition){   
                    
                        $proposition->etat="Regeter";
                        $proposition->save();
                        
            
                        
                    Toastr::success('Informations Successfully regeted','Success');
            
                    return redirect()->route('InformationSaisies', ['id' => $userr]);
               
               
                    }else{
                        Toastr::error('Informations non validat','Error');
                        return redirect()->back();
                    }
                    
                    
                }


    public function backk(){

         return redirect()->route('InformationSaisies');
            
    }

    public function searchFonc(Request $request){
        $output="";
        $user=User::where('nom','Like','%'.$request->search.'%')->get();
        foreach($user as $us)
        {
            $output.=

            '<tr>
            <td>'.$us->N_SOM.'</td>
            <td>'.$us->nom.' '.$us->prenom.'</td>
            <td>
            '.'
            <a href=""
            class="btn btn-sm btn-primary">
            <i class="mdi mdi-eye \f2fd"></i>  
            </a>       
            '.'
            </td> 
            </tr>';
        }
        return response($output);
    }

    public function searchActivite(Request $request){
   

        $output="";
       
        $activites_id=DB::table('realiseractivites')
                        ->where('user_id','=',$request->id)
                        ->pluck('activite_id')
                        ->groupBy('user_id')                  
                        ->first();

        if (! $activites_id) 
        {
            $activites_id = [];
        }
                          
        $activites=DB::table('activites')
                        ->wherein('id', $activites_id)
                        ->where('etat','Like','%'.$request->search.'%')
                        ->orderBy('id','desc')
                        ->paginate(4);

   

        foreach($activites as $activite)
        {

            $output.=

            '<tr>
            <td>'.$activite->intitulé.'</td>
            <td class="text-center">'.$activite->etat.'</td>
            
            
            <td>
            '.'
            <a href=""
            class="btn btn-sm btn-warning mx-2">
            <i class="mdi mdi-border-color
            \f1bf"></i> 
            </a>
  
            '.'
            </td>

            
             </tr>';

           


        }
        return response($output);

    
    }

    public function SearchPropposition(Request $request){

        $outputActio="";

        $propositions=DB::table('propositions')
        ->where('users_id','=',$request->id)
        ->where('etat','Like','%'.$request->searchPr.'%')
        ->orderBy('id','desc')
        ->paginate(4);    


        foreach($propositions as $pro)
        {
            $outputActio.=

            '<tr>
            <td>'.$pro->titre.'</td>
            <td class="text-center">'.$pro->etat.'</td>
            
            
            <td>
            '.'
            <a href=""
            class="btn btn-sm btn-warning mx-2">
            <i class="mdi mdi-border-color
            \f1bf"></i> 
            </a>
  
            '.'
            </td>
          

            
            </tr>';


        }
        return response($outputActio);
     }

     public function searchAction(Request $request){

        $outputActio="";

        $actions_id=DB::table('realiseractions')
                    ->where('user_id','=',$request->id)
                    ->pluck('action_id')
                    ->groupBy('user_id')                  
                    ->first();

        if (! $actions_id) 
        {
        $actions_id = [];
        }

        $actions=DB::table('actions')
                ->wherein('id', $actions_id)
                ->where('etat','Like','%'.$request->searchAc.'%')
                ->orderBy('id','desc')
                ->paginate(4);


        foreach($actions as $action)
        {
            $outputActio.=

            '<tr>
            <td>'.$action->titre.'</td>
            <td class="text-center">'.$action->etat.'</td>
            
            
            <td>
            '.'
            <a href=""
            class="btn btn-sm btn-warning mx-2">
            <i class="mdi mdi-border-color
            \f1bf"></i> 
            </a>
  
            '.'
            </td>
         
            </tr>';


        }
        return response($outputActio);
     }

     public function editChef(){
        if(Auth::user()){
            $user=User::find(Auth::user()->id);
            if($user){
                return view('chefService.EditProfil',compact('user'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

     public function update(Request $request){
        $user=User::find(Auth::user()->id);
        if($user){
            if(Auth::user()->email===$request->email){
                $validate=$request->validate([
                    'email'=>'required|email',
                ]);
            
            }else{
                $validate=$request->validate([
                    'email'=>'required|email|unique:users',
                ]);

            }
            $user->email=$request->email;
            $user->save();
            Toastr::success('Email Successfully changed','Success');
            return redirect()->back();
        }else{
            Toastr::error('Email not changed','Error');
            return redirect()->back();
        }
    }

    public function updatePassword(Request $request){

        $validate=$request->validate([
            'oldPassword'=>'required|min:7',
            'password'=>'required|min:7|required_with:password_confirmation',
        ]);
        $user=User::find(Auth::user()->id);

        if($user){
            if(Hash::check($request->oldPassword,$user->password) && $validate){
                $user->password=Hash::make($request->password);
                $user->save();
                Toastr::success('Password Successfully changed','Success');
                return redirect()->back();
            }else{
                Toastr::error('password not changed','Error');
                return redirect()->back();

            }
        }

    }

    public function addActivite(){
        $user=Auth::id();
        $sercice_id=DB::table('users')
        ->where('id','=',$user)
                    ->pluck('services_id')->first();


        $fonctionnaires=DB::table('users')
                         ->select('id','N_SOM','nom','prenom','services_id')
                        ->where('services_id','=', $sercice_id)
                        ->get();
        return view('chefService.rapport.activite',compact('fonctionnaires'));
    }

    public function addAction(){

        return view('chefService.rapport.action');
    }

    public function addContraint(){
        $user=Auth::id();
        $sercice_id=DB::table('users')
        ->where('id','=',$user)
                    ->pluck('services_id')->first();


        $fonctionnaires=DB::table('users')
                         ->select('id','N_SOM','nom','prenom','services_id')
                        ->where('services_id','=', $sercice_id)
                        ->get();

                        $fonctionaire_id=DB::table('users')
                        ->where('services_id','=', $sercice_id)
                        ->pluck('id');
                        

          $activitesID=DB::table('realiseractivites')
                    // ->select('activite_id')
                    ->where('user_id',$user)
                    ->pluck('activite_id');
        
        $activites=DB::table('activites')->whereIn('id',$activitesID)->get();
        

        return view('chefService.rapport.contraint',compact('fonctionnaires','activites'));
    }

    public function addProposition(){
        $user=Auth::id();
        $sercice_id=DB::table('users')
        ->where('id','=',$user)
                    ->pluck('services_id')->first();


        $fonctionnaires=DB::table('users')
                         ->select('id','N_SOM','nom','prenom','services_id')
                        ->where('services_id','=', $sercice_id)
                        ->get();

       
      
                
       
        return view('chefService.rapport.proposition',compact('fonctionnaires'));
    }


    public function storActivite(Request $request){

        $request->validate([
            'nomActivite'=>'required',
            'typeActivite'=>'required',
            'descriptionActivite'=>'required',
            'dateDebutActivite'=>'required',
            'dateFinActivite'=>'required',
           ]);
           $user  = Auth::id();
       if($user){
       $activite = new Activite();
       $activite->type=$request->input('typeActivite');
       $activite->intitulé=$request->input('nomActivite');
       $activite->etat='Valider';     
       $activite->description=$request->input('descriptionActivite');
        $activite->save();

        
       $activite->users()->attach([$user => [
        'date_D' => $request->input('dateDebutActivite'),
        'date_F' => $request->input('dateFinActivite')
        ]]);    
        
        Toastr::success('Activite Successfully Saved','Success');
        return redirect()->back();
       }else{
        Toastr::error('Activite non Saved','Error');
        return redirect()->back();
       }
    }

    public function storAction(Request $request){
        $request->validate([
            'titreAction'=>'required',
            'priorite_ord'=>'required',
            'descriptionAction'=>'required',
            'dateDebAction'=>'required',
            'fonctionnaire'=>'required',
            'dateFinAction'=>'required',
           ]);

          

           $user  = Auth::id();
        if($user){
        $action = new Action();
        $action->titre=$request->input('titreAction');
        $action->description=$request->input('descriptionAction');
        $action->order_priority=$request->input('priorite_ord');
        $action->etat='Valider';
        $action->save();
 
        $action->users()->attach([$user => [
         'date_D' => $request->input('dateDebAction'),
         'date_F' => $request->input('dateFinAction')
         ]]);
         Toastr::success('Action Successfully Saved','Success');
        return redirect()->back();
       }else{
        Toastr::error('Action non Saved','Error');
        return redirect()->back();
       }

    }

    public function storContraint(Request $request){
        $activites_id=$request->ActiviteContraint;
        $sujet=$request->SujetC;
        $description=$request->descriptionContraint;

        for($i=0;$i<count($sujet);$i++){
            $allCnt=[
                'activites_id'=>$activites_id[$i],
                'sujet'=>$sujet[$i],
                'description'=>$description[$i],
            ];
            DB::table('contraints')->insert($allCnt);           

        }
        Toastr::success('Proposition Successfully Saved','Success');
        return redirect()->back();

    }

    public function StorProposition(Request $request){

        $request->validate([
         'titreProppos'=>'required',
         'descriptionProppos'=>'required',
        ]);
        $user  = Auth::id();
        if($user){
            $prop_nom=$request->titreProppos;
            $prop_description=$request->descriptionProppos;
        

            for($i=0;$i<count($prop_description);$i++){
                $allPro=[
                    'users_id'=>$user,               
                    'titre'=>$prop_nom[$i],
                    'description'=>$prop_description[$i],
                    'etat'=>'Valider',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    
                ];
                DB::table('propositions')->insert($allPro); 
        
         }
         Toastr::success('Proposition Successfully Saved','Success');
         return redirect()->back();
        }else{
            Toastr::error('Proposition non Saved','Error');
            return redirect()->back();
        }
    }


}
