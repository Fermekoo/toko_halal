<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use DB;
use Log;
use App\Traits\MasterTrait;
class BarangController extends Controller
{
    use MasterTrait;

    public function index()
    {
        $barang         = Barang::get();
        $data['barang'] = $barang;
        return view('barang', $data);
    }

    public function create(Request $request)
    {

        $uploadedFile = $request->file('gambar');        


        $path = $uploadedFile->store('public/files');

        $simpan = Barang::create([
            'kode_barang'   => $this->kodeBarang(),
            'nama_barang'   => strip_tags($request->namaBarang),
            'harga_jual'    => strip_tags($request->hargaJual),
            'harga_beli'    => strip_tags($request->hargaBeli),
            'satuan'        => strip_tags($request->satuan),
            'stock'         => strip_tags($request->stock),
            'gambar'        => $path
        ]);


        if($simpan){
            $msg = '<div class="alert alert-success">
            <strong>Berhasil !</strong> data berhasil disimpan.
          </div>';
        }else{
            $msg = '<div class="alert alert-danger">
            <strong>Gagal !</strong> data gagal disimpan.
          </div>';
        }

        redirect('barang')->with('msg',$msg);
    }

    public function update(Request $request)
    {
        $barang = Barang::find($request->barangId);

        $uploadedFile = $request->file('gambar');
        $path = $barang->gambar;
        if($uploadedFile){
            $path = $uploadedFile->store('public/files');
        }

        DB::beginTransaction();
        try{
            $barang->nama_barang = strip_tags($request->namaBarang);
            $barang->harga_jual  = strip_tags($request->hargaJual);
            $barang->harga_beli  = strip_tags($request->harga_beli);
            $barang->satuan      = strip_tags($request->satuan);
            $barang->stock       = strip_tags($request->stock);
            $barang->gambar      = $path;
            $barang->save();
        }catch(\Exception $e){
            DB::rollBack();
            Log::error($e->getMessage());
            $msg = '<div class="alert alert-danger">
            <strong>Gagal !</strong> data gagal disimpan.
          </div>';
          redirect('barang')->with('msg',$msg);
        }
        
        DB::commit();
        $msg = '<div class="alert alert-success">
            <strong>Berhasil !</strong> data berhasil disimpan.
          </div>';
        redirect('barang')->with('msg',$msg); 
    }

    public function delete(Request $request)
    {
        $delete = Barang::delete($request->kodeBarang);
        if($delete){
            $msg = '<div class="alert alert-success">
            <strong>Berhasil !</strong> data berhasil dihapus.
          </div>';
        }else{
            $msg = '<div class="alert alert-danger">
            <strong>Gagal !</strong> data gagal dihapus.
          </div>';
        }
    }
}
