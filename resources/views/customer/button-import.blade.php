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

            @if(session()->has('success'))
			<div class="alert alert-danger-dismissible show fade" role="alert">
  			    {{ session('success') }}
			</div>
		    @endif
		    @if(session()->has('failures'))
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
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="{{ route('customer.import') }}" method="post" enctype="multipart/form-data">
					    @csrf
                        <div class="form-group offset-lg-1 col-lg-9">
                            <input type="file" class="form-control-file @error('excel') is-invalid @enderror" name="excel">
                            @error('excel')
                            <div class="offset-lg-1 col-lg-9">
                                <p class="text-danger">
						    	{{ $message }}
						        </p>
						    </div>
					        @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection