<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Front\FrontController;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class LoginController extends FrontController
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    public function __construct()
    {
        $this->middleware('guest', ['except' => 'sair']);
    }

    public function index()
    {
        return view('login');
    }

    public function entrar()
    {

        if(auth()->attempt(['email'=>request()->get('endemail'),'password'=>request()->get('password')])){

                return \Redirect::to('admin/dashboard');

        }

        return redirect()->route('entrar.pagina')->with('alerta','Login ou senha incorretos.');
    }

    public function sair()
    {
        auth()->logout();
        return redirect()->route('entrar.pagina');
    }

}