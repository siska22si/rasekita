<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;
use DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $data = Menu::select('menu.nama_makanan', 'menu.id_makanan', 'menu.stok', 'menu.cover', 'menu.harga')
        ->paginate(10); // Adjust the pagination as needed

    $totalMenu = Menu::count();

    return view('menu.index', compact('data', 'totalMenu'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar_cover' => 'required|image|mimes:jpg,jpeg,png',
            'nama_makanan' => 'required',
            'stok' => 'required|integer',
            'harga' => 'require'
        ]);

        $gambar_cover = $request->file('cover');
        $gambar_cover->storeAs('public/cover', $gambar_cover->getClientOriginalName());

        DB::table('menu')->insert([
            'gambar_cover' => $gambar_cover->getClientOriginalName(),
            'nama_makanan' => $request->nama_makanan,
            'stok' => $request->stok,
            'harga' => $request->harga
        ]);

        return redirect()->route('menu.index')->with(['success' => 'Data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Implement if needed
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Mengambil data menu berdasarkan id
        $data = DB::table('menu')->where('id_makanan', $id)->first();

        return view('menu.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_makanan' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required'
        ]);

        DB::table('menu')->where('id_makanan', $id)->update([
            'nama_makanan' => $request->nama_makanan,
            'stok' => $request->stok,
            'harga' => $request->harga
        ]);

        return redirect()->route('menu.index')->with(['success' => 'Data berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('menu')->where('id_makanan', $id)->delete();

        // Redirect to index
        return redirect()->route('menu.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
