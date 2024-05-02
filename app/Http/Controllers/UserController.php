<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function user()
    {
        $model = UserModel::orderBy('id')->get();
        return view('user.modelPelatihan',['models' => $model]);
    }
    public function user_tambah()
    {
        return view('user.user_tambah');
    }
    public function user_insert(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
        ]);

        // Ambil record terakhir dari tabel
        $lastRecord = userModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 2));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'JP' diikuti oleh angka yang telah diincrement
        $newId = 'MP' . str_pad($number, 3, '0', STR_PAD_LEFT);

        // Tambahkan ID yang telah diincrement ke dalam request
        $request->merge(['id' => $newId]);

        // Buat record baru menggunakan metode create
        userModel::create($request->all());

        return redirect('/kelola-model-pelatihan')->with(['success' => 'Data model Pelatihan berhasil ditambahkan', 'popUp_title' => 'Added!']);
    }
    public function user_edit($id)
    {
        $user = userModel::find($id);
        return view('user.user_edit', ['model' => $user]);
    }
    public function user_update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $pelatihan = userModel::find($request->id);
        $pelatihan->update($request->all());

        return redirect('/kelola-model-pelatihan')->with(['success' => 'Data Model Pelatihan berhasil diubah', 'popUp_title' => 'Updated!']);
    }
    public function user_delete($id)
    {
        userModel::find($id)->delete();

        return redirect('/kelola-model-pelatihan')->with(['success' => 'Data Model Pelatihan berhasil dihapus', 'popUp_title' => 'Deleted!']);
    }
}