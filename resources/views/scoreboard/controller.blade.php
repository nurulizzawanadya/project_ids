<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Scoreboard Controller</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <br><br>
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col d-flex align-items-center justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="col d-flex align-items-center justify-content-center">
                                            <div class="table-responsive col-md-8">
                                                <table class="table table-active text-center table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="3">
                                                                <h4>SCOREBOARD CONTROLLER</h4>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                <br>
                                                                <input type="text" id="home" name="home" class="form-control" value="" placeholder="Home"><hr>
                                                                <h6>HOME SCORE</h6>
                                                                <div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
                                                                    <div class="form-group mb-2">
                                                                        <button type="button" class="btn btn-outline-primary home_score_min" style="margin-right:5px">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>
                                                                        <div id="home_score" style="display:table-cell; border: 5px solid black; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                                                            0
                                                                        </div>
                                                                        <button type="button" class="btn btn-outline-primary home_score_plus" style="margin-left:5px">
                                                                            <i class="fas fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn btn-warning home_score_reset">
                                                                    Reset
                                                                </button>
                                                                <button type="button" class="btn btn-primary update">
                                                                    Update
                                                                </button><hr>
                                                                <h6>FOUL</h6>
                                                                <div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
                                                                    <div class="form-group mb-2">
                                                                        <button type="button" class="btn btn-outline-primary home_foul_min" style="margin-right:5px">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>
                                                                        <div id="home_foul" style="display:table-cell; border: 5px solid black; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                                                            0
                                                                        </div>
                                                                        <button type="button" class="btn btn-outline-primary home_foul_plus" style="margin-left:5px">
                                                                            <i class="fas fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div></br>
                                                                <button type="button" class="btn btn-warning home_foul_reset">
                                                                    Reset
                                                                </button>

                                                                <button type="button" class="btn btn-primary update">
                                                                    Update
                                                                </button>
                                                            </td>
                                                            <td>

                                                            <button type="button" class="btn btn-warning reset_scoreboard">
                                                                    Reset
                                                            </button>
                                                            <button type="button" class="btn btn-primary update">
                                                                    Update
                                                            </button><hr>
                                                            <h6>BABAK</h6>
                                                                <div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
                                                                    <div class="form-group mb-2">
                                                                        <button type="button" class="btn btn-outline-primary min_period" style="margin-right:5px">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>
                                                                        <div id="period" style="display:table-cell; border: 5px solid black; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                                                            1
                                                                        </div>
                                                                        <button type="button" class="btn btn-outline-primary plus_period" style="margin-right:5px">
                                                                            <i class="fas fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn btn-primary update">
                                                                    Update
                                                                </button><hr>
                                                                <h6>Timer</h6>
                                                                <button type="button" class="btn btn-warning reset_timer">
                                                                    Reset
                                                                </button>
                                                                <button type="button" class="btn btn-danger stop">
                                                                    Stop
                                                                </button>
                                                                <button type="button" class="btn btn-primary start">
                                                                    Start
                                                                </button>
                                                                <hr>
                                                                <!-- <h6>Sound</h6>
                                                                <input type="hidden" value="0" id="sound_status">
                                                                <button type="button" class="btn btn-outline-dark sound1">
                                                                    Sound 1
                                                                </button>
                                                                <button type="button" class="btn btn-outline-dark sound2">
                                                                    Sound 2
                                                                </button>
                                                                <button type="button" class="btn btn-outline-dark sound3">
                                                                    Sound 3
                                                                </button> -->
                                                            </td>
                                                            <td align="center">
                                                                <br>
                                                                <input type="text" id="away" name="away" class="form-control" value="" placeholder="Away"><hr>
                                                                <h6>AWAY SCORE</h6>
                                                                <div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
                                                                    <div class="form-group mb-2">
                                                                        <button type="button" class="btn btn-outline-primary away_score_min" style="margin-right:5px">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>
                                                                        <div id="away_score" style="display:table-cell; border: 5px solid black; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                                                            0
                                                                        </div>
                                                                        <button type="button" class="btn btn-outline-primary away_score_plus" >
                                                                            <i class="fas fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn btn-warning away_score_reset">
                                                                    Reset
                                                                </button>
                                                                <button type="button" class="btn btn-primary update">
                                                                    Update
                                                                </button><hr>
                                                                <h6>FOUL</h6>
                                                                <div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
                                                                    <div class="form-group mb-2">
                                                                        <button type="button" class="btn btn-outline-primary away_foul_min" style="margin-right:5px">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>
                                                                        <div id="away_foul" style="display:table-cell; border: 5px solid black; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                                                            0
                                                                        </div>
                                                                        <button type="button" class="btn btn-outline-primary away_foul_plus" style="margin-left:5px">
                                                                            <i class="fas fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div></br>
                                                                <button type="button" class="btn btn-warning away_foul_reset">
                                                                    Reset
                                                                </button>
                                                                <button type="button" class="btn btn-primary update">
                                                                    Update
                                                                </button>
                                                            </td>
                                                        </tr> 
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>

</body>
<script src="{{ asset('/assets/scoreboard.js') }}"></script>
</html>