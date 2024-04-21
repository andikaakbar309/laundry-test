<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $layanan = Layanan::query();

        if ($request->filled('search') && $request->search != '') {
            $layanan->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('harga', 'like', '%' . $request->search . '%');
        }

        $layanan = $layanan->simplePaginate(10);

        return view('layanan.index', compact('layanan', 'request'));
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
            'harga' => 'required'
        ];

        $request->validate($rules);

        $data = [
            'nama' => $request->nama,
            'harga' => $request->harga
        ];

        if(!$isEdit) {
            $result = Layanan::create($data);
        } else {
            $result = Layanan::find($request->id)->update($data);

            if(!$result) {
                return redirect()->back()->with([
                    'status' => 'error',
                    'message' => 'Gagal Update Layanan',
                ])->withInput();
            }
        }

        return redirect()->route('layanan.index')->with([
            'status' => 'success',
            'message' => $isEdit ? 'Berhasil Edit Layanan' : 'Berhasil Menambah Layanan',
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
    public function destroy($id)
    {
        $layanan = Layanan::find($id);

        $layanan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil hapus data.',
        ]);
    }
}
