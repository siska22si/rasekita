<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = DB::table('menu')
            ->select('menu.cover', 'menu.id_makanan', 'menu.nama_makanan', 'menu.stok', 'menu.harga')
            ->get();
        $menu=DB::table("menu")->count();
        return view('admin.dashboard', compact('menu', 'data')); // Sesuaikan dengan nama file blade Anda, misalnya 'home.blade.php'
    }

}
