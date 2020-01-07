<?php

namespace Maqalist\Http\Controllers\Admin;

use Maqalist\User;
use Maqalist\Role;
use Gate;
use Illuminate\Http\Request;
use Maqalist\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users.childs.index-child')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Maqalist\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      if (Gate::denies('edit-users')) {
        return redirect(route('admin.users.index'));
      }
      $roles = Role::all();

      return view('admin.users.childs.edit-child')->with([
        'user' => $user,
        'roles' => $roles
      ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Maqalist\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Maqalist\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      $user->roles()->detach();
      $user->delete();

      return redirect()->route('admin.users.index');
    }
}
