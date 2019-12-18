<?php

use Illuminate\Database\Seeder;
use App\Barang;
use App\Traits\MasterTrait;
class BarangSeeder extends Seeder
{
    use MasterTrait;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'kode_barang' => $this->kodeBarang(),
                'nama_barang' => 'Sajadah',
                'harga_jual'  => 70000,
                'harga_beli'  => 40000,
                'satuan'      => 'pcs',
                'stock'       => 30,
                'gambar'      => 'sajadah.jpg',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s")
            ],
            [
                'kode_barang' => $this->kodeBarang(),
                'nama_barang' => 'Kurma',
                'harga_jual'  => 60000,
                'harga_beli'  => 25000,
                'satuan'      => 'kg',
                'stock'       => 15,
                'gambar'      => 'kurma.jpg',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s")
            ],
            [
                'kode_barang' => $this->kodeBarang(),
                'nama_barang' => 'Tasbih',
                'harga_jual'  => 35000,
                'harga_beli'  => 10000,
                'satuan'      => 'pcs',
                'stock'       => 10,
                'gambar'      => 'tasbih.jpg',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s")
            ]
        ];

        Barang::insert($data);
    }


}
