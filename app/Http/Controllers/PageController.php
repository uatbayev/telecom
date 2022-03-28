<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Servicetype;
use App\Models\Tvlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    public function list($id){
        $service_type=Servicetype::find($id);
        $services=Service::where('servicetype_id', '=', $id)->get();
        $tvlists=Tvlist::all();
        return view('common.page.index', compact('services', 'service_type', 'tvlists'));
    }
    public function add_service($user_id, $service_id){

        DB::table('users_services')->insert([
            'user_id' => $user_id,
            'service_id' => $service_id,
            'status_id'=>1,
            'sdate'=>date('Y-m-d')
        ]);

        return Redirect::back()->with('info','Сәтті қосылды!');
    }

    public function get_application($user_id){
        $user_services=DB::table('users_services as us')
            ->where('us.user_id', $user_id)
            ->leftJoin('services as s','s.id', 'us.service_id')
            ->leftJoin('servicetypes as stype','stype.id', 's.servicetype_id')
            ->leftJoin('statuses as st','st.id', 'us.status_id')
            ->select('st.name as stname', 's.name as sname', 's.price', 'stype.name as sttypename')
            ->get();
        return view('common.page.appl', compact('user_services'));
    }
}
