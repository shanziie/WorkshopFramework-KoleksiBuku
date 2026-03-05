@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title">
                        Manajemen & Cetak Tag Harga UMKM (TnJ 108)
                    </h4>

                    <a href="{{ route('barang.create') }}"
                       class="btn btn-gradient-primary btn-md">
                        <i class="mdi mdi-plus"></i> Tambah Barang
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- FORM CETAK TAG --}}
                <form action="{{ route('barang.pdf_tag') }}" method="POST" target="_blank">
                    @csrf

                    <div class="row mb-4 p-3 border-light border rounded"
                         style="background-color: #fcfcfc;">
                         
                        <div class="col-md-3">
                            <label>Mulai Kolom (X: 1-5)</label>
                            <input type="number" name="x"
                                   class="form-control"
                                   min="1" max="5" value="1" required>
                        </div>

                        <div class="col-md-3">
                            <label>Mulai Baris (Y: 1-8)</label>
                            <input type="number" name="y"
                                   class="form-control"
                                   min="1" max="8" value="1" required>
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit"
                                    class="btn btn-gradient-info">
                                Cetak Label Terpilih
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="tableBarang" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Pilih</th>
                                    <th>ID Barang</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barangs as $b)
                                <tr>
                                    <td>
                                        <input type="checkbox"
                                               name="ids[]"
                                               value="{{ $b->id_barang }}">
                                    </td>
                                    <td>{{ $b->id_barang }}</td>
                                    <td>{{ $b->nama }}</td>
                                    <td>
                                        Rp {{ number_format($b->harga,0,',','.') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('barang.edit', $b->id_barang) }}"
                                           class="btn btn-sm btn-inverse-warning">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tableBarang').DataTable();
    });
</script>
@endsection