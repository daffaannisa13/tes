@extends('layouts.main')

@section('title', "Paket | Dasarata")

@section('content-header')
    <h1>Paket</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route("dashboard") }}">Dashboard</a></div>
        <div class="breadcrumb-item">Paket</div>
    </div>
@endsection

@section('content-body') 
    <div class="col-md-6 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Seluruh Data Paket</h4>
            </div>
            <div class="card-body p-0">
                <p class="px-4">Berikut adalah daftar seluruh paket.</p>
                <div class="m-3 d-flex align-items-center justify-content-end">
                    <button class="btn btn-success" data-toggle="modal" data-target="#add">Tambah Paket</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>NAMA PAKET</th>
                            <th>HARGA PAKET</th>
                            <th>ACTION</th>
                        </tr>
                        @foreach ($pakets as $paket)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $paket->nama_paket }}</td>
                                <td>{{ $paket->harga_paket }}</td>
                                <td>
                                    <a href="{{ route('pakets.destroy', $paket->id) }}" class="btn btn-danger" 
                                        data-confirm-delete="true">Delete</a>
                                    <button class="btn btn-info" 
                                        data-id="{{ $paket->id }}"
                                        data-nama_paket="{{ $paket->nama_paket }}"
                                        data-harga_paket="{{ $paket->harga_paket }}"
                                        data-toggle="modal" 
                                        data-target="#detailModel-{{ $paket->id }}">Detail
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                {{ $pakets->links() }}
            </div>
        </div>
    </div>
@endsection

@section("modal")
    {{-- modal create paket --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="add">
        <!-- ... your existing modal code ... -->
    </div>

  {{-- Modals for each paket --}}
@foreach ($pakets as $paket)
    <div class="modal fade" tabindex="-1" role="dialog" id="detailModel-{{ $paket->id }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               <form action="{{ route('pakets.update', $paket->id) }}" method="post">
        @csrf
        @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="id" value="{{ $paket->id }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="nama_paket">Nama Paket</label>
                                        <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="{{ $paket->nama_paket }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="harga_paket">Harga Paket</label>
                                        <input type="number" class="form-control" id="harga_paket" name="harga_paket" value="{{ $paket->harga_paket }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection

@section("libjs")
    <script src="{{ asset("assets/library/prismjs/prism.js") }}"></script>
@endsection

@section("js")
    <script src="{{ asset("assets/js/page/bootstrap-modal.js") }}"></script>
@endsection