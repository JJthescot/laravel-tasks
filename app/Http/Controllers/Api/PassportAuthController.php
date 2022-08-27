<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class AuthController extends Controller
{
    /**
     * Registration Req
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
  
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
  
        $token = $user->createToken('Laravel9PassportAuth')->accessToken;
  
        return response()->json(['token' => $token], 200);
    }
  
    /**
     * Login Req
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
  
        if (auth()->attempt($data)) {
            $user = auth()->user();
            if ($user instanceof \App\Models\User){
                $token = $user->createToken('Laravel9PassportAuth')->accessToken;
                // $token = auth()->user()->createToken('Laravel9PassportAuth')->accessToken;
                return response()->json(['token' => $token], 200);
            }else{
                return response()->json(['error' => 'Unauthorised'], 401);
            }
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
 
    public function userInfo() 
    {
        $user = auth()->user();
        if ($user instanceof \App\Models\User){
            $user->createToken('');
            return response()->json(['user' => $user], 200);
        } 
        else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }

    }
}
