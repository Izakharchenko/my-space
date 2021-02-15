<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ User, Role };
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // for ($i = 0; $i < 10; $i++) {
        // $adminRole = Role::where('name', 'author')->first();
        // $admin = User::create([
        //     'name' => "Ivan${i}",
        //     'email' => "author112${i}@gmail.com",
        //     'password' => Hash::make('password'),
        // ]);
        // $admin->roles()->attach($adminRole);
        // $admin->save();
        // }

        $users = User::all();
        //var_dump($adminRole).die();
        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        return view('admin.user.edit')->with([
            'user' => User::findOrFail($id),
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        // return redirect()->route('admin.user.index');
        return response('OK', 200);
    }
}
