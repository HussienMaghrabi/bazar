<?php

namespace App\Http\Controllers\Api\SocialMedia;

use App\About;
use App\SocialMedia;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $App = About::first();
        $data['facebook'] = $App->facebook;
        $data['instagram'] = $App->instagram;
        $data['twitter'] = $App->twitter;
        return $this->apiResponse($request, trans('language.message'), $data, true);
    }

}
