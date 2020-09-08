<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\MessageCreated;
use App\Message;
use App\UserInfo;
use App\ChatRoom;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            return redirect("/login");
        }
        $self_user_info = $user->UserInfo;
        $partner_user_info = UserInfo::where("user_id", (int)$request->user_id)->first();
        $chat_room = ChatRoom::whereJsonContains("user_info_json",[$self_user_info->id, $partner_user_info->id])->first();
        $messages = Message::where('chat_room_id', $chat_room->id)->get();
        return ["self_user_info" => $self_user_info, "partner_user_info" => $partner_user_info, "messages" => $messages];
    }

    public function send(Request $request) 
    {
        $params = $request->params;
        $post_user_info_id = $params["post_user_info_id"];
        $context = $params["context"];
        $user_ids = $params["user_ids"];
        $chat_room = ChatRoom::whereJsonContains("user_info_json", $user_ids)->first();
        $message = new Message;
        $message->post_user_info_id = $post_user_info_id;
        $message->chat_room_id = $chat_room->id;
        $message->context = $context;
        $message->save();

        event(new MessageCreated($message));
        return ["message" => $message];
    }

}
