<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Officer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik sederhana untuk dashboard kamu
        $stats = [
            'totalMembers'   => Officer::count(),
            'totalDivisions' => 6,
            'totalContent'   => 0, // Nanti bisa diisi News::count()
        ];

        // Data kosong untuk inisialisasi awal UI kamu
        $events  = [];
        $news    = [];
        $gallery = [];

        return view('admin.dashboard', compact('stats', 'events', 'news', 'gallery'));
    }
}