<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    // public function index()
    // {
    //     return Lead::all();
    // }

    // public function store(Request $request)
    // {
    //     $payload = file_get_contents("php://input");

    //     $data = json_decode($payload);


    //     // Required Validation Check  
    //     if (empty($data->email) || !filter_var($data->email, FILTER_VALIDATE_EMAIL)) {

    //         return response()->json([

    //             "status" => "error",
    //             "message" => "You Should enter a valid email"
    //         ]);
    //     }
    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://api.debounce.io/v1/?api=' . env("EMAIL_DEBOUNCE_API_KEY") . '&email=' . $data->email,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'GET',
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);

    //     $res  = json_decode($response);

    //     // dd($res->debounce);

    //     if ($res->debounce->result == "Invalid") {
    //         return response()->json([
    //             "status" => "error",
    //             "message" => "Invalid Email Address"
    //         ]);
    //     }

        

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://npdportal.leadspediatrack.com/post.do?lp_campaign_id=' . env('IP_CAMPAIGN_ID') . '&lp_campaign_key=' . env('IP_CAMPAIGN_KEY') . '&first_name=' . $data->first_name . '&last_name=' . $data->last_name . '&phone_home=' . $data->phone . '&email=' . $data->email,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'GET',
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);

    //     $js = simplexml_load_string($response);


    //     $msg = $js->msg;
    //         Lead::create([
    //             'first_name' => $data->first_name,
    //             'last_name' => $data->last_name,
    //             'email' => $data->email,
    //             'phone' => $data->phone,
    //             'status'=> $msg == "Lead Rejected"?false:true,
    //             'campaign_id' => $data->camp_id ?? 1
    //         ]);

    //         return $response;

    // }
}
