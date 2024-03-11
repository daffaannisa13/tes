<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pakets = Paket::query()->latest()->paginate(5);

        $title = "Hapus Paket!";
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view("admin.paket.index", [
            "pakets" => $pakets
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input terlebih dahulu
        $validator = Validator::make($request->all(), [
            "nama_paket" => "required|max:50",
            "harga_paket" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with("errorCreatePaket", "Gagal Menambahkan Paket Baru");
        }

        // menerima input yang sudah tervalidasi
        $validated = $validator->validated();

        Paket::query()->create($validated);

        return redirect()->route("pakets.index")->with("successCreatePaket", "Berhasil Menambahkan Paket Baru");
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request,$id)
{
    $paket = Paket::query()->find($id);    
    if (!$paket) {
        abort(404, 'Paket not found');
    }
    
    // Validasi input atau langkah-langkah lain yang diperlukan sebelum update
    
    $paket->nama_paket = $request->nama_paket;
    $paket->harga_paket = $request->harga_paket;
    
    $paket->update();
    
    // dd($paket);
    return redirect()->route("pakets.index")->with("successUpdatePaket", "Data Paket Berhasil Di Update.");
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $paket = Paket::query()->findOrFail($id);

            $paket->delete();

            return redirect()->route("pakets.index")->with("successDeletePaket", "Data Paket Berhasil Di Delete.");
        } catch (QueryException $e) {
            return back()->with("errorDeletePaket", "Gagal menghapus data paket: " . $e->getMessage());
        }
    }
}
