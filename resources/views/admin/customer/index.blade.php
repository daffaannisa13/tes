@extends('layouts.main')

@section('title', "Customer | Dasarata")

@section('content-header')
    <h1>Customer</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route("dashboard") }}">Dashboard</a></div>
        <div class="breadcrumb-item">Customer</div>
    </div>
@endsection

@section('content-body') 
    <div class="col-md-6 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Seluruh Data Customer</h4>
            </div>
            <div class="card-body p-0">
                <p class="px-4">Berikut adalah daftar seluruh Customer.</p>
                <div class="m-3 d-flex align-items-center justify-content-end">
                    <button class="btn btn-success" data-toggle="modal" data-target="#add">Tambah Customer</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Paket</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->nama }}</td>
                                <td>{{ $customer->alamat }}</td>
                                <td>{{ $customer->no_telp }}</td>
                                <td>{{ $customer->paket->nama_paket }}</td>
                                <td>
                                    <button class="btn btn-info" 
                                            data-id="{{ $customer->id }}" 
                                            data-nama="{{ $customer->nama }}" 
                                            data-alamat="{{ $customer->alamat }}"
                                            data-no_telp="{{ $customer->no_telp }}" 
                                            data-paket="{{ $customer->paket->nama_paket }}"
                                            data-toggle="modal" 
                                            data-target="#detailModel-{{ $customer->id }}">Detail
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                {{ $customers->links() }}
            </div>
        </div>
    </div>
@endsection

@section("modal")
    {{-- modal create customer --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="add">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create a New Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route("customers.store")}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama">NAMA</label>
                                        <input type="text" class="form-control @error("nama") is-invalid @enderror" name="nama" value="{{old("nama")}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="alamat">ALAMAT</label>
                                        <input type="text" class="form-control @error("alamat") is-invalid @enderror" name="alamat" value="{{old("alamat")}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="no_telp">NO. TELEPON</label>
                                        <input type="text" class="form-control @error("no_telp") is-invalid @enderror" name="no_telp" value="{{old("no_telp")}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="paket_id">PAKET</label>
                                        <select name="paket_id" id="paket_id" class="form-control @error("paket_id") is-invalid @enderror">
                                            <option value="" selected disabled>-- Pilih Paket --</option>
                                            @foreach ($pakets as $paket)
                                                <option value="{{$paket->id}}">{{$paket->nama_paket}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal detail Customer--}}
    @foreach ($customers as $customer)
        <div class="modal fade" tabindex="-1" role="dialog" id="detailModel-{{ $customer->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('customers.update', $customer->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{ $customer->id }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="nama">NAMA</label>
                                            <input type="text" class="form-control" id="nama" name="nama"  value="{{ $customer->nama }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="alamat">ALAMAT</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $customer->alamat }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="no_telp">NO. TELEPON</label>
                                            <input type="number" class="form-control" id="no_telp" name="no_telp" value="{{ $customer->no_telp }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="paket_id">PAKET</label>
                                            <select name="paket_id" id="paket_id" class="form-control @error("paket_id") is-invalid @enderror">
                                                <option value="" selected disabled>-- Pilih Paket --</option>
                                                @foreach ($pakets as $paket)
                                                    <option value="{{ $paket->id }}" {{ $paket->id == $customer->paket_id ? 'selected' : '' }}>
                                                        {{ $paket->nama_paket }}
                                                    </option>
                                                @endforeach
                                            </select>
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