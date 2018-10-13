<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Programme;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    // get the date from the form
    $date = $request->input("date");
    // put the API call together
    //$url = "https://port.hu/tvapi?channel_id%5B%5D=tvchannel-5&channel_id%5B%5D=tvchannel-3&channel_id%5B%5D=tvchannel-21&channel_id%5B%5D=tvchannel-103&channel_id%5B%5D=tvchannel-6&channel_id%5B%5D=tvchannel-103&date=" . $date;
    $url = "https://port.hu/tvapi?channel_id%5B%5D=tvchannel-5&date=" . $date;
    
    $client = new Client();
        $res = $client->get($url, [
                'headers' => [
                'Content-Type' => "application/x-www-form-urlencoded",
                'channel_id' => "tvchannel-5",
                ]
        ]);
        $port_response = json_decode($res->getBody(), true);
        //save the response to the database
        if($port_response){
        foreach($port_response['channels'] as $channel){
            $programme = new Programme;
            $programme->channel = $channel["name"] . " ";
            $name = $channel["name"];
            foreach($channel["programs"] as $programs){
                $programme = new Programme;
                $programme->channel = $name;
                $programme->start = $programs["start_time"];
                $programme->title = $programs["title"];        
                $programme->description = $programs["short_description"];    
                $programme->age_limit = $programs["restriction"]["age_limit"] ; 
                $programme->save();
            }
        }
        $message = "Data successfully saved. Now choose a channel to see its programmes for " . $date;
    }else{
        $message = "Something went wrong";
    }
    // get the names of saved channels and redirect to the new blade to choose a channel
    $channels = DB::table('port_tv_programmes')->distinct()->pluck('channel', 'channel')->toArray();
    return view("show")->with(["message" => $message, "channels" => $channels]);
    }

    public function show(Request $request){
        $channel = $request->input("channel_channel");
        $programmes = Programme::where('channel', $channel)->get();
        $channels = DB::table('port_tv_programmes')->distinct()->pluck('channel', 'channel')->toArray();
        return view("show")->with(["programmes" => $programmes, "channels" => $channels]);
        //return $programmes;
    }
    
}
