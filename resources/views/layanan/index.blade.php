@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-layanan">
                <div class="card-header">
                    <h3>Layanan</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Layanan</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    @php($isEdit = isset($data))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tambah Layanan
                                </button>
                            </div>
                            <div class="d-flex justify-content-left">
                                <form action="{{ route('layanan.index') }}" method="GET" class="mb-3" id="searchForm">
                                    <div class="input-group">
                                        <input type="text" name="search" id="search" class="form-control" placeholder="Cari Layanan" value="{{ $request->filled('search') ? $request->search : '' }}">
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Layanan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('layanan.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Layanan">
                                                    <label for="nama">Nama</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="harga" id="harga" class="form-control" placeholder="Masukan Harga Layanan">
                                                    <label for="nama">Harga</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-striped mb-4">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 10px">No</th>
                                            <th style="width: 200px">Nama</th>
                                            <th style="width: 200px">Harga</th>
                                            <th class="text-center" style="width: 80px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($layanan->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center">Data Kosong</td>
                                        </tr>
                                        @else
                                        @foreach ($layanan as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->index + 1 + ($layanan->currentPage() - 1) * $layanan->perPage() }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>Rp. {{ $item->harga }}</td>
                                            <td class="text-center">
                                                 <!-- Modal Edit -->
                                                 <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Layanan</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('layanan.store') }}" method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="id" id="id" value="{{ $item->id }}">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $item->nama }}" placeholder="Masukan Nama Layanan">
                                                                        <label for="nama">Nama</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" name="harga" id="harga" class="form-control" value="{{ $item->harga }}" placeholder="Masukan Harga Layanan">
                                                                        <label for="nama">Harga</label>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <span class="mdi mdi-dots-vertical"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            {{-- <a class="dropdown-item" href="{{ route('order.edit', ['order' => $item->id]) }}" title="Edit">Edit</a> --}}
                                                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">
                                                                Edit Layanan
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item delete" data-id="{{ $item->id }}" href="#"> Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mb-2">
                                    {{ $layanan->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
     document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.delete').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.getAttribute('data-id');
                
                Swal.fire({
                    icon: 'warning',
                    title: 'Apakah Anda yakin?',
                    text: 'Data akan dihapus!',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    customClass: {
                        popup: 'custom-size-popup',
                        confirmButton: 'btn btn-sm',
                        cancelButton: 'btn btn-sm',
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `layanan/${id}`,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: 'Data berhasil dihapus.',
                                    icon: 'success',
                                }).then(() => {
                                    window.location.reload();
                                });
                            },
                            error: function (xhr, status, error) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Gagal menghapus data.',
                                    icon: 'error',
                                });
                            },
                        });
                    }
                });
            });
        });
        document.getElementById('search').addEventListener('input', function() {
            document.getElementById('searchForm').submit();
        });
    });
    
</script>
@endsection