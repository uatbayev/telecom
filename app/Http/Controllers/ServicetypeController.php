<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Servicetype;
use Illuminate\Http\Request;

class ServicetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicetypes=Servicetype::all();
        return view('admin.servicetype.index', compact('servicetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servicetype.create');
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
            'name'=>'required'
        ]);
        Servicetype::create($request->all());
        return redirect()->route('servicetype.index')->with('info', 'сәтті қосылды!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicetype  $servicetype
     * @return \Illuminate\Http\Response
     */
    public function show(Servicetype $servicetype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicetype  $servicetype
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicetype $servicetype)
    {
        return view('admin.servicetype.edit', compact('servicetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicetype  $servicetype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicetype $servicetype)
    {
        $this->validate($request, ['name'=>'required']);
        $servicetype->update($request->all());
        return redirect()->route('servicetype.index')->with('info', 'Сәтті өңделді!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicetype  $servicetype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicetype $servicetype)
    {
        $servicetype->delete();
        return redirect()->route('servicetype.index')->with('info', 'Сәтті жойылды!');
    }
}
