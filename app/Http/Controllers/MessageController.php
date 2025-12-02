<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'subject'=>'nullable|string|max:255',
            'message'=>'required|string'
        ]);
        Message::create($data);
        return redirect()->route('contact.create')->with('success','Köszönjük az üzenetet!');
    }

    public function index()
    {
        // csak bejelentkezettek látják (route middleware)
        $messages = Message::orderBy('created_at','desc')->paginate(20);
        return view('messages.index', compact('messages'));
    }
}
