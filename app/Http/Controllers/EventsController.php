<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index() 
    {
        return view('events.index');
    }

    public function add() 
    {
        return view('events.index');
    }

    public function create(Request $request)
    {
        // admin/news/createにリダイレクトする
        return redirect('events/index');
    }

}