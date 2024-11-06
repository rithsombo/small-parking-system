<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $data = User::all();
        return view('user.user', compact('data'));
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user')->with('success', 'User deleted successfully');
    }
    public static function index_update(Request $request)
    {
        $user_id = $request->query('id');
        $data = User::find($user_id);
        return view('user.userupdate', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find($request->id);
        if ($user) {
            $user->username = $request->input('username');
            $user->password = $request->input('password');
            if ($request->hasFile('image')) {
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('photo'), $imageName);
                $user->photo = $imageName;
            }
            $user->save();
        }

        return redirect(route('user'));
    }
    public function index_create()
    {
        return view('user.usercreate');
    }
    public function create(Request $request)
    {
        $user = new User();
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        if ($user->save()){
            if (isset($request->image)){
                $imageName = time().'.'.$request->image->extension();
                $profile =  $request->image->move(public_path('photo'), $imageName);
                $user->photo = $imageName;
                $user->save();
            }
        }
        return redirect(route('user'));
    }
}
