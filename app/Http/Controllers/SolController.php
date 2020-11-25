<?php

namespace App\Http\Controllers;

use App\Models\Sol;
use Illuminate\Http\Request;

class SolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view( 'sol', [ 'solDataArray' => Sol::take( 5 )
                                                    ->orderBy( 'sol_key', 'asc' )
                                                    ->get() ] );
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
     * @param  \App\Models\Sol  $sol
     * @return \Illuminate\Http\Response
     */
    public function show(Sol $sol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sol  $sol
     * @return \Illuminate\Http\Response
     */
    public function edit(Sol $sol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sol  $sol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sol $sol)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sol  $sol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sol $sol)
    {
        //
    }
}
