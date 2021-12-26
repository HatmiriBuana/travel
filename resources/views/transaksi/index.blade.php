@extends('layouts.layout')
@section('title')
Transaksi
@endsection
@section('content')
<div class="container">
    <div class="col-md-6">
        <a class="btn btn-primary" href="{{route('transaksi.create')}}">Input Transaksi</a>
        <br>
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif    
    </div>
    <br>
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div
                ><div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th>Customer</th>
                                    <th>Trasportasi</th>
                                    <th>Tujuan Wisata</th>
                                    {{-- <th>Tanggal Transaksi</th> --}}
                                    <th>Tanggal Berangkat</th>
                                    <th>Berangkat</th>
                                    <th>Tiba</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi as $data)
                                <tr>
                                    <td>{{$data->customer->nama}}</td>
                                    <td>{{$data->transportasi}}</td>
                                    <td>{{$data->tujuan_wisata}}</td>
                                    {{-- <td>{{$data->tgl_transaksi}}</td> --}}
                                    <td>{{$data->tgl_berangkat}}</td>
                                    <td>{{$data->paket->jam_berangkat}}</td>
                                    <td>{{$data->paket->jam_tiba}}</td>
                                    <td>{{$data->jumlah}}</td>
                                    <td>Rp. {{number_format($data->paket->harga,2,',','.')}}</td>
                                    <td>Rp. {{number_format($data->total,2,',','.')}}</td>
                                    <td>
                                        {{-- {{dd($data->id)}} --}}
                                        <a class="btn btn-success" href="{{route('transaksi.edit', $data->id)}}">edit</a>
                                        <form onsubmit="return confirm('Aakah anda yakin ingin menghapus?')" class="d-inline" action="{{route('transaksi.destroy', $data->id)}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>                
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
            
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
    </div>
</div>
</div>

@endsection
