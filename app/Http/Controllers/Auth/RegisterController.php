<?php

namespace App\Http\Controllers\Auth;

use App\Escalao;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $escalao = Escalao::all();
        return view('pages.register',compact('escalao'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|string|max:255',
//            'email'    => 'required|string|email|max:255|unique:users',
            'identidade_militar'    => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if(User::all()->count() === 0 ){
            return User::create([
                'name'                => $data['name'],
//                'email'               => $data['email'],
                'nome_guerra'         => $data['nome_guerra'],
                'posto_graduacao'     => $data['posto_graduacao'],
                'identidade_militar'  => $data['identidade_militar'],
//                'om'                  => $data['om'],
//                'funcao'                  => $data['funcao'],
                'contato'             => $data['contato'],
                'escalao'             => $data['escalao'],
                'tipo'                => "Administrador",
                'password'            => bcrypt($data['password']),
            ]);
        }else{
            return User::create([
                'name'                => $data['name'],
//                'email'               => $data['email'],
                'nome_guerra'         => $data['nome_guerra'],
                'posto_graduacao'     => $data['posto_graduacao'],
                'identidade_militar'  => $data['identidade_militar'],
//                'om'                  => $data['om'],
//                'funcao'                  => $data['funcao'],
                'contato'             => $data['contato'],
                'escalao'             => $data['escalao'],
                'tipo'                => "Usuario",
                'password'            => bcrypt($data['password']),
            ]);
        }


    }
}
