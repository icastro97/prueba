<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'confirm_password'=>'required|same:password'
            ]);
            if ($validator->fails()) {  
                // return "Error";
                return $this->sendError(
                        'Error de validacion',
                        $validator->errors(),
                        422);
            }

            $input = $request->all();
            //ciframos el password
            $input['password'] = bcrypt($request->get('password'));
            $user = User::create($input);
            //creamos un nuevo token de autenticación
            $token = $user->createToken('laravel-passport')->accessToken;

            $data = [
                'token'=>$token,
                'user'=>$user
            ];
            // return "Exito";
            return $this->sendRespons($data,"Usuario registrado exitosamente");
 
    }

    public function login(Request $request) {
        $request->validate([
             'email' => 'required|string|email',
             'password' => 'required|string'
           ]);
        $credentials = request(['email', 'password']);
            // print_r($credentials);die;
            if(!Auth::attempt($credentials))
                return response()->json([
                    'message' => 'Unauthorized'
                ],401);
            $user = $request->user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]);
        }

        public function logout(Request $request)
        {
                $request->user()->token()->revoke();
                return response()->json([
                'message' => 'Sesion terminada'
                ]);
        }
}
