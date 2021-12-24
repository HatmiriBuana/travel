@extends('layouts.layout')
@section('title')
Customer
@endsection
@section('content')
<div class="container">
    <div class="col-md-6">
        <a class="btn btn-primary" href="{{route('customer.create')}}">Input Customer</a>
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
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Telephone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customer as $data)
                                <tr>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->alamat}}</td>
                                    <td>{{$data->no_telp}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{route('customer.edit', $data->id)}}">edit</a>
                                        <form onsubmit="return confirm('Aakah anda yakin ingin menghapus?')" class="d-inline" action="{{route('customer.destroy', $data->id)}}" method="POST">
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
