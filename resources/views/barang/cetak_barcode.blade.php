<!DOCTYPE html>
<html>
    <style>
        td {
            padding: 7px;
        }
        @page { margin: 0px; }
        body { margin: 0px; }
    </style>

<body>  
<table style>
    <tr>
        @foreach (range(0,$panjang) as $key)
        @if($x++ <= $panjang)
            <td style="text-align: center" width="65"></td>
        @if($no++ % 5 == 0)
    </tr>
    <tr> 
        @endif  
        @else
        @foreach ($barang as $data)
            <td width="65">
                <center>
                    {!! \DNS1D::getBarcodeHTML($data -> id_barang,'C128') !!}
                    {{ $data -> nama_barang }}
                </center>
            </td>
        @if($no++ % 5 == 0)
    </tr>
        @endif
        @endforeach
        @endif
        @endforeach
    </tr>
</table>       

</body>
</html>