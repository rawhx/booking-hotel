<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Guest;
use App\Models\admin\Rooms;

class ViewController extends Controller
{
    public function index()
    {
        $rooms = Rooms::where('aksi', '1');
        $guest = Guest::with('rooms')->orderBy('deleted_at','asc')->get();
        return view('admin.index', [
            'guest' => $guest->whereNull('deleted_at')->count(),
            'hguest' => $guest->where('deleted_at', !NULL)->count(),
            'payment' => $guest->where('deleted_at', !NULL),
            'rooms' => $rooms->count(),
        ]);
    }
    
    public function dashboard() {
        $rooms = Rooms::where('aksi', '1');
        $guest = Guest::with('rooms')->orderBy('deleted_at','asc')->get();
      
        return view('admin.dashboard.view', [
            'guest' => $guest->whereNull('deleted_at')->count(),
            'payment' => $guest->where('deleted_at', !NULL),
            'hguest' => $guest->where('deleted_at', !NULL)->count(),
            'rooms' => $rooms->count(),
        ]);
    }
    
    public function guest()
    {
        $rooms = Rooms::where('aksi', '1')->orderBy('name','asc')->get();
        $guest = Guest::with('rooms')->whereNull('deleted_at')->get();

        // return response()->json(['guest' => $guest, 'room' => $rooms]);

        return view('admin.guest.view', [
            'room' => $rooms,
            'avaible' => $rooms->where('tipe', 'luxury')->count('tipe'),
            'avaible2' => $rooms->where('tipe', 'standart')->count('tipe'),
            'guest' => $guest,
        ]);
    }

    public function history()
    {   
        $guest = Guest::with('rooms')->whereNot('deleted_at')->orderBy('deleted_at','asc')->get();

        return view('admin.history-booking.view', [
            'guest' => $guest,
        ]);
    }

    public function profile()
    {
        return view('admin.profile.view');
    }

    public function income_rooms()
    {
        $guest = Guest::whereNot('deleted_at')->orderBy('deleted_at','asc')->get();

        return view('admin.income-room.view', [
            'guest' => $guest,
        ]);
    }
}
