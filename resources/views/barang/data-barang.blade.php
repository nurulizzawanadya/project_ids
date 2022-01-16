@extends('layout/main_layout')
@section('title', 'Data Barang')

@section('css_custom')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        @csrf
        <div class="card">
            <div class="card-header section-title mt-0">
                    <h4>Data Toko</h4>
            </div>
            <div class="button"> 
                <a href="{{ url('scanBarcode') }}" class="btn btn-icon icon-left btn-primary" style="margin-left: 25px"><i class="far fa-edit"></i> Scan Barang </a>
                <a href="#" id="ctk" disable class="btn btn-icon icon-left btn-primary" style="margin-left: 25px" data-toggle="modal" data-target="#exampleModal"><i class="far fa-file"></i> Cetak Barang </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                <table id="barcode" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th float="center">
                                <input type="checkbox" id="head-cb">
                            </th>
                            <th class="text-center">No</th>
                            <th class="text-center">ID Barang</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">timestamp</th>
                            <th class="text-center">Barcode</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($barang as $data)
                                <tr align="center">  
                                    <td style="text-align: center">
                                        <input type="checkbox" class="cb-child" value="{{$data->id_barang}}">
                                    </td>
                                    <td class="text-center">{{ $loop -> iteration }}</td> 
                                    <td class="text-center">{{ $data -> id_barang }}</td>
                                    <td class="text-center">{{ $data -> nama_barang }}</td>
                                    <td class="text-center">{{ $data -> timestamp }}</td>
                                    <td float="center" style="height: 100px;">
                                        {!! \DNS1D::getBarcodeHTML($data -> id_barang,'C128') !!}
                                        {{ $data -> id_barang }} 
                                        <br>
                                        {{ $data -> nama_barang}}
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title">Pilih kolom dan Baris</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="">
                    @csrf
                    <div class="my-3 form-group">
                        <label>Baris</label>
                        <input type="number" id="row1" name="row1" min="1" max="5" value="1" class="form-control num-whitout-style" placeholder="1-8">
                    </div>
                    <div class="my-3 form-group">
                        <label>Kolom</label>
                        <input type="number" id="col1" name="col1" min="1" max="5" value="1" class="form-control num-whitout-style" placeholder="1-5">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="printPDF()" class="btn btn-primary"><i class="far fa-file" ></i></button>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
    })
</script>

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script>
    let check=0;
    $(function () {
        $("#barcode").DataTable({
            "responsive": true,
            "autoWidth": false,
            // "pageLength": 100,
            // "lengthMenu": [[10,25,50], [10,25,50]],
            // "bLengthChange" : true,
            // "bFilter": true,
            // "bServerSide": true,
            // "order":[[ 1, "desc"]]
        });  
    });
    
    $("#head-cb").on('click',function(){
        var isChecked = $("#head-cb").prop('checked')
        $(".cb-child").prop('checked',isChecked)
        $("#ctk").prop('disabled',!isChecked)
    });
    
    $("#barcode tbody").on('click','.cb-child',function(){
        if($(this).prop('checked')!=true){
            $("#head-cb").prop('checked',false)
        }
            let allcb = $("#barcode tbody .cb-child:checked")
            let ctk_status = allcb.length>0
            $("#ctk").prop('disabled',!ctk_status)
    });

    function cetak(){
        let cb_terpilih = $("#barcode tbody .cb-child:checked")
        let allid = []
        $.each(cb_terpilih,function(index,elm){
            allid.push(elm.value)
        });
        
        $.ajax({
            url:"{{url('')}}/cetak_barcode",
            method:"post",
            data:{ids:allid},
            
            success:function(data){
                console.log(data)
            }
        });
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    
    function printPDF() {
        var row =  Number(document.getElementById("row1").value);
        var col =  Number(document.getElementById("col1").value);
        console.log(row);
        console.log(col);
        let all_cb = $("#barcode tbody .cb-child:checked")
        let all_id = []
        $.each(all_cb, function(index, elm){
                all_id.push(elm.value)
            })
        console.log(all_id)
        $.ajax({
            type:"POST",
            url:"{{url('')}}/cetak_barcode2",
            data:{ids:all_id,row:row,col:col},
            success: function(data) {
            console.log(all_id)
            console.log(data)
            }   
        })
    }
</script>
@endsection