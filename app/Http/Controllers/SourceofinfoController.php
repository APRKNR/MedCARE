<?php

namespace App\Http\Controllers;

use App\sourceofinfo;
use Illuminate\Http\Request;

class SourceofinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        file_put_contents('_debug.txt', print_r($request->user,true));
        $sourceofinfo = sourceofinfo::create([
                'sourcedesc' => $request->sourcedesc,
                'status' => 'A',
                'created_user' => $request->user['name']
                
            ]);
        return response()->json([
                'status' => (bool) $sourceofinfo,
                'data'   => $sourceofinfo,
                'message' => $sourceofinfo ? 'Product Created!' : 'Error Creating Product'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sourceofinfo  $sourceofinfo
     * @return \Illuminate\Http\Response
     */
    public function show(sourceofinfo $sourceofinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sourceofinfo  $sourceofinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(sourceofinfo $sourceofinfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sourceofinfo  $sourceofinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sourceofinfo $sourceofinfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sourceofinfo  $sourceofinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(sourceofinfo $sourceofinfo)
    {
        //
    }
}
