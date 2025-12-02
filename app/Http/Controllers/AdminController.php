<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Film;
use App\Models\Message;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $filmCount = Film::count();
        $messageCount = Message::count();
        return view('admin.index', compact('userCount','filmCount','messageCount'));
    }
}
