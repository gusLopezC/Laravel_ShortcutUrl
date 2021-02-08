<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;


class UrlController extends Controller
{
    //


    public function store(Request $request, Url $url){

        $url = new Url;

        $url = $url->short_url($request->long_url);

        return response()->json([
            'short_url' => url('/') . '/' . $url
        ]);
    }
}
