<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('access', 'asc')->get();
        return view('admin.account.data', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'id' => rand(0, 9999999),
            'name' => $request->name,
            'access' => $request->access,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => null,
        ];

        
        User::create($data);

        unset($data);
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
        $user = User::findOrFail($id);
        return view('admin/account/edite', [
            'user' => $user, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::findOrFail($id);
    
        $data->name = $request->name;
        $data->email = $request->email;
        $data->access = $request->access;

        if (!$request->password == '') {
            $data->password = bcrypt($request->password);
        }

        $data->update();

        unset($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete
        $data = User::findOrFail($id);

        $data->delete();

        unset($data);
    }
}
