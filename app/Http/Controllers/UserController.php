<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate();
        return view('dashboard.user.index', compact('users'));
    }


    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserRequest $request)
    {
        var_dump($request->email);
        $avatar = 'avatar_default.png';
        if ($request->avatar){
            $avatar = $request->avatar;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->input('password')),
            'description' => $request->description,
            'avatar'=> $avatar,
            'coint' => 0
        ]);

        return redirect()->route('user.index')->with('message', 'User saved successfully');
    }


    public function show($id)
    {

    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('id', 'DESC')->get();
        return view('dashboard.user.edit', compact('user','roles'));
    }


    public function update(Request $request, User $user)
    {
        $user->assignRole($request->role);
        $user->update($request->all());
        return redirect()->route('user.index')
            ->with('success', 'User Updated Successfully.'.$request->role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
