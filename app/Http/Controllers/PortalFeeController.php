<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\PortalFee;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Unicodeveloper\Paystack\Facades\Paystack;

class PortalFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function redirectToGateway(){
        try{

            return Paystack::getAuthorizationUrl()->redirectNow();

        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function handleGatewayCallback(){
            
        $sec = "sk_test_daa2458525577edb2f67286d8576b0dda7cb3a04";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$_GET['reference']."",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer  $sec",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);


        dd();

        if($err){
           echo "cURL Error #:" .$err;
        }else {
 
                
         return redirect()->route('student.dashboard');


    }
}

public  function  handleCallBack(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$_GET['reference']."",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer sk_test_daa2458525577edb2f67286d8576b0dda7cb3a04",
            "Cache-Control: no-cache",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
       // echo $response;
        $result = json_decode($response);
        if ($result->data->status=='success') {

                $id = Auth::user()->id;

          $portal_Fee_Update =  User::where('id', $id)->update(['portalFee' => 'PAID']);

            return redirect()->route('student.dashboard');

        }
    }
}


     public function pay(Request $request){
        # code..

        $email = request('email');
        $amount = request('amount');
        $name = Auth::user()->fullName;

        $id = Auth::user()->id;


        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.paystack.co/transaction/initialize',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => '{
            "email": "'.$email.'",
            "name": "'.$name.'",
            "amount": '.($amount*100).',
            "metadata": {
                "id": '.$id.',
                "webhook_source":"portal_fee"
                },
            "split": {
              "type": "flat",
              "bearer_type": "account",
              "subaccounts": [
                {
                  "subaccount": "ACCT_sd1y85pjd03jsmq",
                  "share": 10000
                }
              ]
            }
          }',
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer sk_test_daa2458525577edb2f67286d8576b0dda7cb3a04",
            "Cache-Control: no-cache",
            "Content-Type: application/json"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $error_message = "";

        if ($err) {
          $error_message = "cURL Error #:" . $err;
        } else {
            if ($response) {
            // This happens if the response was executed successfully
            $result = json_decode($response);
            $my_status = $result->status;
            $my_message = $result->message;
            // Now we check the response status whether it's true or false
            if ($my_status =='true') {
                // code...
            $my_url = $result->data->authorization_url;
            return redirect($my_url);
            // header('location: https://google.com');
            } else {
                // code...
            $error_message = $my_message;
            }

            // End of checking response status
            } else {
            //Network issue
        $error_message = "Oops! We think you have  poor network connection, please try reloading the page";
            }

          // echo $response;
          //   echo $my_url;
        }


    }


     public function webhook()
     {
         // code...


        return view('backend.student.webhook');
     }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PortalFee  $portalFee
     * @return \Illuminate\Http\Response
     */
    public function show(PortalFee $portalFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PortalFee  $portalFee
     * @return \Illuminate\Http\Response
     */
    public function edit(PortalFee $portalFee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PortalFee  $portalFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortalFee $portalFee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PortalFee  $portalFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortalFee $portalFee)
    {
        //
    }
    
}