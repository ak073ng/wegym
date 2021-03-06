<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class ApiRegisterController extends RegisterController
{
    /**
     * Handle a registration request for the application.
     *
     * @override
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $errors = $this->validator($request->all())->errors();

        if(count($errors))
        {
            return response()->json([
                'response' => $errors,
                'result' => 'failure',
                'message' => 'Authentication failed! - 401'
                ]);
        }

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);
        //return response(['user' => $user]);

        return response()->json([
            'response' => $user,
            'result' => 'success',
            'message' => 'Authentication succesful'
            ]);
    }
}
