<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
// use \GuzzleHttp\Client AS Http;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Login User
     * use AJAX Calls && Token Based Authantication
     * @method POST
     */
    public function login(Request $request){

        return response()->json( $request );

        $response = Http::asForm()->post("http://127.0.0.1:8001/oauth/token", [
            'grant_type' => 'password',
            'client_id' => config('services.passport.client_id'),
            'client_secret' => config('services.passport.client_secret'),
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return response()->json(["status" => 200, "data"=> $response->json()]);

        // $http = new \GuzzleHttp\Client;

        // try {
        //     $response = $http->post("http://127.0.0.1:8001/oauth/token", [
        //         'form_params' => [
        //            'grant_type' => 'password',
        //             'client_id' => config('services.passport.client_id'),
        //             'client_secret' => config('services.passport.client_secret'),
        //             'username' => $request->username,
        //             'password' => $request->password,
        //         ]
        //     ]);

        //     return response()->json(["status" => 200, "data"=> $response]);
        //     // return $this->successWithData($response->getBody());
        // } catch (\GuzzleHttp\Exception\BadResponseException $e) {
        //     if ($e->getCode() === 400) {
        //         return response()->json('Invalid Request. Please enter a username or a password.', $e->getCode());
        //     } else if ($e->getCode() === 401) {
        //         return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
        //     }

        //     return response()->json('Something went wrong on the server.', $e->getCode());
        // }
    }


    /**
     * Logout User
     * @method POST
     */
    public function logout(Request $request){

    }


    /**
     * Register new User
     * use AJAX Calls && Token Based Authantication
     * @method POST
     */
    public function register(Request $request){

    }

}
