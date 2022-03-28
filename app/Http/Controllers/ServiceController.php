<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Servicetype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::all();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicetypes=Servicetype::all();
        return view('admin.service.create', compact('servicetypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'servicetype_id'=>'required|not_in:0',
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);
        Service::create($request->all());
        return redirect()->route('service.index')->with('info', 'сәтті қосылды!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $servicetypes=Servicetype::all();
        return view('admin.service.edit', compact('servicetypes', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request, [
            'servicetype_id'=>'required|not_in:0',
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);
        $service->update($request->all());
        return redirect()->route('service.index')->with('info', 'Сәтті өңделді!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.index')->with('info', 'Сәтті жойылды!');
    }
    public function service_list(){
        $user_services=DB::table('users_services as us')
            ->leftJoin('users as user','user.id', 'us.user_id')
            ->leftJoin('services as s','s.id', 'us.service_id')
            ->leftJoin('servicetypes as stype','stype.id', 's.servicetype_id')
            ->leftJoin('statuses as st','st.id', 'us.status_id')
            ->select('st.name as stname', 'us.id','s.name as sname', 's.price', 'stype.name as sttypename', 'user.firstname as user_name','user.lastname as user_surname','user.patronymic as user_middlename', 'user.iin', 'us.sdate')
//            ->orderBy('us.status_id')
//            ->orderBy('us.id')
            ->get();
        return view('admin.service.servicelist', compact('user_services'));
    }

    public function service_edit($user_service_id){
        $user_service=DB::table('users_services')->where('id',$user_service_id)->first();
        $statuses=DB::table('statuses')->get();
        return view('admin.service.serviceedit', compact('statuses', 'user_service'));
    }

    public function service_edit_save(Request $request){
        $user_service_id=$request->user_service_id;
        $status_id=$request->status_id;
        DB::update('update users_services set status_id=? where id=?', [$status_id, $user_service_id]);
        return redirect()->route('service_list')->with('info', 'Сәтті өңделді!');
    }

    public function service_report(Request $request){
        $servicetype_id=$request->servicetype_id ?? "";
        $user_services=DB::table('users_services as us')
            ->where('us.status_id', 2)
            ->leftJoin('users as user','user.id', 'us.user_id')
            ->leftJoin('services as s','s.id', 'us.service_id')
            ->leftJoin('servicetypes as stype','stype.id', 's.servicetype_id')
            ->where('stype.id', 'like', '%'.$servicetype_id.'%')
            ->leftJoin('statuses as st','st.id', 'us.status_id')
            ->select('st.name as stname', 'us.id','s.name as sname', 's.price', 'stype.name as sttypename', 'user.firstname as user_name','user.lastname as user_surname','user.patronymic as user_middlename', 'user.iin', 'us.sdate')
//            ->orderBy('us.status_id')
//            ->orderBy('us.id')
            ->get();
        $servicetypes=Servicetype::all();

        return view('admin.service.servicereport', compact('user_services', 'servicetype_id', 'servicetypes'));
    }
}
