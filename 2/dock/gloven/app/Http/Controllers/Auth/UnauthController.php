<?php

namespace App\Http\Controllers\Auth;

use http\Message;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UnauthController extends \App\Http\Controllers\Controller
{
    public function registration_do(Request $request){
        $validated = $request->validate([
            'surname'=>'required',
            'name'=>'required',
            'middle'=>'nullable|string',
            'birthday'=>'required|date',
            'nationality'=>'required',
            'sex'=>'required',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|unique:users,phone',
            'login'=>'required|unique:users,login',
            'password'=>'required|min:8',
            'passwordrepeat'=>['required', 'min:8', function($attr, $value, $fail){
                global $request;
                if($request->get('password')!==$request->get('passwordrepeat'))
                    $fail('Пароли не совпадают');
            }],
            'photo'=>'file',
            'person'=>'required'
        ]);
        $photo = $request->hasFile('photo') ? $request->file('photo') : false;
        $photoPath = $photo ? $photo->getPathname() : '';
        $validated['photo']= $photo ? 'avatars/'.$request->login : '';
        $validated['mailing']=$request->has('mailing') ? 1 : 0;

        $user = \App\Models\User::create($validated);

        if($photo){
            @mkdir('avatars');
            copy($photoPath, $validated['photo']);
        }
        if(!Auth::guard()->attempt($validated))
            return view('auth.message', ['message'=>'registration_done_dont_login']);

        $to_name = $user->login;
        $to_email = $user->email;
        Mail::send('auth.mail', ['surname'=>$user->surname,'name'=>$user->name], function($message) use ($to_name, $to_email){
           $message->to($to_email, $to_name)->subject('Успешная регистрация');
        });

        return view('auth.message', ['message'=>'registration_done']);
    }

    public function login(Request $request){
        $validated=$request->validate([
            'login'=>'required',
            'password'=>'required'
        ]);
        if(!Auth::guard()->attempt($validated))
            return view('auth.message', ['message'=>'auth_error']);
        return redirect('/');
    }
}
