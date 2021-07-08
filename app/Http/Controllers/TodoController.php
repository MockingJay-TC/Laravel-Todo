<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    //

    public function index()
    {
        # code...
        $todos = Todo::all();
        // return $todos;
        return view('todos.index')->with(['todos' => $todos]);
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

        // if(!$request->title){
        //     return redirect()->back()->with('error','Please give title');
        // }
        // $request->validate([ 
        //     'title' => 'required|max:255',

        // ]);

        $rules = [
            'title' => 'required|max:25',
        ];
        $messages = [
            'title.max' => 'Todo title should not be greater than 255 chars.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Todo::create($request->all());

        return redirect()->back()->with('message', 'Todo Created Successfully');
    }
}
