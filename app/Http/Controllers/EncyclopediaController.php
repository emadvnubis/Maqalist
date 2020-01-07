<?php

namespace Maqalist\Http\Controllers;

use Maqalist\Encyclopedia;
use Illuminate\Http\Request;

class EncyclopediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('encyclopedia.encyc_child');
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
     * @param  \Maqalist\Encyclopedia  $encyclopedia
     * @return \Illuminate\Http\Response
     */
    public function show(Encyclopedia $encyclopedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Maqalist\Encyclopedia  $encyclopedia
     * @return \Illuminate\Http\Response
     */
    public function edit(Encyclopedia $encyclopedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Maqalist\Encyclopedia  $encyclopedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encyclopedia $encyclopedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Maqalist\Encyclopedia  $encyclopedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encyclopedia $encyclopedia)
    {
        //
    }
}
