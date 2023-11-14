<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePassword extends Controller
{
    public function updatPassword(Request $request)
    {
        $request->validate([
            'oldPassword'=>'required|min:5|max:12',
            'nvPassword'=>'required|min:5|max:12|confirmed',
        ]);
        $currentPassword=Hash::check($request->oldPassword,auth()->user()->password);
        if($currentPassword){
            User::findOrFail(Auth::user()->id)->update([
                'password'=>Hash::make($request->nvPassword),
            ]);
            return redirect()->route('user.index')->with('success','service has been deleted successfully.');
        }else{
            return redirect()->back()->with('message','Error');
        }
    }
}
