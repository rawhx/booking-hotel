<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Guest;
use App\Models\admin\Rooms;
use App\Models\User;

class ViewController extends Controller
{
    public function index()
    {
        $rooms = Rooms::where('aksi', '1');
        $guest = Guest::with('rooms')->orderBy('deleted_at','asc')->get();
        $pay = 0;

        foreach ($guest as $income)  {
            if(date('Y-m', strtotime($income['deleted_at']))  == date('Y-m', strtotime(now())) ) {
                $pay += $income['payment'];
            }
        }
        return view('admin.index', [
            'guest' => $guest->whereNull('deleted_at')->count(),
            'hguest' => $guest->where('deleted_at', !NULL)->count(),
            'pay' => $pay,
            'rooms' => $rooms->count(),
        ]);
    }
    
    public function dashboard() {
        $rooms = Rooms::where('aksi', '1');
        $guest = Guest::with('rooms')->orderBy('deleted_at','asc')->get();
        $pay = 0;

        foreach ($guest as $income)  {
            if(date('Y-m', strtotime($income['deleted_at']))  == date('Y-m', strtotime(now())) ) {
                $pay += $income['payment'];
            }
        }

        return view('admin.dashboard.view', [
            'guest' => $guest->whereNull('deleted_at')->count(),
            'pay' => $pay,
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
        $total = 0;
        $data=[];

        foreach ($guest as $item) {
            $tanggal = date('d-M-Y', strtotime($item['deleted_at']));
            $harga = $item['payment']; 
            
            if (!isset($data[$tanggal])) {
                $data[$tanggal] = $harga;
            } else {
                $data[$tanggal] += $harga;
            }

            $total += $harga;
        }

        return view('admin.income-room.view', [
            'data' => $data,
            'total' => $total,
        ]);
    }
    
    public function accounts()
    {
        $user = User::orderBy('access', 'asc')->get();
        return view('admin.account.view', [
            'user' => $user,
        ]);
    }
}
