<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Customer;
use App\Models\Paket;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with(['customer', 'paket'])->get();
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        $paket = Paket::all();
        return view('transaksi.create', compact('customer', 'paket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new \App\Models\Transaksi;
        $data->transportasi = $request->transportasi;
        $data->tujuan_wisata = $request->tujuan_wisata;
        $data->jumlah = $request->jumlah;
        $data->tgl_berangkat = $request->tanggal_berangkat;
        $data->tgl_transaksi = $request->tanggal_transaksi;

        // findOrFail paket by id
        $paket = Paket::findOrFail($request->paket_id);
        $data->total = $paket->harga * $data->jumlah;

        $data->paket_id = $request->paket_id;
        $data->customer_id = $request->customer_id;
        $data->save();
        return redirect()->route('transaksi.index')->with('status', 'Berhasil menabah transaksi');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::where('id', $id)->with(['customer', 'paket'])->first();
        $customer = Customer::all();
        $paket = Paket::all();
        return view('transaksi.edit', compact('transaksi', 'customer', 'paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Transaksi::findOrFail($id);
        $data->transportasi = $request->transportasi;
        $data->tujuan_wisata = $request->tujuan_wisata;
        $data->jumlah = $request->jumlah;
        $data->tgl_berangkat = $request->tgl_berangkat;
        $data->tgl_transaksi = $request->tgl_transaksi;

        // findOrFail paket by id
        $paket = Paket::findOrFail($request->paket_id);
        $data->total = $paket->harga * $data->jumlah;

        $data->paket_id = $request->paket_id;
        $data->customer_id = $request->customer_id;
        $data->save();
        return redirect()->route('transaksi.index')->with('status', 'Berhasil mengedit transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Transaksi::findOrFail($id);
        $data->delete();
        return redirect()->route('transaksi.index')->with('status', 'Berhasil menghapus transaksi');
    }
}
