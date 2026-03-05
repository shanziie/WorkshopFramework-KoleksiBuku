@extends('layouts.master')

@section('content')
<div class="page-header">
  <h3 class="page-title"> Edit Data Barang </h3>
</div>

<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Edit Barang</h4>
        <p class="card-description"> Ubah data barang di bawah ini </p>

        <form class="forms-sample"
        action="{{ route('barang.update', $barang->id_barang) }}"
        method="POST">
        @method('PUT')
          @csrf

          <div class="form-group">
            <label>ID Barang</label>
            <input type="text"
                   class="form-control"
                   name="id_barang"
                   value="{{ $barang->id_barang }}"
                   readonly>
          </div>

          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text"
                   class="form-control"
                   name="nama"
                   value="{{ $barang->nama }}"
                   required>
          </div>

          <div class="form-group">
            <label>Harga</label>
            <input type="number"
                   class="form-control"
                   name="harga"
                   value="{{ $barang->harga }}"
                   required>
          </div>

          <button type="submit"
                  class="btn btn-gradient-primary me-2">
              Update & Cetak
          </button>

          <a href="{{ route('barang.index') }}"
             class="btn btn-light">
              Batal
          </a>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection