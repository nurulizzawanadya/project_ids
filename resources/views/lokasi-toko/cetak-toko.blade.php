<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode-Toko-{{$id_toko}}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Toko</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr style="text-align: center;">
				<th>Barcode</th>
                <th>ID Toko</th>
				<th>Toko</th>
				<th>Latitude</th>
				<th>Longitude</th>
				<th>Accuracy</th>
			</tr>
		</thead>
		<tbody>
			@foreach($toko as $t)
			<tr align="center">
                <td float="center">
                    {!! \DNS1D::getBarcodeHTML($t -> barcode,'C128') !!}
                </td>
				<td>{{$t -> barcode}}</td>
				<td>{{$t -> nama_toko}}</td>
				<td>{{$t -> latitude}}</td>
				<td>{{$t -> longitude}}</td>
				<td>{{$t -> accuracy}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>