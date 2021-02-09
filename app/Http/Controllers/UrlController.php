<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    //

    public function show(Request $request, $code){
        $url = DB::table('urls')->where('code', $code)->first();

        if($url){
            return redirect()->away($url->url);
 
        }else{
     
            abort(404);
        }

    }

    public function store(Request $request, Url $url){

        $url = new Url;

        $url = $url->short_url($request->long_url);

        return response()->json([
            'short_url' => url('/') . '/' . $url
        ]);
    }
}
