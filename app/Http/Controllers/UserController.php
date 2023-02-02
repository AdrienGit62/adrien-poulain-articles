<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function adminList()
    {
        $users = User::paginate(10);
        return view('admin.users.list', [
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
        return view('admin.users.create');
    }


    public function newAccount()
    {
        return view('admin.create-account');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUser = new User();
        $newUser->name = $request->get('username');
        $newUser->email = $request->get('useremail');
        $newUser->password = password_hash($request->get('password'), PASSWORD_DEFAULT);
        $newUser->save();
        return redirect('/admin/users/list');
    }

    public function createAccountStore(Request $request)
    {
        $newUser = new User();
        $newUser->name = $request->get('username');
        $newUser->email = $request->get('useremail');
        $newUser->password = password_hash($request->get('password'), PASSWORD_DEFAULT);
        $newUser->save();
        return redirect('/login');
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
        $user = User::where('id', $id)->firstOrFail();
        return view('admin.users.edit', [
            'user' => $user,
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
        $user = User::where('id', $id)->firstOrFail();

        $user->name = $request->get('username');
        $user->email = $request->get('useremail');
        if($request->get('password') != "") {
            $user->password = password_hash($request->get('password'), PASSWORD_DEFAULT);
        }

        $user->save();

        return redirect('/admin/users/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();
        
        return redirect('/admin/users/list');
    }
}
