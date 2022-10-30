<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use Exception;
use Illuminate\Support\Facades\DB;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $produks = produk::all();
            //  $produks = DB::table('produks')
            // ->join('kategoris', 'kategoris.id_kategori', '=', 'produks.id_kategori')
            // ->get();
            // $kategori=;
            $data=[
                'produks'=>ProdukModel::join('kategoris', 'kategoris.id_kategori', '=', 'produks.id_kategori')
            ->get(),
                'kategori'=>KategoriModel::all(),
            ];
        return view('tugas.produk', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tugas.produk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'nama' => 'required|string|max:255',
                'harga' => 'required|string|max:255',
                'deskripsi' => 'required',
                'stock' => 'required',
            ]);
            ProdukModel::insert([
                'nama' => $request->nama,
                'dekskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'stock' => $request->stock,
                'id_kategori' => $request-> kategori,
            ]); 
            
            return redirect('produk')->with('succes', 'Post Created Successfully');
        } catch (Exception $error) {
            dd($error);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
            $data = array(
            'produk_id' => $request->post('produk_id'),
            'kategori_id' => $request->post('kategori_id'),
            'nama' => $request->post('nama'),
            'deskripsi' => $request->post('deskripsi'),
            'harga' => $request->post('harga'),
            'stok' => $request->post('stok')
        );
        DB::table('produks')->where('produk_id', '=', $request->post('produk_id'))->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       
        $model=ProdukModel::find($id);
        $model->delete();
        return redirect('produk');
    }
}
