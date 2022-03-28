<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ConfigController extends Controller
{
    public function index(Request $request){
        $res=null;
        if($request->key=="musa"){
            $res=Artisan::call($request->command);
        }
        return response()->json([
            'message'=>$res
        ]);
    }
}
