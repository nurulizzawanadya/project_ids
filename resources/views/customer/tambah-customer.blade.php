@extends('layout/main_layout')
@section('title', 'Tambah Data Customer 1')

@section('css_custom')
@endsection

<html>
@section('content')
<section class="section">
    <div class="section-body">
      <div class="card">
        <div class="card-header section-title mt-0">
          <h4>Tambah Data Customer [SNAPSHOT]</h4>
        </div>
        <form action="{{ route('insertCustomer') }}" method="post">
          <input type="hidden" name="_token" value= "<?php echo csrf_token()?>">
          <div class="card-body">    
            <form role="form">
                <input type="hidden" class="form-control" id="idcust" name="idcust" placeholder="" disabled>
                
                <div class="form-group col-md-6">
                  <label">Nama</label>
                  <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="nama lengkap">
                </div>
    
                <div class="form-group col-md-6">
                  <label>Alamat</label>
                  <input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="alamat lengkap">
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Provinsi</label>
                    <select name="provinsi_dd" class="form-control" id="provinsi_dd">
                      <option value="0" disabled="true" selected="true"> - Pilih Provinsi - </option>
                      @foreach ( $provinsi as $prov )
                      <option value="{{ $prov->id_provinsi }}">{{ $prov->nama_provinsi }}</option>
                      @endforeach
                    </select>
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label>Kota</label>
                    <select name="kota_dd" class="form-control" id="kota_dd">
                      <option value="0" disabled="true" selected="true"> - Pilih Kota - </option>
                    </select>
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label>Kecamatan</label>
                    <select name="kecamatan_dd" class="form-control" id="kecamatan_dd">
                      <option value="0" disabled="true" selected="true"> - Pilih Kecamatan - </option>
                    </select>
                  </div>
  
                  <div class="form-group col-md-6">
                    <label>Kelurahan</label>
                    <select name="kelurahan_dd" class="form-control" id="kelurahan_dd">
                      <option value="0" disabled="true" selected="true"> - Pilih Kelurahan - </option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label>Ambil Gambar</label>
                  <br>
                  <div class="col-md-6">
                    <div id="result2" style="border-style: solid; width: 325px; height: 245px; text-align: center">
                      <p class='warna'> Take A snapshot</p>                    
                    </div>
                    <input type="hidden" name="imagecam" id="imagecam">
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Ambil Gambar
                    </button>
                  </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
          </div>
        </form>
      </div>
    </div>
</section>
@endsection

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ambil Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Take A Snapshot</label>
        <!-- KAMERA -->
        <div id="my_camera"></div>
        <div id="result"></div>
        <br>
        <div>
          <button id="btn" name="btn" class="btn btn-primary" ><i class="fa fa-camera"></i></button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('#myModal').on('shown.bs.modal', function(){
  $('#myInput').trigger('focus')
  })
</script>
</html>

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
 
  $("#provinsi_dd").change(function(){
    var prov_id=$("#provinsi_dd").val();
    $.ajax({
      type:"get",
      url:"findKota",
      data:"prov_id="+prov_id,
      success:function(data){
        $('#kota_dd').html('');
        $('#kecamatan_dd').html('');
				$('#kelurahan_dd').html('');
				$('#kota_dd').append('<option value="">Pilih Kota</option>');
				$('#kecamatan_dd').append('<option value="">Pilih Kecamatan</option>');
				$('#kelurahan_dd').append('<option value="">Pilih Kelurahan</option>');
        for(var i=0;i<data.length;i++){
          $('#kota_dd').append('<option value="'+data[i].id_kabkot+'">'+data[i].nama_kabkot+'</option>');
        } 
      }
      });
  });

  $("#kota_dd").change(function(){
    var kota_id=$("#kota_dd").val();
    $.ajax({
      type:"get",
      url:"findKecamatan",
      data:"kota_id="+kota_id,
      success:function(data){
        $('#kecamatan_dd').html('');
				$('#kelurahan_dd').html('');
				$('#kecamatan_dd').append('<option value="">Pilih Kecamatan</option>');
				$('#kelurahan_dd').append('<option value="">Pilih Kelurahan</option>');
        for(var i=0;i<data.length;i++){
          $('#kecamatan_dd').append('<option value="'+data[i].id_kecamatan+'">'+data[i].nama_kecamatan+'</option>');
        } 
      }
      });
  });

  $("#kecamatan_dd").change(function(){
    var kec_id=$("#kecamatan_dd").val();
    $.ajax({
      type:"get",
      url:"findKelurahan",
      data:"kec_id="+kec_id,
      success:function(data){
        $('#kelurahan_dd').html('');
				$('#kelurahan_dd').append('<option value="">Pilih Kelurahan</option>');
        for(var i=0;i<data.length;i++){
          $('#kelurahan_dd').append('<option value="'+data[i].id_kelurahan+'">'+data[i].nama_kelurahan+'</option>');
        } 
      }
      });
  });

  $("#kelurahan_dd").change(function(){
    var kel_id=$("#kelurahan_dd").val();
    $.ajax({
      type:"get",
      url:"findKodepos",
      data:"kel_id="+kel_id,
      success:function(data){
        for(var i=0;i<data.length;i++){
          $('#kodepos_dd').append('<option value="'+data[i].id_kelurahan+'">'+data[i].kodepos+'</option>');
        } 
      }
      });
  });
  Webcam.set({
    width: 320,
    height: 240,
    image_format: 'jpeg',
    jpeg_quality: 100
  });
  Webcam.attach('#my_camera'); 
    function take_picture() {
        Webcam.snap(function(data_uri) {
        $('#imagecam').val(data_uri);

        document.getElementById('result').innerHTML = '<img src="' + data_uri +'"/>';
        document.getElementById('result2').innerHTML = '<img src="' + data_uri +'"/>';
        });
    }
    document.getElementById('btn').addEventListener('click', take_picture);
});
</script>
@endsection
