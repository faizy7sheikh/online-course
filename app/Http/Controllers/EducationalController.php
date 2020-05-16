<?php

namespace App\Http\Controllers;

use App\Educational;
use App\Label;
use Illuminate\Http\Request;

class EducationalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Educational::all();
        return view("layout.index",compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Educational  $educational
     * @return \Illuminate\Http\Response
     */
    public function show(Educational $educational)
    {
        //
        $idn = $educational->id;
        $dat = Label::where('educational_id',$idn)->get();
        return json_encode($dat);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Educational  $educational
     * @return \Illuminate\Http\Response
     */
    public function edit(Educational $educational)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Educational  $educational
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Educational $educational)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Educational  $educational
     * @return \Illuminate\Http\Response
     */
    public function destroy(Educational $educational)
    {
        //
    }
}
