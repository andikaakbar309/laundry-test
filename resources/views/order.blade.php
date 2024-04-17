@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-secondary table-striped table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Layanan</th>
                        <th class="text-center">Status Pembayaran</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                        <tr>
                            <td class="text-center">LNT-1</td>
                            <td class="text-center">{{ $item->konsumen->nama }}</td>
                            <td class="text-center">{{ $item->layanan->nama ?? '' }}</td>
                            <td class="text-center"><span class="badge text-bg-primary">{{ ucfirst(str_replace('_', ' ', $item->status_pembayaran)) }}</span></td>
                            <td class="text-center"><span class="badge text-bg-primary">{{ ucfirst($item->status) }}</span></td>
                            <td class="text-center">Rp. {{ $item->total_harga }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <span class="mdi mdi-dots-vertical" type="button" data-bs-toggle="dropdown" aria-expanded="false"></span>
                                    <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">Edit</a></li>
                                      <li><a class="dropdown-item" data-id="" href="#">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection