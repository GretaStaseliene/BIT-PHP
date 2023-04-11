<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index() {
        return 'User is logged';
    }

    public function login(Request $request) {
        try {
            $data = [
                'email' => $request->email,
                'password' => $request->password
            ];

            // 401 statusas reiskia, kad nepavyko autentifikuoti userio
            if(!auth()->attempt($data))
                return response('Wrong login info', 401);

            return [
                'message' => 'User successfully logged in',
                'token' => auth()->user()->createToken('ReactToken')->plainTextToken
            ];

        } catch(\Exception $e) {
            return response('Something went wrong, please try login again', 500);
        }
    }

    public function register(Request $request) {
        try {
            $data = new User; 
                
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);

            $data->save();

            return [
                'message' => 'User successfully registered',
                'token' => $data->createToken('ReactToken')->plainTextToken
            ];

        } catch(\Exception $e) {
            return response('User was not registered', 500);
        }
    }

    public function logout() {
        try {
            auth()->user()->tokens->each(function($token) {
                $token->delete();
            });

            return 'Successfully logged out';
        } catch(\Exception $e) {
            return response('Server Error', 500);
        }
    }


}
