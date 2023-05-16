<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Guest;
use App\Models\admin\Rooms;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Rooms::orderBy('name', 'asc')->get();
        $guest = Guest::with('rooms')->whereNull('deleted_at')->get();

        return view('admin.guest.data', [
            'room' => $rooms,
            'guest' => $guest,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Rooms::where('aksi', '1')->orderBy('name','asc')->get();
        $guest = Guest::with('rooms')->whereNull('deleted_at')->get();

        return view('admin.guest.form', [
            'room' => $rooms,
            'avaible' => $rooms->where('tipe', 'luxury')->count('tipe'),
            'avaible2' => $rooms->where('tipe', 'standart')->count('tipe'),
            'guest' => $guest,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'id' => rand(0, 9999999),
            'name' => $request->name,
            'number_id' => $request->idnum,
            'phone' => $request->phone,
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'room' => $request->room,
            'payment' => str_replace(',', '', $request->pay),
            'created_at' => now(),
            'updated_at' => null,
        ];

        
        Guest::create($data);

        $rooms = Rooms::findOrFail($request->room);
        $rooms->aksi = 0;
        $rooms->update();

        unset($data, $rooms);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        // soft delete
        $data = Guest::findOrFail($id);
    
        $data->deleted_at = now();
        $data->update();

        $rooms = Rooms::findOrFail($request->room);
        $rooms->aksi = 1;
        $rooms->update();

        unset($data, $rooms);

    }
}
