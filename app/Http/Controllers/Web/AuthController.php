<?php

namespace GitScrum\Http\Controllers\Web;

use GitScrum\Http\Requests\AuthRequest;
use GitScrum\Models\User;
use GitScrum\Models\MainUser;
use Socialite;
use Auth;
use SocialiteProviders\Manager\Exception\InvalidArgumentException;
use Session;

class AuthController extends Controller
{
    public function __construct()
    {
       
    } 
 
    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('home');
    }

    public function redirectToProvider($provider)
    {  
       
        if($provider=='github'){
            return Socialite::driver('github')
                ->scopes(['repo', 'notifications', 'read:org'])
                ->redirect();
        }
        if($provider=='google'){
             return Socialite::driver('google')->redirect();   
             
        }
        //ahora, los redirect se van a la ruta que te mostre
        
        if($provider=='trello'){
             //de aca
             return Socialite::driver('trello')->redirect();   
        }
        if($provider=='slack'){
            return Socialite::driver('slack')->redirect();      
        }
    }
 
    public function handleProviderCallback($provider)
    {
        //viene aca
        /// que hacen referencia a esta funcion
    
        
        if (\Request::has('denied')) {
            return redirect()->route('auth.login');
            //en caso haya seleccionado cancelar
            //redirige a la ruta de nombre auth.login
        }


        $providerUser = Socialite::driver($provider)->user();
        //$proviuder User obtiene los datos del usuario
        /// del que se authentica
        //dd($providerUser);
        

        ///aqui viene lo complejo
        //app()->tplUser($providerUser);
        //eso es un helper
        // que tiene como paramtero el provider['guthub','trello','slack','etc']
        //ucFirst hace el primer caracter en mayuscula
        ///Github
        //ahora, este app()
        //llama a una clase que estan en app\clasess, lo llama de acuerdo al provider
        //si es github llama a la clase Github
        //y ejecutaria una funcion Github->tplUser($providerUser);
        $data = app(ucfirst($provider))->tplUser($providerUser);  
        // y se obiene los datos relevantes del usuario  
        //dd($data);

        if($provider=='google'){
            //si el proveedor es de titpo google,
            // significa que es un login o registro
            // asi que se crea un usuario MainUser

            $user= MainUser::updateOrCreate(['provider_id'=>$data['provider_id']],$data);
        }
        else{

                /// si el proveedor es de otro tipo
                    // se crea un Uusario
            /// cabe resaltar que main user maximo puede tener 3 usuarios
            // cada usuario corresponde a un tipo de proveedor ['github','trello','slack']
            /// lo separ por que en cada 1 las credenciales son diferentes y los datos de usuarios son diferentes
        /// bueno solo eso
            User::updateOrCreate(['provider_id'=>$data['provider_id']],$data);    
            switch ($provider) {
                case 'github':
                    Auth::user()->github=1;
                    break;
                case 'trello':
                    Auth::user()->trello=1;
                    break;
                case 'slack':
                    Auth::user()->slack=1;
                    break;
            }
            Auth::user()->save();
            return redirect()->route('wizard.step1',$provider);

        }
        
        
        
        if($provider=='google')auth()->login($user);
         

        return redirect()->route('user.dashboard');
    }
}
