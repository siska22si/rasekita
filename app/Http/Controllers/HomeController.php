<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $menu = DB::table("menu")->get(); // Missing semicolon and get() method added to execute the query
        return view('HomeUser.index', compact('menu')); // Sesuaikan dengan nama file blade Anda, misalnya 'home.blade.php'
    }

    public function listmenu()
    {
        $menu = DB::table("menu")->get(); // Missing semicolon and get() method added to execute the query
        return view('HomeUser.menu', compact('menu')); // Sesuaikan dengan nama file blade Anda, misalnya 'home.blade.php'
    }

    public function detailmenu($id)
    {
        $menu = DB::table("menu")->where('id_makanan', $id)->first(); // Fixed spacing and semicolon
        return view('HomeUser.menu-detail', compact('menu')); // Sesuaikan dengan nama file blade Anda, misalnya 'home.blade.php'
    }
}
