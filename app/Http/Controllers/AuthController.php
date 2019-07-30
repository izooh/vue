<?php

namespace App\Http\Controllers;
use App\User;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
      //verify the data from the forminput
      $request->validate([
        'email'=>'required',
        's_id'=>'required',
        'name'=>'required',
        'password'=>'required'
      ]);
      //creating a new user account

      $user= User::firstOrNew(['email'=>$request->email]);
      $user->name=trim($request->name);
      $user->email=trim($request->email);
      $user->s_id=trim($request->s_id);
      $user->password=bcrypt($request->password);
      $user->save();

      //requesting a new token

      $http = new Client;


$response = $http->post('http://skywave/oauth/token', [
    'form_params' => [
      'grant_type' => 'password',
      'client_id' =>'2',
      'client_secret' => 'svZ1OjFmEe7b4bNXGbj2Sv2Gk6HhaB5N3bGWn0Ov',
      'username' => $request->email,
      'password' => $request->password,
        'scope' => '',
    ],
]);

return response(['data'=>json_decode((string) $response->getBody(), true)]);

    }
    public function login(Request $request)
    {
      //verify the data from the forminput
      $request->validate([
        'email'=>'required',

        'password'=>'required'
      ]);
      $user=User::where('email',$request->email)->first();
      if(!$user){
        return response(['status'=>'error','message'=>'user dont exist']);
      }
      if(Hash::check($request->password,$user->password)){

              //requesting a new token

              $http = new Client;


        $response = $http->post('http://skywave/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 2,
                'client_secret' => 'svZ1OjFmEe7b4bNXGbj2Sv2Gk6HhaB5N3bGWn0Ov',
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '',
            ],
        ]);

        return response(['data'=>json_decode((string) $response->getBody(), true)]);

      }

    }
    public function logout(){
      return 'loggedout';
    }
}
