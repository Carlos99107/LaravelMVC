<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function __construct(){
        $this->middleware('auth',['except' => ['registerUser']]);
    }
    public function index(){
            $users=User::all();
            return view ('user.index')->with('users',$users);
    }
    public function create(){
         return view('user.create');
    }

    public function store (Request $request){
        $users= new User();;
        $users->name=$request->get('name');
        $users->email=$request->get('email');
        $users->password=bcrypt($request->get('password'));
        $users->save();
        return redirect('/user');
    }
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
        $user = User::find($id);
        return view('user.edit')->with('user',$user);
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
        $user = User::find($id);
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password=$request->get('password');
        $user->save();
        return redirect('/user');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user');
    }

}
