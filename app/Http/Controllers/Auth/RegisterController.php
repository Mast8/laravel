<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB;
use Mail;

class RegisterController extends Controller
{
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
    protected $redirectTo = '/home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'usuario' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //         'password_confirmation' => 'required|string|min:6',
            
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'usuario' => $data['usuario'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request) {
        
        $this->validate( $request, [
        'usuario' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required|string|min:6',
         ]);
         
        $input = $request->all();
          $user = $this->create($input)->toArray();
          $user['link'] = str_random(30);
  
          DB::table('tokens')->insert(['id_user'=>$user['id'],'token'=>$user['link']]);
          //dd($user);
          Mail::send('mensajes.activar', $user, function($message) use ($user){
            $message->to($user['email']);
            $message->subject('Gestione - Codigo de activacion');
          });
          return redirect()->to('login')->with('success',
          "Se le envio un mensaje de confirmacion, por favor revise su correo");
    }
  
      public function activar($token){
        $check = DB::table('tokens')->where('token',$token)->first();
        if(!is_null($check)){
          $user = User::find($check->id_user);
          
          if ($user->activado == 1){
            return redirect()->to('login')->with('success',
            "Su cuenta ya se encuentra activada");
          }
          
          $activado = User::where('id', $user->id)
              ->update([   
              'activado'=> 1,
          ]);
          if($activado){
            DB::table('tokens')->where('token',$token)->delete();
            return redirect()->to('login')->with('success',"Su cuenta fue activada");
          }  
        }
        return redirect()->to('register')->with('error',"Su codigo no es el correcto");
      }
}
