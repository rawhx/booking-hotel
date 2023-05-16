<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Guest;
use App\Models\admin\Rooms;
use DateTime;
use Illuminate\Http\Request;
use mysqli_result;

class ViewController extends Controller
{
    public function index()
    {
        $rooms = Rooms::where('aksi', '1');
        $guest = Guest::with('rooms')->orderBy('deleted_at','asc')->get();
        return view('admin.index', [
            'guest' => $guest->whereNull('deleted_at')->count(),
            'hguest' => $guest->where('deleted_at', !NULL)->count(),
            'payment' => $guest->where('deleted_at', !NULL)->sum('payment'),
            'rooms' => $rooms->count(),
        ]);
    }
    
    public function dashboard() {
        $rooms = Rooms::where('aksi', '1');
        $guest = Guest::with('rooms')->orderBy('deleted_at','asc')->get();
      
        //print_r($guest);
        return view('admin.dashboard.view', [
            'guest' => $guest->whereNull('deleted_at')->count(),
            'payment' => $guest->where('deleted_at', !NULL)->sum('payment'),
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
}
