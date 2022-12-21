<?php

namespace App\Http\Controllers;

class TodoitemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('todolist.index', ['title' => 'Todo list']);
    }
}
