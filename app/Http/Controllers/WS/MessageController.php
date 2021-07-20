<?php

namespace App\Http\Controllers\WS;

use App\Events\MessageSend;
use App\Events\PrivateEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request){
        $message = $request->input('message');

        if (strlen($message)) {
            event(new MessageSend($message));
        }
    }


    public function privateEvent(Request $request)
    {
        $message = $request->input('message');
        $user = $request->input('user');

        if (strlen($message)) {
            event(new PrivateEvent($user,$message));
        }
    }
}
