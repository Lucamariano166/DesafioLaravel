<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('adm/inicio');
  
    }

    public function Logout(){
        Auth::logout();
    return redirect('/login'); //redireciona o usuario para a pagina inicial
    }
    
}
