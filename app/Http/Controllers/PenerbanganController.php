<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penerbangan;
use illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;    

class PenerbanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("home_admin");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('maskapai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        FacadesSession::flash('gambar', $request->gambar);
        FacadesSession::flash('nama_maskapai', $request->nama_maskapai);
        FacadesSession::flash('nomor_maskapai', $request->nomor_maskapai);
        FacadesSession::flash('asal', $request->asal);
        FacadesSession::flash('tujuan', $request->tujuan);
        FacadesSession::flash('waktu_keberangkatan', $request->waktu_keberangkatan);
        FacadesSession::flash('waktu_kedatangan', $request->waktu_kedatangan);
        FacadesSession::flash('harga', $request->harga);

        $data = $request->validate( [
            'gambar'=> 'required|image|mimes:jpg,png,jpeg|max:2048',
            'nama_maskapai' => 'required|string|max:255',
            'nomor_maskapai' => 'required|integer|max:255',
            'asal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'waktu_keberangkatan' => 'required|date',
            'waktu_kedatangan' => 'required|date'
        ], [
            'gambar.required' => 'Gambar maskapai harus diisi',
            'nama_maskapai.required' => 'Nama maskapai harus diisi',
            'nomor_maskapai.required' => 'Nomor maskapai harus diisi',
            'asal.required' => 'Asal maskapai harus diisi',
            'tujuan.required' => 'Tujuan maskapai harus diisi',
            'waktu_keberangkatan.required' => 'Waktu keberangkatan harus diisi',
            'waktu_kedatangan.required' => 'Waktu kedatangan harus diisi'
        ]);

            
        penerbangan::create($data);
        return redirect()->route('home_admin')->with('success', 'Penerbangan berhasil ditambahkan');
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
