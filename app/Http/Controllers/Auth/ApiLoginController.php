<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use JWTAuth;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    /**
     * Authenticate an user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'code' => 1,
                    'result' => 'failure',
                    'message' => $validator->errors()
                ], 422);
        }

        if(Auth::attempt($credentials)){

            return response()->json([
                'response' => Auth::user(),
                'result' => 'success',
                'message' => 'Authentication succesful'
                ]);

        }else{

            return response()->json([
                'response' => "null",
                'result' => 'failure',
                'message' => 'Authentication failed.'
                ]);

        }

        // $token = JWTAuth::attempt($credentials);

        // if ($token) {
        //     return response()->json(['response' => $Auth::user()]);
        // } else {
        //     return response()->json(['code' => 2, 'message' => 'Invalid credentials.'], 401);
        // }
    }

    /**
     * Get the user by token.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser(Request $request)
    {
        JWTAuth::setToken($request->input('token'));
        $user = JWTAuth::toUser();
        return response()->json($user);
    }
}
