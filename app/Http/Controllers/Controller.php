<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function fireBaseNotificationsHandler($tokens, $data = [])
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);
        $notificationBuilder = new PayloadNotificationBuilder($data['title']);
        $notificationBuilder->setBody($data['body'])
            ->setSound('default');
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData($data);
        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();
        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);
        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();
        $downstreamResponse->tokensToDelete();
        $downstreamResponse->tokensToModify();
        $downstreamResponse->tokensToRetry();
        $downstreamResponse->tokensWithError();
    }
    
     # -------------------------------------------------
    protected function storeImage($file)
    {
        $path = $file->store('public/images');
        $url = url('/');
        $url = str_replace('public', '', $url);
        $serverPath = $url . '/storage/app/';
        $path = $serverPath . $path;
        return $path;
    }

   # -------------------------------------------------
    protected function store_Image($file)
    {
        $path = $file->store('public/images');
        $url = url('/');
        $url = str_replace('public', '', $url);
        $serverPath =  'app/';
        $path = $serverPath . $path;
        return $path;
    }

    #------------------ lang ----------------
    public function lang()
    {
        App::setLocale(request()->header('lang'));
        if (request()->header('lang'))
        {
            return request()->header('lang');
        }
        return 'ar';
    }

}
