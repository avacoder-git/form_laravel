<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view("includes.users.index", ['users'=>$users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('includes.users.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $inputs =$request->validate([
            'name'=>'required|max:255',
            'family_name'=> 'required|max:255',
            'email'=> 'required',
            'password'=> 'required',
            'image'=>'file'
        ]);

        if(request('image'))
        {
            $inputs['image'] = request('image')->store('images');
        }
        $inputs['is_active'] = 0;
        session()->flash("created", $inputs['name']." - Muvafaqiyatli yaratildi!");
        $user = new User();


        $user->create($inputs);


        return redirect()->route('users.admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $users = User::all();
        return view('includes.users.show', ['users'=>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('includes.users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $inputs =$request->validate([
            'name'=>'required|max:255',
            'family_name'=> 'required|max:255',
            'email'=> 'required',
            'password'=> 'required',
            'image'=>'file'
        ]);

        if(request('image'))
        {
            $inputs['image'] = request('image')->store('images');
            $user->image = $inputs['image'];
        }
        $inputs['is_active'] = 0;
        session()->flash("updated", $inputs['name']." - Muvafaqiyatli o'zgartirildi!");

        $user->name = $inputs['name'];
        $user->family_name = $inputs['family_name'];
        $user->email = $inputs['email'];
        $user->password = $inputs['password'];
        $user->is_active = 0;
        $user->save();

        return redirect()->route('users.admin');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash("deleted", "Foydalanuvchi o'chirildi");
        return redirect()->route("users.admin");
    }


    public function checkbox(Request $request)
    {
        $users = User::all();

        foreach ($users as $user)
        {
            $checkbox = "checkbox_".$user->id;
            $user->is_active = isset($request[$checkbox])?1:0;
            $user->save();
        }

        session()->flash('activeness', "Aktivliklar o'zgartirildi");
        return redirect()->route('users.admin');

    }
}
