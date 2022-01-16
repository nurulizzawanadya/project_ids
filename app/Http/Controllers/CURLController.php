<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Controllers\Controller;

class CURLController extends Controller
{
    public function HTTPRequest($url)
    {
        $ch = curl_init(); 
        
        curl_setopt($ch, CURLOPT_URL, $url);
    	// curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

		$output = curl_exec($ch); 
		curl_close($ch);      
        
        $outputArray = json_decode($output, 1);
        
        print_r($outputArray);
    }
    
    public function index()
    {
		return $this->HTTPRequest("https://apicybercampus.unair.ac.id/api/tele/coba2");
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $dataURL = $this->HTTPRequest($request->fullUrl());
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
