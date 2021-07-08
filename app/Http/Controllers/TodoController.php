<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //

    public function index()
    {
        # code...
        return view('todos.index');
    }
    public function create()
    {
        # code...
        return view('todos.create');
    }

    public function edit()
    {
        # code...
        return view('todos.edit');
    }

    public function store(Request $request)
    {
        # code...
        // dd($request->all());

        if(!$request->title){
            return redirect()->back()->with('error','Please give title');
        }
        Todo::create($request->all());

        return redirect()->back()->with('message', 'Todo Created Successfully');
    }
}
