<?php

namespace App\Http\Controllers;

use App\Models\Fonctionnaire;
use App\Models\Service;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class FonctionnaireController extends Controller
{
   public function forgotPassword(){
    return view('user.forgot_Password');
   }
   public function forgotPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,emailPrson',
        ]);

        $token=Str::random(64);

        DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);

        Mail::send("user.mails.message",['token'=>$token],function($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset password');
        });
        Toastr::success('Email sended');
        return redirect()->route('forgotPassword');
   }

   


  

    public function destroy(string $id)
    {
        //
    }
}
