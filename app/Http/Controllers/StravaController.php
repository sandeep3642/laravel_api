<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Strava;

class StravaController extends Controller
{
    public function stravaConnect(Request $request)
    {
        $return =  Strava::authenticate($scope='read_all,profile:read_all,activity:read_all,activity:write');
        return( $return);
    }
   
    public function stravaToken(Request $request)
    {
      
        $token = Strava::token($request->code);
        return($token);
    }
    public function getActivities(Request $request)
    {
       
        $page = 1;
        $per_page = 50;
        $dates = [];
        $user_id = 1;
        $token =  "49f7675cfe5f04eedb8ae038fcfead70c019221a" ; 
        $before = strtotime('1/1/3000');
        $after = strtotime('1/1/2000');
        $allActivities = Strava::activities($token, $page, $per_page, $before, $after);
        $count = count($allActivities);
        return(["allactivities"=>$allActivities,"count"=>$count]);
    }


    public function createActivities(Request $request)
    {
      try {
        $endpoint ="https://www.strava.com/api/v3/activities"; 
        $client = new \GuzzleHttp\Client();
        $token =  "0cf53426911d822eb1fc2f135f19b494bcf5cf96" ; 
        $name = "Run" ;
        $type = "Run";
        $sport_type  = "Run";
        $start_date_local = '2023-02-02T1:23:13Z';
        $elapsed_time = "23";
        $description = 'Run';
        $distance = '2000';
        $trainer  = 'trainer';
        $commute = 'commute';
        $response = $client->request('post', $endpoint,  [
                'headers' => [
                   'Authorization' => 'Bearer '.$token
                ],  
              
                'query'=>
                [
                    'name' => $name, 
                    'type' => $type,
                    'sport_type'=>$sport_type,
                    'start_date_local'=>$start_date_local,
                    'elapsed_time'=>$elapsed_time,
                    'description'=>$description,
                    'distance'=>$distance,
                    'trainer' => $trainer,
                    'commute' => $commute,   
                ],
            ]);
        $statusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody(), true);
        return(["response"=>$responseBody,'statusCode'=>$statusCode] );

      } catch (\Throwable $th) {
       throw ($th) ;
      }
       
    }
}



