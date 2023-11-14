<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfController extends Controller
{
    public function edit(){
        if(Auth::user()){
            $admin=User::find(Auth::user()->id);
            if($admin){
                return view('admin.profile.edit',compact('admin'));
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
                Toastr::error('Password not changed','Error');
                return redirect()->back();

            }
        }

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

    public function search(Request $request){
        $output="";
        $user=User::where('nom','Like','%'.$request->search.'%')->get();

        foreach($user as $us)
        {
            $output .= view("user.userTR",['user' => $us]);
        }
        return response($output);

    }

}
