<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index(){
        $profile = User::find( auth()->Id() );
        return view('admin.profile.edit',compact('profile'));
    }

    public function update(Request $request){
        $id = auth()->Id();
        $user = User::findOrFail( $id );

        $rules = [
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email,'.$id,
            'phone'         => 'required|unique:users,phone,'.$id,
        ];

        if( $request->password ){
            $rules['password'] = 'required|confirmed|min:8';
        }

        $this->validate($request,$rules);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        session()->flash('alert-success','Profile Updated Successfully');
        return back();
    }
}
