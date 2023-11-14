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

class FonctionnairController extends Controller
{
    public function dashFonct(){
        $id_user=Auth::id();
        $activites_id=DB::table('realiseractivites')
                        ->where('user_id','=',$id_user)
                        ->pluck('activite_id')
                        ->groupBy('user_id')                  
                        ->first();
     if (! $activites_id) 
        {
           $activites_id = [];
        }

           $contraints=DB::table('contraints')->whereIn('activites_id',$activites_id)->count();

        $activites=DB::table('activites')
                        ->wherein('id', $activites_id)
                        ->count();
                       

        $actions_id=DB::table('realiseractions')
                     ->where('user_id','=',$id_user)
                     ->pluck('action_id')
                     ->groupBy('user_id')                  
                     ->first();
        if (! $actions_id) 
            {
                $actions_id = [];
            }

        $actions=DB::table('actions')
                        ->wherein('id', $actions_id)
                        ->count();
          
        if (! $id_user) 
            {
                $id_user = [];
            }
        $propositions=DB::table('propositions')->where('users_id','=',$id_user)
                        ->count();
           

        return view('fonctionnaireDash',compact('activites','actions','propositions','contraints'));
    }
    
    //Index
    public function index(){
        return view('rapport.activite');
    }

    //REMPLIR ACTIVITE
    public function indexActivite(){
        $user=Auth::id();
        $sercice_id=DB::table('users')
        ->where('id','=',$user)
                    ->pluck('services_id')->first();


        $fonctionnaires=DB::table('users')
                         ->select('id','N_SOM','nom','prenom','services_id')
                        ->where('services_id','=', $sercice_id)
                        ->whereNot('id',$user)
                        ->get();
        return view('rapport.activite',compact('fonctionnaires'));
    }

    public function StorActivite(Request $request){

        $request->validate([
         'nomActivite'=>'required',
         'typeActivite'=>'required',
         'descriptionActivite'=>'required',
         'dateDebutActivite'=>'required',
        ]);
        
        $user  = Auth::id();
        if($user){
        $activite = new Activite();
        $activite->type=$request->input('typeActivite');
        $activite->intitulé=$request->input('nomActivite');     
        $activite->description=$request->input('descriptionActivite');
         $activite->save();
 
         
        $activite->users()->attach([$user => [
         'date_D' => $request->input('dateDebutActivite'),
         'date_F' => $request->input('dateFinActivite')
         ]]);    
         
         Toastr::success('Activite Successfully Saved','Success');
         return redirect()->route('remplirActivite');
        }else{
         Toastr::error('Activite non Saved','Error');
         return redirect()->back();
        }
     }

     //REMPLIR ACTION
     public function remplirAction(){
        return view('rapport.actions');
    }

    public function StorAction(Request $request){

        $request->validate([
         'nomActivite.*'=>'required',
         'typeActivite.*'=>'required',
         'descriptionActivite.*'=>'required',
         'dateDebutActivite.*'=>'required',
        ]);
 
        $user  = Auth::id();
        if($user){
        $action = new Action();
        $action->titre=$request->input('titreAction');
        $action->description=$request->input('descriptionAction');
        $action->order_priority=$request->input('priorite_ord');
        $action->save();
 
        $action->users()->attach([$user => [
         'date_D' => $request->input('dateDebAction'),
         'date_F' => $request->input('dateFinAction')
         ]]);
         Toastr::success('Action Successfully Saved','Success');
        return redirect()->route('remplirAction');
       }else{
        Toastr::error('Action non Saved','Error');
        return redirect()->back();
       }
    
         
         
     }

