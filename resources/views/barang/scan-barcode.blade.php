@extends('layout/main_layout')
@section('title', 'Scan Barcode')

@section("css_custom")
@endsection

@section("content")
<section class="section">
  <div class="section-body">
    <div class="card">
      <div class="card-header section-title mt-0">
        <h4>Scan Barcode</h4>
      </div>
      
      <div class="container" id="QR-Code">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="navbar-form navbar-right">
              <select class="form-control" id="camera-select"></select>
              <br>
              <div class="form-group">
                  <input id="image-url" type="hidden" class="form-control" placeholder="Image url">
                  <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="fas fa-upload"></span></button>
                  <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="far fa-image"></span></button>
                  <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="fas fa-play"></span></button>
                  <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="fas fa-pause"></span></button>
                  <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="fas fa-stop"></span></button>
              </div>
            </div>
          </div>
          <div class="col-sm" style="text-align: center;">
              <div class="well" style="position: relative;display: inline-block;">
              <canvas style="border: 1px solid grey;" width="250" height="100" id="webcodecam-canvas"></canvas>
              <div class="scanner-laser laser-rightBottom" style="opacity: 0.1;"></div>
              <div class="scanner-laser laser-rightTop" style="opacity: 0.1;"></div>
              <div class="scanner-laser laser-leftBottom" style="opacity: 0.1;"></div>
              <div class="scanner-laser laser-leftTop" style="opacity: 0.1;"></div>
          </div>
          <div class="col-sm">
              <div id="result">
                  <label for="inlineFormInput" class="col-sm-form-control-label">Result :</label>
                  <div class="alert alert-secondary" id="scanned-img">
                      <p id="scanned-QR"></p>
                  </div>
              </div>
          </div>
        </div>
      </div> 
    </div>
  </div>
</section>
@endsection

@section("script")
<script type="text/javascript" src="{{ URL::asset('js/filereader.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/qrcodelib.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/webcodecamjs.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
@endsection