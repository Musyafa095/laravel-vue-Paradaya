<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view ('register');
    }
    public function welcome (request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input ('lastname') ;
        return view ('welcome', ['firstname' => $firstname, 'lastname' => $lastname]);
} 
}
?>

