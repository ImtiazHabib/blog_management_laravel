<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use Psy\Command\ThrowUpCommand;
use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(AuthRequest $request){
        

         try{
         $request->validated();

         $user = new User();

         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = Hash::make($request->password);

         $user->save();

         return redirect('/login_page')->with('success',"registration successful");
         }catch(Throwable $e){
            Log::channel('auth_error')->error('registration failed',[
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
            ]);
         }
    }

    public function register_page(){
        return view('auth.register');
    }

    public function login_page(){
        return view('auth.login');
    }

    public function login(Request $request){

       

        try{
            $request->validate([
            "email" => ['required','email'],
            "password" => ['required','min:4'],
        ]);

        $user = User::where('email',$request->email)->first();

        // password check
        if($user && Hash::check($request->password,$user->password)){
            // create token and go to post page
            $token = JWTToken::CreateToken($user->email,$user->id);

            return redirect('/manage_post')->cookie('token',$token,60*24);
        }
        }catch(Throwable $e){
        Log::channel('auth_error')->error('Login failed',[
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
            ]);
        }
    }

    public function logout(){
        
       

        try{
          

            return redirect('/')->cookie('token','',-1);
        
        }catch(Throwable $e){
Log::channel('auth_error')->error('Login failed',[
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
            ]);
        }
    }
}
