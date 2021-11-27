<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        // ログインユーザー情報をViewに渡す
        $user = \Auth::user();
        return view('calender.index', compact('user'));
    }

    public function add(Request $request) 
    {
        $data = $request->all();
        // dd($data);
        $event = Events::insertGetId([
            'user_id' => $data['user_id'],
            'date' => $data['date'],
            'title' => $data['title'],
            'comment' => $data['comment'],
        ]);
        return redirect()->route('index'); 
    }
}
