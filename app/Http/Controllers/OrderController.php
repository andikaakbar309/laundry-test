<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::with(['konsumen'])->latest()->get();

        return view('order', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $isEdit = $request->id ? true : false;

        $rules = [
            'nama' => 'required',
            'layanan_id' => 'required',
            'alamat' => 'required',
            'jumlah' => 'required',
            'no_telp' => 'required',
            'total_harga' => 'required'
        ];

        $request->validate($rules);

        if(!$isEdit) {
            $konsumen = Konsumen::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp
            ]);

            $order = Order::create([
                'konsumen_id' => $konsumen->id,
                'layanan_id' => $request->layanan_id,
                'total_harga' => $request->total_harga,
                'jumlah' => $request->jumlah,
            ]);
        } else {
            $konsumen = Konsumen::update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
            ]);

            $order = Order::update([
                'layanan_id' => $request->layanan_id,
                'total_harga' => $request->total_harga,
                'jumlah' => $request->jumlah,
            ]);

            if(!$konsumen && !$order) {
                return redirect()->back()->with([
                    'status' => 'error',
                    'message' => 'Error Terjadi',
                ]);
            }
        }

        return redirect()->route('order.index')->with([
            'status' => 'success',
            'message' => $isEdit ? 'Berhasil edit Order' : 'Berhasil menambah Order'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
