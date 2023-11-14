<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $user=Auth::id();
        $users =DB::table('users')
        ->whereNot('id',$user)
        ->orderBy('N_SOM','desc')->paginate(5);

        return view('user.index',['users'=> $users]);
    }


    public function create()
    {
        $services =DB::table('services')->get();
        return view('user.create',['services'=>$services]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'email'=>'required|email|unique:users',
            'role'=>'required',
            'password'=>'required|min:5|max:12',
            'nom'=>'required',
            'prenom'=>'required',
            'CIN'=>'required',
            'emailPrson'=>'required|email|unique:users',
            'grade'=>'required',
            'N_SOM'=>'required|unique:users|numeric',
            'statue'=>'required',
            'telephon'=>'required|numeric|min:10|regex:/(0)[0-9]{9}/',
            'service'=>'required',
           ]);
          
    
         
           $service =Service::findOrFail($request->service);

      if($service){
           $service->users()->create([
               'services_id'=>$request->service,   
               'nom'=>$request->nom,
               'prenom'=>$request->prenom,
               'CIN'=>$request->CIN,
               'emailPrson'=>$request->emailPrson,
               'grade'=>$request->grade,
               'N_SOM'=>$request->N_SOM,
               'statue'=>$request->statue,
               'telephon'=>$request->telephon,
               'email'=>$request->email,
               'role'=>$request->role,
               'password'=>Hash::make($request->password)
           ]);
           Toastr::success('User Successfully saved','Success');
            return redirect()->route('user.index');
        }else{
            Toastr::error('User not saved','Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=User::findOrFail($id);
        $service_id=DB::table('users')->where('id',$user->id)->pluck('services_id')->first();
        $service=Service::findOrFail($service_id);
        
        return view('user.show',compact('user','service'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, int $user)
    {

        $services=Service::all();
        $user=User::findOrFail($user);
        return view('user.editInfo',compact('services','user'));
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $user_id)
    {
        $user =User::findOrFail($user_id);
        if($user){
        if($user->email===$request->email or $user->emailPrson===$request->emailPrson){
           $request->validate([
                'email'=>'required|email',
                'emailPrson'=>'required|email',
                'N_SOM'=>'required',
            ]);
        
        }else{
           $request->validate([
                'email'=>'required|email|unique:users',
                'emailPrson'=>'required|email|unique:users',
                'N_SOM'=>'required|unique:users',
            ]);

        }

        $request->validate([
            'nom'=>'required',
            'role'=>'required|numeric',
            'prenom'=>'required',
            'CIN'=>'required',
            'grade'=>'required',
            'N_SOM'=>'required',
            'statue'=>'required',
            'telephon'=>'required|numeric|min:10|regex:/(0)[0-9]{9}/',
            'service'=>'required',
       
    ]);
       
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->CIN=$request->CIN;
        $user->emailPrson=$request->emailPrson;
        $user->grade=$request->grade;
        $user->N_SOM=$request->N_SOM;
        $user->statue=$request->statue;
        $user->telephon=$request->telephon;
        $user->services_id=$request->service;       
        $user->save();
        Toastr::success('Informations Successfully changed','Success');
        return redirect()->route('user.index');
    } else{
        Toastr::error('Informations not changed','Error');
        return redirect()->back();
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success','service has been deleted successfully.');
       
    }

    public function updatPassword(Request $request)
    {
        $request->validate([
            'oldPassword'=>'required|min:5|max:12',
            'password'=>'required|min:5|max:12|',
        ]);
        $currentPassword=Hash::check($request->oldPassword,auth()->user()->password);
        if($currentPassword){
            User::findOrFail(Auth::user()->id)->update([
                'password'=>Hash::make($request->password),
            ]);
        return redirect()->route('user.index')->with('success','service has been deleted successfully.');
        }else{
            return redirect()->back()->with('message','Error');
        }
    }

   
}
