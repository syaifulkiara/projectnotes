<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id', Auth::user()->id)->first();
        return view('profile.index', compact('users'));
    }
    public function edit($id)
    {
        $users = User::find($id);
        return view('profile.edit', compact('users'));
    }
    public function update(Request $request, $id)
    {
         $users = User::find($id);
         $users->name   = $request->name;
         $users->nik    = $request->nik;
         $users->no_hp  = $request->no_hp;
         if($request->file('avatar')) {
             $file = $request->file('avatar');
             $avatarname = time().str_replace(" ", "", $file->getClientOriginalName());
             $file->move('public/images/avatar', $avatarname);

             //File::delete(public_path($users->avatar));
             $users->avatar = '/images/avatar/'.$avatarname;
         }

        $users->save();
        return redirect()->route('profile.index');
    }
    public function changepassword()
    {
        $users = User::where('id', Auth::user()->id)->first();
        return view('profile.changepassword', compact('users'));
    }
    public function updatepassword(Request $request)
    {
        $request->validate([
            'oldpassword'       => 'required',
            'newpassword'       => 'required|min:8|max:100',
            'confirmpassword'   => 'required|same:newpassword'
        ]);

        $userpassword = auth()->user();
        if(Hash::check($request->oldpassword, $userpassword->password)){
                $userpassword->update([
                'password'      => bcrypt($request->newpassword)
            ]);

            return redirect()->back()->with('success', 'Password update');
        }else{
            return redirect()->back()->with('error', 'Old Password no match');
        }
    }
}
