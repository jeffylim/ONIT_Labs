<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends \App\Http\Controllers\Controller
{
    public function profile_update(Request $request){
        $user = \App\Models\User::findOrFail(auth()->id());
        if($user->email == $request->get('email') && $user->phone == $request->get('phone') && $user->login == $request->get('login')){
            $validated = $request->validate([
                'password'=>'nullable|string',
                'passwordrepeat'=>'nullable|string',
                'photo'=>'nullable|file',
                'about'=>'nullable|string'
            ]);
            $photo = $request->hasFile('photo') ? $request->file('photo') : false;
            $photoPath = $photo ? $photo->getPathname() : '';
            $validated['photo']= $photo ? 'avatars/'.$user->login : '';
            if($photo){
                @mkdir('avatars');
                copy($photoPath, $validated['photo']);
                $user->photo = $validated['photo'];
            }
            if($validated['password']!='')
                $user->password=$validated['password'];
            $user->about = $validated['about'];
            $user->save();
        }
        if($user->email == $request->get('email') && $user->phone == $request->get('phone') && $user->login != $request->get('login')){
            $validated = $request->validate([
                'login'=>'required|unique:users,login',
                'password'=>'nullable|string',
                'passwordrepeat'=>'nullable|string',
                'photo'=>'nullable|file',
                'about'=>'nullable|string'
            ]);
            $user->login = $validated['login'];
            if($validated['password']!='')
                $user->password=$validated['password'];
            $photo = $request->hasFile('photo') ? $request->file('photo') : false;
            $photoPath = $photo ? $photo->getPathname() : '';
            $validated['photo']= $photo ? 'avatars/'.$user->login : '';
            if($photo){
                @mkdir('avatars');
                copy($photoPath, $validated['photo']);
                $user->photo = $validated['photo'];
            }
            $user->about = $validated['about'];
            $user->save();
        }
        if($user->email == $request->get('email') && $user->phone != $request->get('phone') && $user->login == $request->get('login')){
            $validated = $request->validate([
                'phone'=>'required|unique:users,phone',
                'password'=>'nullable|string',
                'passwordrepeat'=>'nullable|string',
                'photo'=>'nullable|file',
                'about'=>'nullable|string'
            ]);
            $user->phone = $validated['phone'];
            if($validated['password']!='')
                $user->password=$validated['password'];
            $photo = $request->hasFile('photo') ? $request->file('photo') : false;
            $photoPath = $photo ? $photo->getPathname() : '';
            $validated['photo']= $photo ? 'avatars/'.$user->login : '';
            if($photo){
                @mkdir('avatars');
                copy($photoPath, $validated['photo']);
                $user->photo = $validated['photo'];
            }
            $user->about = $validated['about'];
            $user->save();
        }
        if($user->email != $request->get('email') && $user->phone == $request->get('phone') && $user->login == $request->get('login')){
            $validated = $request->validate([
                'email'=>'required|email|unique:users,email',
                'password'=>'nullable|string',
                'passwordrepeat'=>'nullable|string',
                'photo'=>'nullable|file',
                'about'=>'nullable|string'
            ]);
            $user->email = $validated['email'];
            if($validated['password']!='')
                $user->password=$validated['password'];
            $photo = $request->hasFile('photo') ? $request->file('photo') : false;
            $photoPath = $photo ? $photo->getPathname() : '';
            $validated['photo']= $photo ? 'avatars/'.$user->login : '';
            if($photo){
                @mkdir('avatars');
                copy($photoPath, $validated['photo']);
                $user->photo = $validated['photo'];
            }
            $user->about = $validated['about'];
            $user->save();
        }
        if($user->email == $request->get('email') && $user->phone != $request->get('phone') && $user->login != $request->get('login')){
            $validated = $request->validate([
                'phone'=>'required|unique:users,phone',
                'login'=>'required|unique:users,login',
                'password'=>'nullable|string',
                'passwordrepeat'=>'nullable|string',
                'photo'=>'nullable|file',
                'about'=>'nullable|string'
            ]);
            $user->phone = $validated['phone'];
            $user->login = $validated['login'];
            if($validated['password']!='')
                $user->password=$validated['password'];
            $photo = $request->hasFile('photo') ? $request->file('photo') : false;
            $photoPath = $photo ? $photo->getPathname() : '';
            $validated['photo']= $photo ? 'avatars/'.$user->login : '';
            if($photo){
                @mkdir('avatars');
                copy($photoPath, $validated['photo']);
                $user->photo = $validated['photo'];
            }
            $user->about = $validated['about'];
            $user->save();
        }
        if($user->email != $request->get('email') && $user->phone == $request->get('phone') && $user->login != $request->get('login')){
            $validated = $request->validate([
                'email'=>'required|unique:users,email',
                'login'=>'required|unique:users,login',
                'password'=>'nullable|string',
                'passwordrepeat'=>'nullable|string',
                'photo'=>'nullable|file',
                'about'=>'nullable|string'
            ]);
            $user->email = $validated['email'];
            $user->login = $validated['login'];
            if($validated['password']!='')
                $user->password=$validated['password'];
            $photo = $request->hasFile('photo') ? $request->file('photo') : false;
            $photoPath = $photo ? $photo->getPathname() : '';
            $validated['photo']= $photo ? 'avatars/'.$user->login : '';
            if($photo){
                @mkdir('avatars');
                copy($photoPath, $validated['photo']);
                $user->photo = $validated['photo'];
            }
            $user->about = $validated['about'];
            $user->save();
        }
        if($user->email != $request->get('email') && $user->phone != $request->get('phone') && $user->login == $request->get('login')){
            $validated = $request->validate([
                'phone'=>'required|unique:users,phone',
                'email'=>'required|unique:users,email',
                'password'=>'nullable|string',
                'passwordrepeat'=>'nullable|string',
                'photo'=>'nullable|file',
                'about'=>'nullable|string'
            ]);
            $user->phone = $validated['phone'];
            $user->email = $validated['email'];
            if($validated['password']!='')
                $user->password=$validated['password'];
            $photo = $request->hasFile('photo') ? $request->file('photo') : false;
            $photoPath = $photo ? $photo->getPathname() : '';
            $validated['photo']= $photo ? 'avatars/'.$user->login : '';
            if($photo){
                @mkdir('avatars');
                copy($photoPath, $validated['photo']);
                $user->photo = $validated['photo'];
            }
            $user->about = $validated['about'];
            $user->save();
        }
        if($user->email != $request->get('email') && $user->phone != $request->get('phone') && $user->login != $request->get('login')){
            $validated = $request->validate([
                'email'=>'required|unique:users,email',
                'phone'=>'required|unique:users,phone',
                'login'=>'required|unique:users,login',
                'password'=>'nullable|string',
                'passwordrepeat'=>'nullable|string',
                'photo'=>'nullable|file',
                'about'=>'nullable|string'
            ]);
            $user->email = $validated['email'];
            $user->phone = $validated['phone'];
            $user->login = $validated['login'];
            if($validated['password']!='')
                $user->password=$validated['password'];
            $photo = $request->hasFile('photo') ? $request->file('photo') : false;
            $photoPath = $photo ? $photo->getPathname() : '';
            $validated['photo']= $photo ? 'avatars/'.$user->login : '';
            if($photo){
                @mkdir('avatars');
                copy($photoPath, $validated['photo']);
                $user->photo = $validated['photo'];
            }
            $user->about = $validated['about'];
            $user->save();
        }
        return redirect('/profile');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
