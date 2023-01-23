<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use App\Mail\verifEmail;
use Exception;
use Illuminate\Queue\MaxAttemptsExceededException;
use  Illuminate\Support\Facades\Mail;
use Illuminate\Support\MessageBag;
use function PHPUnit\Framework\returnSelf;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{
    
    public function register( Request $request)
    {
        $cek= Validator::make($request->all(),[
            'email'=>'required | email',
            'password'=>'required',
            'username'=>'required'
            
        ],[
            'required'=>'Field tidak diisi',
            'email'=>'Format email tidak sesuai'
        ]);

        if($cek->fails())
        {
            
            return response()->json([
              'messageError'=>  $cek->errors(),
            ]); 
        }
        else{


                 try{
                        
                        $reg= User::create([
                            'name'=> $request->username,
                            'email'=>$request->email,
                            'password'=>Hash::make($request->password),
                        ])->save();

                     }
                catch(QueryException $e){

                        $err=$e->getCode();

                        if ($err==23000)
                        {
                            return response()->json([
                                'message'=>"Data akun yang anda input, telah terdaftar!"
                            ]) ;
                        }

                      }

                 return response()->json([
                    'message'=>"Data berhasil Ditambahkan! Silahkan melakukan verifikasi pada email Anda :)"
                 ]);
        }
        
    


    }

    public function authController(Request $request)
    {
        $credentials=$request->all();
        
        $cek=Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'],
            [
             'required'=>'Field tidak diisi, silahkan lengkapi!',
             'email'=>'Format email tidak sesuai'   
            ]);

       

        if($cek->fails()){
            return response()->json([
                'messageError'=>$cek->errors(),
            ]);

        }else{

           
          if (Auth::attempt($credentials)==1){

               $token=auth()->user()->createToken('MyApp')->accessToken;
               return response()->json([
            
                'token'=>$token,
                'message'=>'Berhasil Login'
                ]);  
           }
        
           else{
            return response()->json([
                'message'=>"gagal"
            ]);
           }
        }    
        
    }

    public function postLogin()
    {
        return response()->json([
            'message'=>'ini page beranda'
        ]);
    }

    public function logout(Request $request)
    {
          $lgo=Auth::user()->token()->delete();
          return response()->json([
            'message'=>'success to logout'
          ]);
    }
}
