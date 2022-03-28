<?php

namespace App\Http\Controllers;

use App\Models\Tvlist;
use Illuminate\Http\Request;

class TvlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tvlists=Tvlist::all();
        return view('admin.tvlist.index', compact('tvlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tvlist.create');
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
        Tvlist::create($request->all());
        return redirect()->route('tvlist.index')->with('info', 'сәтті қосылды!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tvlist  $tvlist
     * @return \Illuminate\Http\Response
     */
    public function show(Tvlist $tvlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tvlist  $tvlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Tvlist $tvlist)
    {
        return view('admin.tvlist.edit', compact('tvlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tvlist  $tvlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tvlist $tvlist)
    {
        $this->validate($request, ['name'=>'required']);
        $tvlist->update($request->all());
        return redirect()->route('tvlist.index')->with('info', 'Сәтті өңделді!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tvlist  $tvlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tvlist $tvlist)
    {
        $tvlist->delete();
        return redirect()->route('tvlist.index')->with('info', 'Сәтті жойылды!');
    }
}
