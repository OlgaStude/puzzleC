<?php

namespace App\Http\Controllers;

use App\Http\Requests\adressRequest;
use App\Http\Requests\loginRequest;
use App\Http\Requests\RegistrationValidationRequest;
use App\Models\Goods;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class forAllController extends Controller
{
    public function addtokart(Request $req){
        Goods::where("id", $req->id)->update(["in_the_kart" => 1]);
    }

    public function delete(Request $req){
        Goods::where("id", $req->id)->update(["in_the_kart" => 0]);
        return $req->id;
    }

    public function checkright(adressRequest $req){
        return redirect('payment');
    }

    public function loginUser(loginRequest $req)
    {
        $formFields = $req->only(['email', 'password']);


        if (Auth::attempt($formFields)) {
            $user = User::where("email", $formFields['email'])->get();
            return redirect()->back();
        }

        return redirect()->back()->withErrors([
            'formError' => 'Не верный логин или пароль'
        ]);
    }

    public function addUser(RegistrationValidationRequest $req){
        

            $user = User::create(array_merge($req->validated(), ['password' => Hash::make($req->password)]));
            if($user){
                Auth::login($user);
                return redirect()->back();
            }
        return redirect('mainpage');
    }
}
