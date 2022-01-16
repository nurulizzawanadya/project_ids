@extends('layout/main_layout')
@section('title', 'Data Toko')

@section('css_custom')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="card">
            <div class="card-header section-title mt-0">
                    <h4>Data Toko</h4>
            </div>
            @if(count($errors) > 0)
                <div class="alert alert-danger-dismissible show fade">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('berhasil'))
                <div class="col-sm-12">
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            <strong>Success,</strong>
                            {{ Session::get('berhasil') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="button"> 
                <a href="{{ url('insertToko') }}" class="btn btn-icon icon-left btn-primary" style="margin-left: 25px"><i class="far fa-edit"></i> Tambah Data Toko</a>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                <table id="id_toko" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class= "text-center" scope="col">Barcode</th>
                            <th class= "text-center" scope="col">ID</th>
                            <th class= "text-center" scope="col">Toko</th>
                            <th class= "text-center" scope="col">Latitude</th>
                            <th class= "text-center" scope="col">Longitude</th>
                            <th class= "text-center" scope="col">Accuracy</th>
                            <th class= "text-center" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($toko as $data)
                        <tr align="center">
                            <td float="center">
                                {!! \DNS1D::getBarcodeHTML($data -> barcode,'C128') !!}
                                {{ $data -> nama_toko }} 
                            </td>
                            <td>{{ $data -> barcode }}</td>
                            <td>{{ $data -> nama_toko }}</td>
                            <td>{{ $data -> latitude }}</td>
                            <td>{{ $data -> longitude }}</td>
                            <td>{{ $data -> accuracy }}</td>
                            <td>
                                <a href="cetak_toko/{{$data->barcode}}"><button type="button" class="btn btn-outline-info"><i class="far fa-file"></i></button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<script>
$(document).ready( function () {
$('#id_toko').DataTable();
} );
</script>
@endsection