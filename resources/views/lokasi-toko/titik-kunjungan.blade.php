@extends('layout/main_layout')
@section('title', 'Titik Kunjungan')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="ZXing for JS">
  <zxing-scanner [tryHarder]="true" [formats]="formats" (scanSuccess)="onScanSuccessHandler($event)"></zxing-scanner>
</head>

@section('content')
<body>
<section class="section">
    <div class="section-header">
        <h1>Default Layout</h1>
        <div class="section-header-breadcrumb">
            <!-- <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Default Layout</div> -->
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header section-title mt-0">
                    <h4>Scan Toko</h4>
                </div>
                <div class="card-body">
                    <div class="form-group-row" align="center">
                        <div class="container" id="demo-content">
                            <div class="button">
                                <button class="btn btn-icon-left btn-primary" id="startButton">Start</button>
                                <button class="btn btn-icon-left btn-primary" id="resetButton">Reset</button>
                            </div>
                            <br>

                            <div>
                                <video id="video" width="300" height="200" style="border: 1px solid gray"></video>
                            </div>
                            <br>
                            
                            <div id="sourceSelectPanel" style="display:none" type="hidden">
                                <label for="sourceSelect">Video Course :</label><br>
                                <select id="sourceSelect" style="max-width:400px"></select>
                            </div>
                            <br>

                            <div class="col-lg-8">
                                <label for="inlineFormInput" class="col-sm-form-control-label">Result :</label>
                                <div class="alert alert-secondary" role="alert" id="result" name="barcode"></div>
                            </div>
                            <br>
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Toko</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_toko1" name="nama_toko">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Latitude</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="latitude1" name="latitude1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Longitude</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="longitude1" name="longitude1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Accuracy</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="accuracy1" name="accuracy1">
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header section-title mt-0">
                    <h4>Titik Kunjungan</h4>
                </div>
                <div class="card-body" align="center">
                        <div>
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Latitude</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="latitude_now" name="latitude_now">
                            </div>
                        </div>

                        <div>
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Longitude</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="longitude_now" name="longitude_now">
                            </div>
                        </div>

                        <div>
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Accuracy</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="accuracy_now" name="accuracy_now">
                            </div>
                        </div>
                        <br>

                        <div class="form-actions form-group">
                            <div class="row">
                                <div class="col col-md-12" align="center">
                                <button type="button" class="btn btn-primary" onclick="konfirmasi()">Konfirmasi Jangkauan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

<script>
  var lat1 = document.getElementById("latitude1");
  var lon1 = document.getElementById("longitude1");
  var acc1 = document.getElementById("accuracy1");
  var lat2 = document.getElementById("latitude_now");
  var lon2 = document.getElementById("longitude_now");
  var acc2 = document.getElementById("accuracy_now");
    var x = document.getElementById("demo");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(showPosition);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
    lat2.value = position.coords.latitude;
    lon2.value= position.coords.longitude;
    acc2.value= position.coords.accuracy;
    }

    function konfirmasi( ){
      var lat1 = document.getElementById("latitude1").value;
      var lon1 = document.getElementById("longitude1").value;
      var acc1 = Number(document.getElementById("accuracy1").value);
      var lat2 = document.getElementById("latitude_now").value;
      var lon2 = document.getElementById("longitude_now").value;
      var acc2 = Number(document.getElementById("accuracy_now").value);
      var rac = Number((acc1+acc2)/2);
      var b = Number(getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2)*1000);
      console.log(acc1);
      console.log(lat1);
      console.log(lon1);
      console.log(acc2);
      console.log(lat2);
      console.log(lon2);
      console.log(rac);
      console.log(b);
      if (b <= rac) {
        alert("Anda Berada Dalam Jangkauan");
      } else {
        alert("Anda Diluar Jangkauan");
      }
    }

    function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
      var R = 6371; // Radius of the earth in km
      var dLat = deg2rad(lat2-lat1); // deg2rad below
      var dLon = deg2rad(lon2-lon1);
      var a =
      Math.sin(dLat/2) * Math.sin(dLat/2) +
      Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
      Math.sin(dLon/2) * Math.sin(dLon/2)
      ;
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
      var d = R * c; // Distance in km
      return d;
    }
    function deg2rad(deg) {
      return deg * (Math.PI/180)
    }
</script>

<!-- Kamera -->
<script type="text/javascript" src="https://unpkg.com/@zxing/library@0.18.3-dev.7656630/umd/index.js"></script>
  <script type="text/javascript">
    window.addEventListener('load', function () {
      let selectedDeviceId;
      const codeReader = new ZXing.BrowserMultiFormatReader()
      console.log('ZXing code reader initialized')
      codeReader.listVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
              selectedDeviceId = sourceSelect.value;
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }

          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
              if (result) {
                console.log(result)
                document.getElementById('result').textContent = result.text
                // const audio = new Audio('assets/dc.mp3');
                // audio.play();
                var id_toko = document.getElementById('result').innerHTML;
                console.log(id_toko);
                $.ajax({
                  type:"get",
                  url:"findToko",
                  data:"scan_id="+id_toko,
                  success: function(data){
                    
                    for(var i=0;i<data.length;i++){
                      document.getElementById("nama_toko1").value = data[i].nama_toko;
                      document.getElementById("longitude1").value = data[i].longitude;
                      document.getElementById("latitude1").value = data[i].latitude;
                      document.getElementById("accuracy1").value = data[i].accuracy;
                    }
                    getLocation();
                      $.ajax({success: function()
                      {
                        konfirmasi();
                      }
                    });

                  }
                });
                codeReader.reset();
              }
              if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err)
                document.getElementById('result').textContent = err
              }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })

          document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err)
        })
    })
  </script>

@endsection
</html>