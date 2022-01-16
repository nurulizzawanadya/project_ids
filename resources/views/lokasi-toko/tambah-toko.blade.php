@extends('layout/main_layout')
@section('title', 'Tambah Toko')

@section('css_custom')
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="card">
            <div class="card-header section-title mt-0">
                <h4>Tambah Data Toko</h4>
            </div>
            <form action="insertToko" method="post">
                <input type="hidden" name="_token" value= "<?php echo csrf_token()?>">
                    <div class="card-body">
                        <form role="form">
                            <input type="hidden" class="form-control" id="barcode_id" name="barcode_id" placeholder="" disabled>
                            
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Toko</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Latitude</label>
                            <div class="col-sm-9">
                                <input type="latitude" class="form-control" id="latitude" name="latitude" placeholder="" readonly>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Longitude</label>
                            <div class="col-sm-9">
                                <input type="longitude" class="form-control" id="longitude" name="longitude" placeholder="" readonly>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Accuracy</label>
                            <div class="col-sm-9">
                                <input type="accuracy" class="form-control" id="accuracy" name="accuracy" placeholder="" readonly>
                            </div>
                            </div>

                            <div class="card-footer" align="center">
                                <button type="button" class="btn btn-primary" onclick="getLocation()">Geolocation</button> 
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
            </form>
        </div>
    </div>
</section> 
@endsection

@section('script')
<script>
    var lat = document.getElementById("latitude");
    var long = document.getElementById("longitude");
    var acc = document.getElementById("accuracy");

    function getLocation() 
    {
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(showPosition);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) 
    {
        lat.value=position.coords.latitude;
        long.value=position.coords.longitude;
        acc.value=position.coords.accuracy;
    }
</script>

@endsection
