<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Creating a Controller to upload a file

    public function uploadAvatar(Request $request)
    {
        if ($request->hasfile('image')) {
          User::uploadAvatar($request->image);
                    
          return redirect()->back()->with('message', 'Image Uploaded.');// Success Message
          
        }
        return redirect()->back()->with('error', 'Image not Uploaded.'); //Eror Message
    }

    //
    public function index()
    {
        $user = new User();
        // DB::insert('insert into users (name, email,password)
        //     values(?,?,?)', [
        //         'victor', 'victoraremu123@gmail.com', 'password'
        //     ]);

        DB::update('update users set name = ? where id = 4', ["mockingjay"]);

        // DB::delete('delete from users where id = 1');

        // $users = DB::select('select * from users');
        // return $users;

        // dd($user);

        // $user->name = 'victor';
        // $user->email = 'victoraremu123@gmail.com';
        // $user->password = bcrypt('password');


        // to delete a particular User from the table
        User::where('id', 4)->delete();

        User::where('id', 5) -> update(['name'=> 'password']);


        // $data = [
        //     'name' => 'victor',
        //     'email' => 'victor.aremu@amalitech.com',
        //     'password' => '12312',
        // ];

        // $user->save();
        // User::create($data);
        $user = User::all();
        return $user;



        return view('home');
    }
}
