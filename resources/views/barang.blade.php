@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Barang</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button type="button" class="btn btn-outline-success" data-target="#add-modal" data-toggle="modal">Tambah Data</button>
                    <br>
                    <br>
                    @if(!empty($msg))
                        {{ $msg }}
                    @endif

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga Jual</th>
                                <th>Harga Beli</th>
                                <th>Stock</th>
                                <th>Satuan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barang as $row)
                            <tr>
                                <td>{{ $row->kode_barang }}</td>
                                <td>{{ $row->nama_barang }}</td>
                                <td>Rp. {{ number_format($row->harga_jual) }}</td>
                                <td>Rp. {{ number_format($row->harga_beli) }}</td>
                                <td>{{ $row->stock }}</td>
                                <td>{{ asset('storage/'.$row->gambar) }}</td>
                                <td><button type="button" class="btn btn-outline-info btn-sm" data-id="{{ $row->kode_barang }}" data-nama="{{ $row->nama_barang}}" data-jual="{{ $row->harga_jual }}" data-beli="{{ $row->harga_beli }}" data-stock="{{ $row->stock }}" data-satuan="{{ $row->satuan }}" data-gambar="{{ $row->gambar }}" id="btn-edit" data-toggle="modal" data-target="#edit-modal">Ubah</button> <button type="button" class="btn btn-outline-danger btn-sm" id="btn-delete" data-toggle="modal" data-target="#delete-modal">Hapus</button></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal tambah Data -->
<div class="modal fade" id="add-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="" class="was-validated" action="{{ route('save_barang') }}" method="POST" enctype="multipart/form-data">
          {!! csrf_field() !!}
            <div class="form-group">
              <label for="uname">Nama Barang</label>
              <input type="text" class="form-control" placeholder="Sepatu" name="namaBarang" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
              <label for="pwd">Harga Jual</label>
              <input type="number" class="form-control" placeholder="120000" name="hargaJual" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
              <label for="pwd">Harga Beli</label>
              <input type="number" class="form-control" placeholder="50000" name="hargaBeli" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
              <label for="pwd">Satuan</label>
              <input type="text" class="form-control" placeholder="Unit / pcs / Kg" name="satuan" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group">
              <label for="pwd">Stock</label>
              <input type="text" class="form-control" placeholder="10" name="stock" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
              <label for="pwd">Gambar</label>
              <input type="file" class="form-control" name="gambar" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal edit Data -->
<div class="modal fade" id="edit-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="" class="was-validated" action="{{ route('update_barang') }}" method="POST" enctype="multipart/form-data">
          {!! csrf_field() !!}
          <input name="_method" type="hidden" value="PUT">
          <input type="hidden" name="kodeBarang" id="kode">
            <div class="form-group">
              <label for="uname">Nama Barang</label>
              <input type="text" class="form-control" placeholder="Sepatu" name="namaBarang" id="nama" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
              <label for="pwd">Harga Jual</label>
              <input type="number" class="form-control" placeholder="120000" name="hargaJual" id="jual" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
              <label for="pwd">Harga Beli</label>
              <input type="number" class="form-control" placeholder="50000" name="hargaBeli" id="beli" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
              <label for="pwd">Satuan</label>
              <input type="text" class="form-control" placeholder="Unit / pcs / Kg" name="satuan" id="satuan" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group">
              <label for="pwd">Stock</label>
              <input type="text" class="form-control" placeholder="10" name="stock" id="stock" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
              <label for="pwd">Gambar</label>
              <input type="file" class="form-control" name="gambar" id="gambar" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal hapus Data -->
<div class="modal fade" id="delete-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Hapus Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="" class="was-validated" action="{{ route('delete_barang') }}" method="POST">
          {!! csrf_field() !!}
          <input name="_method" type="hidden" value="DELETE">
          <input type="hidden" name="kodeBarang" id="kode">
          <p>Anda yakin ingin menghapus data ini ?</p>   
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="simpan">Yakin</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        </div>
        </form>
      </div>
    </div>
  </div>


<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script>
  $(document).on('click','#btn-edit', function(){
    var id        = $(this).data('id');
    var nama      = $(this).data('nama');
    var jual      = $(this).data('jual');
    var beli      = $(this).data('beli');
    var satuan    = $(this).data('satuan');
    var stock     = $(this).data('stock');
    var gambar    = $(this).data('gambar');

    $(".modal-body #kode").val(id);
    $(".modal-body #nama").val(nama);
    $(".modal-body #jual").val(jual);
    $(".modal-body #beli").val(beli);
    $(".modal-body #satuan").val(satuan);
    $(".modal-body #stock").val(stock);
    $(".modal-body #gambar").val(gambar);
  });

  $(document).on('click','#btn-delete', function(){
    var id        = $(this).data('id');

    $(".modal-body #kode").val(id);
  });
</script>
@endsection
