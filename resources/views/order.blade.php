@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-order">
                <div class="card-header">
                    <h3>Order</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    @php($isEdit = isset($data))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tambah Order
                                </button>
                            </div>
                            <div class="d-flex justify-content-left">
                                <form action="{{ route('order.index') }}" method="GET" class="mb-3" id="searchForm">
                                    <div class="input-group">
                                        <input type="text" name="search" id="search" class="form-control" placeholder="Cari order" value="{{ $request->filled('search') ? $request->search : '' }}">
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah order</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('order.store') }}" method="POST">
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
                                                                @foreach ($layanan as $item)
                                                                <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">{{ $item->nama }}</option>
                                                                @endforeach
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
                                                            <input type="number" class="form-control" id="total_harga" name="total_harga" placeholder="" readonly>
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
                                                            <input type="number" class="form-control" id="kembalian" name="kembalian" placeholder="" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-striped mb-4">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 10px">No</th>
                                            <th style="width: 200px">Kode</th>
                                            <th style="width: 200px">Konsumen</th>
                                            <th style="width: 200px">Layanan</th>
                                            <th style="width: 200px">Status Pembayaran</th>
                                            <th style="width: 200px">Status</th>
                                            <th style="width: 200px">Total Harga</th>
                                            <th class="text-center" style="width: 80px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($order->isEmpty())
                                        <tr>
                                            <td colspan="8" class="text-center">Data Kosong</td>
                                        </tr>
                                        @else
                                        @foreach ($order as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->index + 1 + ($order->currentPage() - 1) * $order->perPage() }}</td>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->konsumen->nama }}</td>
                                            <td>{{ $item->layanan->nama }}</td>
                                            <td>{{ ucwords(str_replace('_', ' ', $item->status_pembayaran)) }}</td>
                                            <td><span class="badge text-bg-warning">{{ ucfirst($item->status) }}</span></td>
                                            <td>Rp.  {{ $item->total_harga }}</td>
                                            <td class="text-center">
                                                
                                                <div class="dropdown">
                                                    <button class="btn p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <span class="mdi mdi-dots-vertical"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            {{-- <a class="dropdown-item" href="{{ route('order.edit', ['order' => $item->id]) }}" title="Edit">Edit</a> --}}
                                                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">
                                                                Edit order
                                                            </button>
                                                        </li>
                                                        <li><a class="dropdown-item" data-id="{{ $item->id }}" href="#" title="Delete">Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mb-2">
                                    {{ $order->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function formatNumber(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function hitungHarga() {
        var layananId = document.getElementById('layanan_id').value;
        var jumlah = document.getElementById('jumlah').value;

        if (layananId === '' || jumlah === '') {
            document.getElementById('total_harga').value = '';
            return;
        }

        var hargaPerItem = parseFloat(document.querySelector('option[value="' + layananId + '"]').getAttribute('data-harga'));
        
        if (isNaN(hargaPerItem)) {
            document.getElementById('total_harga').value = '';
        } else {
            var total = hargaPerItem * jumlah;

            document.getElementById('total_harga').value = total;
        }
    }


    document.getElementById('layanan_id').addEventListener('change', hitungHarga);
    document.getElementById('jumlah').addEventListener('input', hitungHarga);

    hitungHarga();

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
    
    document.getElementById('search').addEventListener('input', function() {
        document.getElementById('searchForm').submit();
    });
</script>
@endsection