@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-secondary table-striped table-responsive">
            <thead>
                <tr>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Layanan</th>
                    <th class="text-center">Status Pembayaran</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Harga</th>
                </tr>
            </thead>
            <tbody>
                @if ($order->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Data Kosong</td>
                </tr>
                @else
                @foreach ($order as $item)
                <tr>
                    <td class="text-center">LNT-1</td>
                    <td class="text-center">{{ $item->konsumen->nama }}</td>
                    <td class="text-center">{{ $item->layanan->nama ?? '' }}</td>
                    <td class="text-center"><span class="badge text-bg-primary">{{ ucfirst($item->status_pembayaran) }}</span></td>
                    <td class="text-center"><span class="badge text-bg-primary">{{ ucfirst($item->status) }}</span></td>
                    <td class="text-center">Rp. {{ $item->total_harga }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection