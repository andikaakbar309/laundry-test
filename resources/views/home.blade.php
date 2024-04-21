@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card order-form">
                <div class="card-header">
                    <h3>Layanan</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                    </nav>
                </div>
                
                <div class="card-body">
                    @php($isEdit = isset($data))
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <form action="{{ route('order.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <input type="hidden" id="id" name="id" value="{{ $data->id ?? '' }}" />
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="layanan_id" class="form-label">Layanan</label>
                <select name="layanan_id" class="form-select" id="layanan_id">
                    <option value="">Pilih Layanan</option>
                    <option value="1">Test</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan Jumlah Satuan">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="no_telp" class="form-label">No Hp</label>
                <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="Masukan No Hp">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="total_harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="total_harga" name="total_harga" placeholder="" >
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="uang_bayar" class="form-label">Uang Bayar</label>
                <input type="number" class="form-control" id="uang_bayar" name="uang_bayar" placeholder="Masukan Jumlah Uang" >
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="kembalian" class="form-label">Kembalian</label>
                <input type="number" class="form-control" id="kembalian" name="kembalian" placeholder="">
            </div>
        </div>
        
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form> --}}
<script>
    function hitungKembalian() {
        var harga = parseFloat(document.getElementById('total_harga').value);
        var uangBayar = parseFloat(document.getElementById('uang_bayar').value);
        var kembalian = uangBayar - harga;

        if (!isNaN(kembalian) && kembalian >= 0) {
            document.getElementById('kembalian').value = kembalian;
        } else {
            document.getElementById('kembalian').value = 'Jumlah uang yang dibayarkan kurang';
        }
    }

    document.getElementById('total_harga').addEventListener('input', hitungKembalian);
    document.getElementById('uang_bayar').addEventListener('input', hitungKembalian);

    hitungKembalian();
</script>
@endsection
