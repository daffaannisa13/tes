<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Models\Paket;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    // Menggunakan eager loading untuk memuat relasi User dan Paket
    $customers = Customer::with(['user', 'paket'])->latest()->paginate(5);

    // Mengambil semua paket dari model Paket
    $pakets = Paket::all();

    // Mengambil semua pengguna dari model User
    $users = User::all();

    $title = "Hapus Pelanggan!";
    $text = "Are you sure you want to delete?";
    confirmDelete($title, $text);

    return view("admin.customer.index", [
        "customers" => $customers,
        "pakets" => $pakets,
        "users" => $users, // Tambahkan ini
    ]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input terlebih dahulu
        $validator = Validator::make($request->all(), [
            "nama" => "required|max:255",
            "alamat" => "required|max:255",
            "no_telp" => "required|max:20",
            "paket_id" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with("errorCreateCustomer", "Gagal Menambahkan Pelanggan Baru");
        }

        // Menerima input yang sudah tervalidasi
        $validated = $validator->validated();

        Customer::create($validated);

        return redirect()->route("customers.index")->with("successCreateCustomer", "Berhasil Menambahkan Pelanggan Baru");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
{
    $customer = Customer::query()->find($id);

    if (!$customer) {
        abort(404, 'Customer not found');
    }

    // Validasi input atau langkah-langkah lain yang diperlukan sebelum update

    $customer->nama = $request->nama;
    $customer->alamat = $request->alamat;
    $customer->no_telp = $request->no_telp;
    $customer->paket_id = $request->paket_id;

    // untuk mengetahui yang update data itu siapa
    $customer->save();

    return redirect()->route("customers.index")->with("successUpdateCustomer", "Data Pelanggan Berhasil Di Update.");
}

    }
        