     //REMPLIR PROPOSITION
     public function remplirProposition(){
        return view('rapport.propositions');
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
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    
                ];
                DB::table('propositions')->insert($allPro); 
        
         }
         Toastr::success('Proposition Successfully Saved','Success');
         return redirect()->route('fonctionnaireDash');
        }else{
            Toastr::error('Proposition non Saved','Error');
            return redirect()->back();
        }
    }

    //REMPLIR CONTRAINT
    public function indexContraint(){
        $user=Auth::id();
        $activitesID=DB::table('realiseractivites')
                    ->where('user_id',$user)
                    ->pluck('activite_id');
        
        $activites=DB::table('activites')->whereIn('id',$activitesID)->get();
        return view('rapport.contraints',compact('activites'));
    }

    public function StorContraint(Request $request){

        $activites_id=$request->ActiviteContraint;
        $sujet=$request->SujetC;
        $description=$request->descriptionContraint;

        for($i=0;$i<count($sujet);$i++){
            $allCnt=[
                'activites_id'=>$activites_id[$i],
                'sujet'=>$sujet[$i],
                'description'=>$description[$i],
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];
            DB::table('contraints')->insert($allCnt);           

        }
        Toastr::success('Contrainte Successfully Saved','Success');
        return redirect()->route('fonctionnaireDash');



     }

     //CONSULTAR LES INFORMATIONS

    public function informations(){
        //ID USER
        $id_user=Auth::id();

        //ACTIVITES
        $activites_id=DB::table('realiseractivites')
                        ->where('user_id','=',$id_user)
                        ->pluck('activite_id')
                        ->groupBy('user_id')                  
                        ->first();
                        if (! $activites_id) 
                        {
                           $activites_id = [];
                        }
           

        $activites=DB::table('activites')
                        ->wherein('id', $activites_id)
                        ->orderBy('id','desc')
                        ->paginate(5);

       
        

        return view('rapport.consultActivites',compact('activites'));
    }

    public function informationAction(){

        $id_user=Auth::id();
        $actions_id=DB::table('realiseractions')
                        ->where('user_id','=',$id_user)
                        ->pluck('action_id')
                        ->groupBy('user_id')                  
                        ->first();
                        if (! $actions_id) 
                        {
                           $actions_id = [];
                        }

        $actions=DB::table('actions')
                        ->wherein('id', $actions_id)
                        ->orderBy('id','desc')
                        ->paginate(4);

        return view('rapport.consultActions',compact('actions'));

    }
    
    public function informationProppositions(){
        $id_user=Auth::id();
        if (! $id_user) 
            {
               $id_user = [];
            }
        $propositions=DB::table('propositions')->where('users_id','=',$id_user)->orderBy('id','desc')
        ->paginate(4);
        
        return view('rapport.consultPropositions',compact('propositions'));

    }

    public function informationsContraints(){
        $id_user=Auth::id();
        if (! $id_user) 
            {
               $id_user = [];
            }
        $activites_id=DB::table('realiseractivites')
                    ->where('user_id','=',$id_user)
                    ->pluck('activite_id');

        $contraintes=DB::table('contraints')->whereIn('activites_id',$activites_id)->orderBy('id','desc')
        ->paginate(6);

        return view('rapport.consultContraints',compact('contraintes'));

    }

    public function showActivite(string $id){
        
        $activite=Activite::findOrFail($id);
        $date_Deb=0;
        foreach($activite->users as $user){
            $date_Deb=$user->pivot->date_D;
        }
        $date_fin=0;
        foreach($activite->users as $user){
            $date_fin=$user->pivot->date_F;
        }  
        $contraints=DB::table('contraints')->where('activites_id',$id)->get();
        $countContr=DB::table('contraints')->where('activites_id',$id)->count();

        return view('rapport.showActivite',compact('activite','date_Deb','date_fin','contraints','countContr'));

    }
    
    public function showAction(string $id){
        
        $action=Action::findOrFail($id);
        $date_Deb=0;
        foreach($action->users as $user){
            $date_Deb=$user->pivot->date_D;
        }
        $date_fin=0;
        foreach($action->users as $user){
            $date_fin=$user->pivot->date_F;
        }  
        
        return view('rapport.showAction',compact('action','date_Deb','date_fin'));

    }
    
    public function showProposition(string $id){
        
        $proposition=Proposition::findOrFail($id);
      
        
        return view('rapport.showProposition',compact('proposition'));

    }

    // public function imprimer(Request $request){


    //     $user_id=Auth::id();

    //     $service_id=DB::table('users')->where('id',$user_id)->pluck('services_id')->first();
    //     $nomChef=DB::table('users')->where('services_id',$service_id)->where('role','3')->get();
                       
       
      
    //     // echo $nomChef;

    //     $chekActivite = $request->CheckActivite;
    //     $CheckAction = $request->CheckAction;
    //     $CheckProposition = $request->CheckProposition;
        
    //     $infoActivite=DB::table('activites')->whereIn('id', $chekActivite)->get();
    //     $infoActionts=DB::table('actions')->whereIn('id', $CheckAction)->get();
    //     $infoPropoositions=DB::table('propositions')->whereIn('id', $CheckProposition)->get();
     
           
    //      return view('rapport.imprim',compact('infoActivite','infoPropoositions','infoActionts','nomChef'));
       
    // }

    public function consult(){
        return view('rapport.consultation');
    }

    public function editActivite(Request $request , $id_act){
      
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
      
  

        return view('rapport.editActivite',compact('activitesInfo','date_Deb','date_fin','contraints','countActivite'));

    }

    public function UpdateActivite(Request $request, $activite_id){
        //update l'activite e pivot table
        $request->validate([
           
           
           'nomActivite'=>'required',
           'typeActivite'=>'required',
           'descriptionActivite'=>'required',
           'dateDebutActivite'=>'required',
           'dateFinActivite'=>'required',
           
          ]);
        $activite = Activite::findOrFail($activite_id); 
        if($activite){   
        
        $activite->intitulé=$request->input('nomActivite');
        $activite->type=$request->input('typeActivite');
        $activite->description=$request->input('descriptionActivite');
        $activite->etat='Non valider';
        $activite->save();

        $user_id  = 0;  
        foreach($activite->users as $user){
         $user_id=$user->pivot->user_id;
        }  
        $user=User::findOrFail($user_id); 
 
        $user->activites()->updateExistingPivot($activite_id, [
         'date_D' =>$request->input('dateDebutActivite'),
         'date_F' =>$request->input('dateFinActivite')
         ]);

         $idRow=$request->idCont;
         $nomContr=$request->sujetContV;
         $descr=$request->validDescripContraint;
      
            if($idRow){
            
                for($i=0;$i<count($nomContr);$i++){
                    $contraints = [
                        'id'=>$idRow[$i],
                        'sujet'=>$nomContr[$i],
                        'description'=>$descr[$i],
                        'etat'=>'Non valider',
                    ];
                    Contraint::where('id',$idRow[$i])->update($contraints);
                }}

         Toastr::success('Informations Successfully validat','Success');
         return redirect()->route('information');
    
        }else{
         Toastr::error('Activite non validat','Error');
         return redirect()->back();
        }
 
    }

    
    public function editAction($id){
        $action=Action::findOrFail($id);

        $date_Deb=0;
        foreach($action->users as $user){
            $date_Deb=$user->pivot->date_D;
        }
        $date_fin=0;
        foreach($action->users as $user){
            $date_fin=$user->pivot->date_F;
        }      
        return view('rapport.editAction',compact('action','date_Deb','date_fin'));

    }

    public function updateAction(Request $request,$id){
        $request->validate([
            'titre'=>'required',
            'dateDebutAction'=>'required',
            'description'=>'required',
            'priorite_ord'=>'required|numeric',
            'dateFinAction'=>'required',
           ]);
    
           $user  = Auth::id();
           
           $action =  Action::findOrFail($id);
           if($action){
           $action->titre=$request->input('titre');
           $action->etat='Non validée';
           $action->description=$request->input('description');
           $action->order_priority=$request->input('priorite_ord');
           $action->save();
    
           $action->users()->attach([$user => [
            'date_D' => $request->input('dateDebutAction'),
            'date_F' => $request->input('dateFinAction')
            ]]);
            Toastr::success('Action Successfully Saved','Success');
           return redirect()->route('actionInformations');
          }else{
           Toastr::error('Action non Saved','Error');
           return redirect()->back();
          }

    }


    public function editProposition($id){
        $propositionInfo=Proposition::findOrFail($id);

        return view('rapport.editProposition',compact('propositionInfo'));

    }

    public function updateProposition(Request $request,$id){
        $request->validate([
            'titre'=>'required',
            'description'=>'required',
        ]);

        $proposition=Proposition::findOrFail($id);
        if($proposition){
        $proposition->titre=$request->titre;
        $proposition->description=$request->description;
        $proposition->etat='Non validée';
        $proposition->save();

            Toastr::success('Proposition Successfully Saved','Success');
           return redirect()->route('proppositionsInformations');
          }else{
           Toastr::error('Proposition non Saved','Error');
           return redirect()->back();
          }
    }

        

        
    public function edit(){
        if(Auth::user()){
            $user=User::find(Auth::user()->id);
            if($user){
                return view('rapport.userEditProfil',compact('user'));
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

       
        
      
      
         
   
    
}
