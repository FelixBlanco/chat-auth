<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use App\Conversacion;
use App\Chat;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getConver(){
        $conversacion = Conversacion::get();
        return $conversacion;
    }

    public function newConver(Request $request){
        $c = new Conversacion($request->all());
        $c->save();
        return $c;
    }


    public function getChat($idConversacion){
        $Chats = Chat::where('conversacions_id',$idConversacion)
                        ->join('users','users.id','=','chats.users_id')
                        ->get();
        return $Chats;
    }

    public function storeChat(Request $request){
        $mensaje = new Chat($request->all());
        $mensaje->users_id = Auth::id();
        $mensaje->save();
    }
}
