<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\File;

class ScoreboardController extends Controller
{
    public function scoreboard()
    {
        return view('scoreboard.scoreboard');
    }

    public function message(){
        $response = new StreamedResponse(function() {
            while(true) {
                $data = DB::table('scoreboard')->select('scoreboard.*', 'sd.*')
                ->join('sound as sd', 'sd.id_sound', '=', 'scoreboard.id_sound')
                ->get();
                echo 'data: ' . json_encode($data) . "\n\n";
                
                // print PHP_EOL;
                ob_end_flush();
                flush();
                sleep(1);
            }
        });
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('X-Accel-Buffering', 'no');
        $response->headers->set('Cach-Control', 'no-cache');
        return $response;
    }

    public function index()
    {
        return view('scoreboard.controller');
    }

    public function store(Request $r){
        if($r->countdown != null){
            DB::table('scoreboard')->where('id', $r->id)->update([
                'countdown' => $r->countdown
            ]);
        }
        elseif($r->status != null){
            DB::table('scoreboard')->where('id', $r->id)->update([
                'id_sound' => $r->id_sound
            ]);
            DB::table('sound')->where('id_sound', $r->id_sound)->update([
                'status' => $r->status
            ]);
        }
        else{
            DB::table('scoreboard')->where('id', $r->id)->update([
                'home' => strtoupper($r->home),
                'away' => strtoupper($r->away),
                'home_score' => $r->home_score,
                'away_score' => $r->away_score,
                'home_foul' => $r->home_foul,
                'away_foul' => $r->away_foul,
                'period' => $r->period
            ]);
        }
    }

}
