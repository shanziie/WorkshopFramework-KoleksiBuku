@extends('layouts.master')

@section('content')
<div class="page-header">
  <h3 class="page-title"> Tambah Barang Baru </h3>
</div>

<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Barang</h4>
        <p class="card-description"> Masukkan data barang dengan benar </p>

        <form class="forms-sample" action="{{ route('barang.store') }}" method="POST">
          @csrf

          <div class="form-group">
            <label>ID Barang</label>
            <input type="text" class="form-control" name="id_barang"
                   placeholder="Contoh: 26022611" required>
          </div>

          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control" name="nama"
                   placeholder="Nama Produk" required>
          </div>

          <div class="form-group">
            <label>Harga</label>
            <input type="number" class="form-control" name="harga"
                   placeholder="Harga Satuan" required>
          </div>

          <button type="submit" class="btn btn-gradient-primary me-2">
              Simpan & Cetak
          </button>

          <a href="{{ route('barang.index') }}" class="btn btn-light">
              Batal
          </a>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection