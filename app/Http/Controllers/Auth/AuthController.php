<?php
  
namespace App\Http\Controllers\Auth;
  
use Hash ;
use Session ;
use App\Models\User;
use App\Models\Client;
use App\Models\UserVerify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function index()
    {
        return view('auth.login');
    }  
      

    public function registration()
    {
        return view('auth.registration');
    }
      
 
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user=Auth::user();
            if($user->role=='admin'){
                 return redirect()->intended('admin/dashboard')
                        ->withSuccess('You have Successfully loggedin');
            }elseif($user->role=='client'){
                return redirect()->intended('client/dashboard')
                        ->withSuccess('You have Successfully loggedin');
            }elseif($user->role=='mecanicien'){
                return redirect()->intended('mecanicien/dashboard')
                        ->withSuccess('You have Successfully loggedin');
            }
           
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
      
   
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'adresse' => 'required',
            'telephone' => 'required',
            'password' => 'required|min:6',
            'role'=>'client'
        ]);
        $data = $request->all();
      
        $check = $this->create($data);
            
        return redirect("login")->withSuccess('Great! You have Successfully loggedin');

    }
    

    public function dashboard()
    {               
        $user=Auth::user();
        if($user->role=='client'){
            if(Auth::check()){
                return view('client/dashboard');  
            }
        }
        elseif($user->role=='admin'){
            if(Auth::check()){
                return view('admin/dashboard');  
            }
        }
        elseif($user->role=='mecanicien'){
            if(Auth::check()){
                return view('mecanicien/dashboard');  
            }
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    
 
    public function create(array $data)
    {
      User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'adresse'=>$data['adresse'],
        'telephone'=>$data['telephone'],
        'password' => Hash::make($data['password']),
        'role'=>'client'
      ]);
        Client::create([
        'name' => $data['name'],
        'adresse'=>$data['adresse'],
        'telephone'=>$data['telephone'],
      ]);
    }
    

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect()->route('login')->with('message', $message);
    }
}