<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ User, Role };
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Debugbar;

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

        $users = User::withTrashed()->get();
        //var_dump($adminRole).die();
        Debugbar::info('test');
        return view('admin.users.index', [
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
        $roles = Role::all();
        return view('admin.users.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $userData = Arr::except($validated, ['roles']);
        $user = Arr::add($userData, 'password', Hash::make('password'));

        $user = User::create($user);
        $user->roles()->sync($validated['roles']);

        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        DebugBar::info("id {$id}");
        $user = User::withTrashed()->where('id', $id)->get()->first();
        return view('admin.users.show', [
            'user' => $user
        ]);
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
        $user = User::withTrashed()->findOrFail($id);
        return view('admin.users.edit')->with([
            'user' => $user,
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

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    public function restore(Request $request, $id)
    {
        try {
            $user = User::onlyTrashed()->where('id', $id)->restore();
        } catch (ModelNotFoundException $e) {
            Debugbar::error("Error!", $e->getMessage());
        }
        return redirect()->route('admin.users.index');
    }
}
