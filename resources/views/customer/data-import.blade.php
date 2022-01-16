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
                    <h4>Data Customer Import</h4>
            </div>
            @if(Session::has('success'))
                <div class="col-sm-12">
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            <strong>Success,</strong>
                            {{ Session::get('success') }}
                        </div>
                    </div>
                </div>
            @endif
		    @if(session()->has('failed'))
			<table class="table table-danger">
			    <tr>
                    <th>Row</th>
                    <th>Atrribute</th>
                    <th>Errors</th>
                    <th>Value</th>
			    </tr>
			    @foreach(session()->get('failures') as $validation)
				<tr>
				    <td>{{ $validation->row() }}</td>
				    <td>{{ $validation->attribute() }}</td>
				    <td>
					<ul>
					    @foreach($validation->errors() as $e)
						<li>{{ $e }}</li>
					    @endforeach
					</ul>
				    </td>
				    <td>{{ $validation->values()[$validation->attribute()] }}</td>
				</tr>
			    @endforeach
			</table>
		    @endif
            <div class="button">
                <a href="" class="btn btn-icon icon-left btn-success" style="margin-left: 25px" data-toggle="modal" data-target="#importExcel"><i class="far fa-file"></i> Import Excel </a> 
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="id" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class= "text-center" scope="col">ID</th>
                            <th class= "text-center" scope="col">Nama Customer</th>
                            <th class= "text-center" scope="col">Alamat Customer</th>
                            <th class= "text-center" scope="col">Kode Pos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customerimp as $data)
                        <tr class= "text-center">
                            <td>{{ $data -> id_customer_import }}</td>
                            <td>{{ $data -> nama_customer_import }}</td>
                            <td>{{ $data -> alamat_customer_import }}</td>
                            <td>{{ $data -> kode_pos_import }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('customer.import') }}" enctype="multipart/form-data">
        @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                </div>
                <div class="modal-body">
                    <label for="file">Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="excel" class="form-control-control-file @error('excel') is-invalid @enderror" required="required" aria-describedby="fileHelpBlock">
                            <small id="fileHelpBlock" class="form-text text-muted">
                                Please upload your file only with the type of file : xls, xslx, csv
                            </small>
                    </div>
                    @error('excel')
                    <div class="offset-lg-1 col-lg-9">
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" value="upload" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


@section('script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<script>
$(document).ready( function () {
$('#id').DataTable();
} );
</script>
@endsection