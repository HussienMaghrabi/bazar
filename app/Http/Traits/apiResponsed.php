<?php namespace App\Http\Traits;

trait apiResponsed
{
    protected function apiResponsed($request, $message, $data,$slider, $successStatus)
    {
        $response['message'] = $message;
        if ($data != null)
            $response['data'] = $data;
        if ($slider != null)
            $response['slider'] = $slider;
        $response['success'] = $successStatus;
        return $response;
    }
}
