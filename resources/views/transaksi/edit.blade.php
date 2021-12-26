@extends('layouts.layout')
@section('title')
Edit Transaksi
@endsection
@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{route('transaksi.update', $transaksi->id)}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <div class="form-group">
                            <label for="title">Nama</label>
                            <select name="customer_id" id="customer_id" class="form-control">
                                <option value="{{$transaksi->customer_id}}">{{$transaksi->customer->nama}}</option>
                                @foreach ($customer as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Paket</label>
                            <select name="paket_id" id="paket_id" class="form-control">
                                <option value="{{$transaksi->paket_id}}">{{$transaksi->paket->nama}}</option>
                                @foreach ($paket as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Transportasi</label>
                            <input type="text" name="transportasi" id="transportasi" class="form-control @error('transportasi') is-invalid @enderror" value="{{$transaksi->transportasi}}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Tujuan Wisata</label>
                            <input type="text" name="tujuan_wisata" id="tujuan_wisata" class="form-control @error('tujuan_wisata') is-invalid @enderror" value="{{$transaksi->tujuan_wisata}}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Jumlah</label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{$transaksi->jumlah}}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Tanggal Berangkat</label>
                            <input type="date" name="tgl_berangkat" id="tgl_berangkat" class="form-control @error('tgl_berangkat') is-invalid @enderror" value="{{$transaksi->tgl_berangkat}}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Tanggal Transaksi</label>
                            <input type="date" name="tgl_transaksi" id="tgl_transaksi" class="form-control @error('tgl_transaksi') is-invalid @enderror" value="{{$transaksi->tgl_transaksi}}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Simpan!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
