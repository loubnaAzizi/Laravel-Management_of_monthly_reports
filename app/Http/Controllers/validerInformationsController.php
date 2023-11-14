<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Activite;
use App\Models\Contraint;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class validerInformationsController extends Controller
{
    public function valider(Request $request , $id_act, $user_id){
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
  

        return view('chefService.activite.edit',compact('activitesInfo','date_Deb','date_fin','contraints','user','countActivite'));

    }

    public function updatActivite(Request $request, $activite_id, $user){
         //update l'activite e pivot table
         $request->validate([
            
            
            'nomActivite'=>'required',
            'typeActivite'=>'required',
            'descriptionActivite'=>'required',
            'dateDebutActivite'=>'required',
            'dateFinActivite'=>'required',
            
           ]);
         $userr=User::findOrFail($user); 
         $activites_id=DB::table('realiseractivites')
                         ->where('user_id','=',$user)
                         ->pluck('activite_id')
                         ->groupBy('user_id')                  
                         ->first();
                           
         $activites=DB::table('activites')
                         ->wherein('id', $activites_id)
                         ->orderBy('id','desc')
                         ->paginate(4);

         $activite = Activite::findOrFail($activite_id); 
         if($activite){   
         $activite->intitulé=$request->input('nomActivite');
         $activite->type=$request->input('typeActivite');
         $activite->description=$request->input('descriptionActivite');
         $activite->etat="Valider";
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

          Toastr::success('Informations Successfully validat','Success');
          return redirect()->back();
     
         }else{
          Toastr::error('Activite non validat','Error');
          return redirect()->back();
         }

          //update les contraints
          $idRow=$request->idCont;
          $nomContr=$request->sujetContV;
          $descr=$request->validDescripContraint;
       
        if($idRow){
        
          for($i=0;$i<count($nomContr);$i++){
              $contraints = [
                  'id'=>$idRow[$i],
                  'sujet'=>$nomContr[$i],
                  'description'=>$descr[$i],
                  'etat'=>'valider',
              ];
              Contraint::where('id',$idRow[$i])->update($contraints);
              Contraint::success('Contraint Successfully validat','Success');
          }}else{
            // Toastr::error('Contraint non validat','Error');
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


    public function updatAction(Request $request, $action_id, $userr){

        $request->validate([
            
            
            'nomAction'=>'required',
            'dateDebutAction'=>'required',
            'descriptionAction'=>'required',
            'order'=>'required',
            'dateFinAction'=>'required',
            
           ]);

        $action = Action::findOrFail($action_id); 
        if($action){
        $action->titre=$request->input('nomAction');
        $action->order_priority=$request->input('order');
        $action->description=$request->input('descriptionAction');
        $action->etat="Valider";
        $action->save();

        $user_id  = 0;  
        foreach($action->users as $user){
         $user_id=$user->pivot->user_id;
        }  
         $user=User::findOrFail($user_id); 
 
        $user->actions()->updateExistingPivot($action_id, [
         'date_D' =>$request->input('dateDebutAction'),
         'date_F' =>$request->input('dateFinAction')
         ]);
         Toastr::success('Informations Successfully validat','Success');
         return redirect()->back();
        }else{
            return redirect()->back();
        }
       
         

    }


    // public function backk(Request $request , $id){

    //     return redirect()->route('InformationSaisies');

    // }


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
           //TABLE ACTIVITES
        $user=User::findOrFail($userr); 
        $activites_id=DB::table('realiseractivites')
                        ->where('user_id','=',$userr)
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
                        ->where('user_id','=',$userr)
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

        // //TABLE PROPOSITIONS

        $propositions=DB::table('propositions')->where('users_id','=',$userr)->orderBy('id','desc')
        ->paginate(4);          
        
        $countActivite=DB::table('activites')
        ->wherein('id', $activites_id)
        ->count();
        Toastr::success('Informations Successfully regeted','Success');

          return redirect()->route('InformationSaisies', ['id' => $userr]);
   
   
        }else{
            Toastr::error('Informations non validat','Error');
            return redirect()->back();
        }

        
    }


    public function validerActv(Request $request, int $id,int $userr){
       

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
      
        //     $idRow=$request->idCont;
    
        //     if($idRow){
            
        //     for($i=0;$i<count($idRow);$i++){
        //         $contraints = [
        //             'id'=>$idRow[$i],

        //             'etat'=>'Valider',
        //         ];
        //         Contraint::where('id',$idRow[$i])->update($contraints);
        //         }
        //     }
        //    //TABLE ACTIVITES
        // $user=User::findOrFail($userr); 
        // $activites_id=DB::table('realiseractivites')
        //                 ->where('user_id','=',$userr)
        //                 ->pluck('activite_id')
        //                 ->groupBy('user_id')                  
        //                 ->first();

        // if (! $activites_id) 
        // {
        //     $activites_id = [];
        // }
                          
        // $activites=DB::table('activites')
        //                 ->wherein('id', $activites_id)
        //                 ->whereNot('etat','Regeter')
        //                 ->orderBy('id','desc')
        //                 ->paginate(5);
                       
        // //TABLE ACTIONS
        // $actions_id=DB::table('realiseractions')
        //                 ->where('user_id','=',$userr)
        //                 ->pluck('action_id')
        //                 ->groupBy('user_id')                  
        //                 ->first();

        // if (! $actions_id) 
        // {
        //     $actions_id = [];
        // }

        // $actions=DB::table('actions')
        //                 ->wherein('id', $actions_id)
        //                 ->orderBy('id','desc')
        //                 ->paginate(4);

        // // //TABLE PROPOSITIONS

        // $propositions=DB::table('propositions')->where('users_id','=',$userr)->orderBy('id','desc')
        // ->paginate(4);          
        
        // $countActivite=DB::table('activites')
        // ->wherein('id', $activites_id)
        // ->count();
        // Toastr::success('Informations Successfully validat','Success');
        // return view('chefService.activite.show',compact('activites','user','actions','propositions','countActivite'));
          
        //     // return redirect()->back();
        // }else{
        //     Toastr::error('Informations non validat','Error');
        //     return redirect()->back();
        // }

       

        
    

        // $action = Activite::findOrFail($id); 
        
        // $action->etat="Regeter";
        // $action->save();

        // $idRow=$request->idCont;
        //   $nomContr=$request->sujetContV;
        //   $descr=$request->validDescripContraint;
         
       
        // if($idRow){
        
        //   for($i=0;$i<count($nomContr);$i++){
        //       $contraints = [
        //           'id'=>$idRow[$i],
                  
        //           'etat'=>'Regeter',
        //       ];
        //       Contraint::where('id',$idRow[$i])->update($contraints);
        //       Contraint::success('Contraint Successfully validat','Success');
        //   }}else{
        //     // Toastr::error('Contraint non validat','Error');
        //     return redirect()->back();
        // }  

        // $activite=Activite::where("id","=",$id)->get();
        // echo $activite;
        // $activite->etat="Regeter";
        // $activite->save();
        // return redirect()->back();
        
    

    
}
