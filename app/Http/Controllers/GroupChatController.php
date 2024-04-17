<?php

namespace App\Http\Controllers;
use App\Models\GroupChatMessage;

use Illuminate\Http\Request;

class GroupChatController extends Controller
{
    public function index()
{
    $messages = GroupChatMessage::with('user')->get();
    return view('group_chat', compact('messages'));
}

public function sendMessage(Request $request)
{
    $message = new GroupChatMessage();
    $message->user_id = auth()->user()->id;
    $message->message = $request->input('message');
    $message->save();
    return redirect()->back();
}

public function deleteMessage($id)
{
    $message = GroupChatMessage::findOrFail($id);
    $message->delete();
    return redirect()->back()->with('success', 'Message deleted successfully');
}
}
