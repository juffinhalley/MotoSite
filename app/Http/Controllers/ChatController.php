<?php

namespace App\Http\Controllers;

use App\User;
use App\Events\DialogueEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
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

    public function chat () 
    {
        return view('dialogue1');
    }

    public function send (request $request) 
    {
        $user = User::find(Auth::id());
        $message = $request->message;
        $userImage = "http://i.piccy.info/i9/08b48fb02898653748a373906bc4b910/1542135686/5284/1282027/image_45x45.jpg";
        event(new DialogueEvent($message, $user, $userImage));
    }
}
