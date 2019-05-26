<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class ProfilesController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.profiles.edit')->with('user', Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'facebook' => 'required|url',
            'youtube' => 'required|url',
            'about' => 'required'
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {

            $_user_image = $request->avatar;

            $_user_image_name = time() . $_user_image->getClientOriginalName();

            $_user_image->move('uploads/avatars/', $_user_image_name);

            $user_image_path = 'uploads/avatars/' . $_user_image_name;

            $user->profile->avatar = $user_image_path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;
        $user->profile->about = $request->about;
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        $user->profile->save();

        Session::flash('success', 'Profile was updated successfuly');

        return redirect()->back();

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
