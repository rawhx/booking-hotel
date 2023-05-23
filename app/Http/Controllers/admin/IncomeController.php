<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Guest;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function excelrooms()
    {
        $data = Guest::whereNot('deleted_at')->orderBy('deleted_at','asc')->get();
            
    }
}
