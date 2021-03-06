<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\ApiController;
use App\Models\Seguridad\segUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//use JWTAuth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\PayloadFactory;
use Tymon\JWTAuth\JWTManager as JWT;

class UsuarioController extends ApiController
{
    
    public function register(Request $request)
    {
        $reglas = [
            'username' => 'required',
            'enabled' => 'required', 
            'password' => 'required'
        ];

        $this->validate($request,$reglas);

        $campos = $request->all();
        $campos['password'] = bcrypt($request->password);


        $usuario = segUsuario::create($campos);

        /*return $this->showOne($usuario, 201);

        $validator = Validator::make($request->json()->all() , [
            'username' => 'required',
            'enabled' => 'required',
            'password' => 'required', 
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $user = segUsuario::create([
            'username' => $request->json()->get('username'),
            'enabled' => $request->json()->get('enabled'),
            'password' => Hash::make($request->json()->get('password')),
        ]);*/

        $token = JWTAuth::fromUser($usuario);

        return response()->json(compact('usuario','token'),201);
    }

    public function login(Request $request)
    {
        $credentials = $request->json()->all();

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json( compact('token') );
    }

    

    public function getAuthenticatedUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(compact('user'));
    }
}
