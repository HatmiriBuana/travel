@extends('layouts.layout')
@section('title')
Edit Paket
@endsection
@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{route('paket.update', $paket->id)}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <div class="form-group">
                            <label for="title">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$paket->nama}}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Jam Berangkat</label>
                            <input type="time" name="jam_berangkat" id="jam_berangkat" class="form-control @error('jam_berangkat') is-invalid @enderror" value="{{$paket->jam_berangkat}}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Jam Tiba</label>
                            <input type="time" name="jam_tiba" id="jam_tiba" class="form-control @error('jam_tiba') is-invalid @enderror" value="{{$paket->jam_tiba}}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{$paket->harga}}">
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