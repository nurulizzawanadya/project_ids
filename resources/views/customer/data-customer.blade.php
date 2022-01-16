@extends('layout/main_layout')
@section('title', 'Data Customer')

@section('css_custom')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="card">
            <div class="card-header section-title mt-0">
                    <h4>Data Customer</h4>
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
                <a href="{{ route('insertCustomer') }}" class="btn btn-icon icon-left btn-primary" style="margin-left: 25px"><i class="far fa-edit"></i> Tambah Data Customer 1</a>
                <a href="{{ route('insertCustomer2') }}" class="btn btn-icon icon-left btn-primary" style="margin-left: 25px"><i class="far fa-edit"></i> Tambah Data Customer 2</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                <table id="id_customer" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class= "text-center" scope="col">No</th>
                            <th class= "text-center" scope="col">ID</th>
                            <th class= "text-center" scope="col">Nama Customer</th>
                            <th class= "text-center" scope="col">Alamat Customer</th>
                            <th class= "text-center" scope="col">Kelurahan</th>
                            <th class= "text-center" scope="col">Foto by filepath</th>
                            <th class= "text-center" scope="col">Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $data)
                        <tr class= "text-center">
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $data -> id_customer }}</td>
                            <td>{{ $data -> nama_customer }}</td>
                            <td>{{ $data -> alamat_customer }}</td>
                            <td>{{ $data -> nama_kelurahan }}</td>
                            <td><img src="{{ asset('/storage/'.$data -> file_path) }}" alt="" ></td>
                            <!-- <td>{{ $data -> file_path }}</td> -->
                            <td><img src="{{ $data->foto }}" alt=""></td>
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
$('#id_customer').DataTable();
} );
</script>
@endsection