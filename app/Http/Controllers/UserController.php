<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function addUser(){
        return view('users.addUser');
    }
    public function createUser(Request $request){
        $request -> validate([
            'name'=> 'required|string|max:50',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:8',
            'phone'=> 'required'
        ]);
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            'user_type'=>3,
        ]);
        return redirect()->route('home')->with('message','User added with success!');
    }
    public function allUsers(){
        $users=User::all();
        return view('users.allUsers', compact('users'));
    }
    public function deleteUser($id){
        $user=User::findOrFail($id);
        $photoPath=$user->photo;
        $user->delete();
        if($photoPath!==null){
            Storage::delete($photoPath);
        }

        return redirect()->route('allUsers')->with('alert','Contact successfully deleted!');
    }
    public function viewUser($id){
        $user=User::where('id',$id)->first();
        return view('users.viewUser',compact('user'));
    }
    public function updateUser(Request $request){
        $request -> validate([
            'name'=> 'required|string|max:50',
            'password'=> 'required|min:8',
            'photo' => 'image',
            'phone' => 'required',

        ]);

        $userData=[
            'name'=>$request->input('name'),
            'password'=>Hash::make($request->input('password')),
            'phone'=>$request->input('phone'),
        ];

        if ($request->hasFile('photo')) {
            if(Storage::exists($request->oldphoto)){
                Storage::delete($request->oldphoto);
            }
            $userData['photo'] = Storage::putFile('userPhotos', $request->photo);
        }

        User::where('id',$request->id)
        ->update($userData);

        return redirect()->route('allUsers')->with('message','Contact successfully updated!');
    }
}
