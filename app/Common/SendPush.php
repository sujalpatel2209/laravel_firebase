<?php

namespace App\Common;

use Illuminate\Http\Request;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use FCM;
use LaravelFCM\Message\Topics;

trait SendPush
{
    protected function singlepush($fcmtoken,$msg,$status)
    {
        $optionBuiler = new OptionsBuilder();
        $optionBuiler->setTimeToLive(60*20)
            ->setPriority('high');


        $notificationBuilder = new PayloadNotificationBuilder();
        $notificationBuilder->setBody($msg)
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['statusCode' => $status]);

        $option = $optionBuiler->build();
        $notification = $notificationBuilder->build();

        $data = $dataBuilder->build();

     //   $token = "deEfYXEgQRs:APA91bHqMYGuQSgnvuOKjERCdgEV3w7W6thW0VLOjoYExbNtlctDu0d86ZcXs-yw4QCAvgIgKZPzQSOA3lT69GviS3W-qbSE7-wKpq9QrJwpZ1zp1fFyyXrxQUQkHTc5Wf8Wx82Lm25Z";

        $downstreamResponse = FCM::sendTo($fcmtoken, $option, $notification, $data);

        echo "<pre>";
        print_r($downstreamResponse);
        exit;
/*
          echo "<pre>";
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

    protected function sendToTopic()
    {
        $optionBuiler = new OptionsBuilder();
        $optionBuiler->setTimeToLive(60*20)
                     ->setPriority('high');

        $notificationBuilder = new PayloadNotificationBuilder();
        $notificationBuilder->setBody('Topic send push')
                            ->setSound('default');

        $option = $optionBuiler->build();
        $notification = $notificationBuilder->build();

     //   $topic = new Topics();
     //   $topic->topic('news');

        $topic = new Topics();
        $topic->topic('news');

        $topicResponse = FCM::sendToTopic($topic, $option, $notification, null);

        echo "<pre>";
        print_r($topicResponse);
        exit;

/*
        echo "<pre>";
        echo "isSuccess : ";
        print_r($topicResponse->isSuccess());
        echo "<pre>";
        echo "shouldRetry : ";
        print_r($topicResponse->shouldRetry());
        echo "<pre>";
        echo "error : ";
        print_r($topicResponse->error());
*/
    }
}


?>