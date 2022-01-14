<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BuzonModel;

use Illuminate\Http\Request;

class BuzonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buzon = BuzonModel::all();
        return view('admin.buzon.index', compact($buzon));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buzon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BuzonModel $buzon)
    {
        return view('admin.buzon.show',compact($buzon));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  BuzonModel $buzon
     * @return \Illuminate\Http\Response
     */
    public function edit(BuzonModel $buzon)
    {
        return view('admin.buzon.edit',compact($buzon));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  BuzonModel $buzon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuzonModel $buzon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  BuzonModel $buzon
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuzonModel $buzon)
    {
        //
    }
}
