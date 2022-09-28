<?php

namespace App\Http\Controllers;

use App\Models\Heroarea;
use App\Models\KategoriProduk;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
            return view('admin.dashboard');
       
    }
}