<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\user;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller 
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        //hash sirve pra incriptar la contraseña
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            "status" => 1,
            "msg" =>"¡Registro de usuario existoso!",
        ]);
    }

    public function login(Request $request){

        $request->validate([
            "email"=>"requiered|email",
            "password"=>"requiered"
        ]);

        $user = User::where("email", "=", $request->email)->fist();
        //revisamos si el id es existente
        if(isset($user->id)){
            //creamos el token
            if(Hash::check($request->password, $user->password)){
                $token = $user ->createToken("auth_token")->plainTextToken;
                //i esta todo correcto
                return response()->json([
                    "status" => 1,
                    "msg" => "usuario correctamente logeado",
                    "access_token" =>$token
                ]);
            }
        }else{
            return response()->json([
                "status" => 0,
                "msg" => "usuario no encontrado"
            ]);
        }

    }

    public function userProfile(){
        return response()->json([
            "status" =>0,
            "msg" => "perfil de usuario",
            "data" => auth()->user()
        ]);
    }

    public function logout(Request $request){
        User::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');

    }
}
