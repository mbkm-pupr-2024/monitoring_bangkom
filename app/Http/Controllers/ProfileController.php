<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function edit_profile()
    {
        $user = UserModel::orderBy('id')->get();
        return view('edit_profile',['users' => $user]);
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama_lengkap' => 'required',
            'username' => 'required',
        ]);

        $user = UserModel::find($request->id);
        $user->update($request->all());

        return redirect('/pelatihan-berlangsung')->with(['success' => 'Profil berhasil diubah', 'popUp_title' => 'Updated!']);
    }
    public function ubah_password()
    {
        return view('ubah_password');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        $user = UserModel::find($request->id);
        $oldPassword = $user->password;

        if($request->old_password != $oldPassword ){
            Redirect()->back()->with(['error' => 'Password gagal diubah', 'popUp_title' => 'Error!']);
        }

        $user = UserModel::find($request->id);
        $user->update('password', $request->new_password);

        return redirect('/pelatihan-berlangsung')->with(['success' => 'Password berhasil diubah', 'popUp_title' => 'Updated!']);
    }

}