<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\maketrip;
use App\Models\RentCar;
use Carbon\Carbon;
use ClickSend\Api\SMSApi;
use ClickSend\Configuration;
use DateTime;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class websitecontroller extends Controller
{
    public function rentcarbooking(Request $request)
    {
        function time_Diff_Minutes($startTime, $endTime)
        {
            $from_time = strtotime($startTime);
            $to_time = strtotime($endTime);
            $minutes = (($to_time - $from_time) / 60) / 60;
            return ($minutes < 0 ? 0 : abs($minutes));
        }
        $totalhours = (time_Diff_Minutes($request->pickdatetime, $request->dropdatetime));
        $charges = $totalhours * $request->hourlyrate;

        $request->merge(['charges' => $charges]);
        $store=maketrip::create($request->all());

        if($store)
        {
             //................Messaging API.............//

            // $config = Configuration::getDefaultConfiguration()
            //     ->setUsername('fazilhussain015@gmail.com')
            //     ->setPassword('C195DE98-66B9-8D6D-D5B5-0303BA26F7CF');
            // $apiInstance = new SMSApi(new Client(), $config);
            // $msg = new \ClickSend\Model\SmsMessage();
            // $msg->setBody("Thank You $request->name For Joining US Wait For Confirmation Your Ride Charges Will Be $request->charges");
            // $msg->setTo($request->contact);
            // $msg->setSource("sdk");


            // // \ClickSend\Model\SmsMessageCollection | SmsMessageCollection model
            // $sms_messages = new \ClickSend\Model\SmsMessageCollection();
            // $sms_messages->setMessages([$msg]);

            // $result = $apiInstance->smsSendPost($sms_messages);

        return view('site.index');
        }
        else
        {
           return redirect()->back();
        }



    }
    public function bookridepage($id)
    {
        $ridecar = RentCar::find($id);
        return view('site.bookride')->with('cardetails', $ridecar)->with('car_id',$id);
    }

    public function registerdriver(Request $request)
    {
        dd($request);
        $driver=Driver::create($request->all() + ['name' => $request->ownername]);

        RentCar::create($request->all() + ['driverid' => $driver->id]);

        return redirect()->back();


    }
}
