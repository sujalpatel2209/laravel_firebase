<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
//use LaravelFCM\Facades\FCM;
use FCM;
use App\Common\SendPush;

class SendNotification extends Controller
{
    use SendPush;

    public function send()
    {


        $fcmtoken = 'fDBhWOb2JzI:APA91bHC1Ta8_JUlGnIzAgVBj7uJKzUOrV38K7mB_c_XpXpP5OxG6n3M_8wC7InFEofxnl67_p22onxzemGOvoOFL2l7U746vKhYjUFh1kpRmHKp8d3J-XqVWUW50EHJqPVsaXoE63tj';
        $msg = '';
        $status = 1;

        $this->singlepush($fcmtoken,$msg,$status);

/*        $optionBuiler = new OptionsBuilder();
        $optionBuiler->setTimeToLive(60*20)
                     ->setPriority('high');


        $notificationBuilder = new PayloadNotificationBuilder();
        $notificationBuilder->setBody('test 6 push msg')
                            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['statusCode' => '3']);

        $option = $optionBuiler->build();
        $notification = $notificationBuilder->build();

        $data = $dataBuilder->build();

        $token = "deEfYXEgQRs:APA91bHqMYGuQSgnvuOKjERCdgEV3w7W6thW0VLOjoYExbNtlctDu0d86ZcXs-yw4QCAvgIgKZPzQSOA3lT69GviS3W-qbSE7-wKpq9QrJwpZ1zp1fFyyXrxQUQkHTc5Wf8Wx82Lm25Z";

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

        echo "<pre>";
        print_r($downstreamResponse);
        exit;
*/

        /*echo "<pre>";
        echo "success";
        print_r($downstreamResponse->numberSuccess());

        echo "<pre>";
        echo "failure";
        print_r($downstreamResponse->numberFailure());

        echo "<pre>";
        echo "modification";
        print_r($downstreamResponse->numberModification());
*/
//return Array - you must remove all this tokens in your database
        //$downstreamResponse->tokensToDelete();

//return Array (key : oldToken, value : new token - you must change the token in your database )
        //$downstreamResponse->tokensToModify();

//return Array - you should try to resend the message to the tokens in the array
        //$downstreamResponse->tokensToRetry();
    }


    public function sendTopic()
    {

        $this->sendToTopic();
    }

}
