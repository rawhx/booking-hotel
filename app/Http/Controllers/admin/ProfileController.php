<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function image(Request $request, string $id)
    {
        if ($request->hasFile('gambar')) {
            $profile = User::findOrFail($id);

            // Dapatkan path file gambar sebelumnya dari basis data atau variabel model
            $oldImagePath = $profile->profile;

            // Periksa apakah ada file gambar sebelumnya
            if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                // Hapus file gambar sebelumnya
                // Storage::delete($oldImagePath);
                Storage::disk('public')->delete($oldImagePath);
                
                $gambar = $request->file('gambar');
    
                // Simpan gambar ke direktori yang diinginkan
                $path = $gambar->store('public/admin/profile/gambar');
    
                // Lakukan aksi lain yang diperlukan, seperti menyimpan path gambar ke database, dll.
                $profile->profile = str_replace('public', "", $path);
                $profile->updated_at = now(); 
                $profile->update();
            }
            $gambar = $request->file('gambar');

            // Simpan gambar ke direktori yang diinginkan
            $path = $gambar->store('public/admin/profile/gambar');

            // Lakukan aksi lain yang diperlukan, seperti menyimpan path gambar ke database, dll.
            $profile->profile = str_replace('public', "", $path);
            $profile->updated_at = now(); 
            $profile->update();

            unset($profile);

            // return response()->json(['message' => 'Gambar berhasil diunggah.']);
        } else {
            return 'gagal';
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function password(Request $request, string $id)
    {
        $profile = User::findOrFail($id);
        $profile->password = bcrypt($request->password3);
        $profile->updated_at = now(); 
        $profile->update();

        unset($profile);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profile = User::findOrFail($id);
        $profile->name = $request->nama;
        $profile->username = $request->username;
        $profile->email = $request->email;
        $profile->address = $request->alamat;
        $profile->updated_at = now(); 
        $profile->update();

        unset($profile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
