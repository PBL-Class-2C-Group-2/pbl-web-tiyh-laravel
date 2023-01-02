<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $beritajumlah = Berita::all();
        return view('AdminDashboard.dashboard', [
            'berita' => $beritajumlah
        ]);
    }
}
