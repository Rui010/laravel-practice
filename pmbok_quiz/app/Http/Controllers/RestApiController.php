<?php

namespace App\Http\Controllers;

use App\Pmbok_cell;
use Illuminate\Http\Request;
use App\Http\Pmbok_Cell_Controller;

class RestApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pmbok_cells = Pmbok_cell::orderBy('id', 'asc')->get();
        return response()->json($pmbok_cells);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     // 
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pmbok_cell = new pmbok_cell;
        // $request = json_decode($request);
        $pmbok_cell->knowledge_area = $request->knowledge_area;
        $pmbok_cell->pm_process_group = $request->pm_process_group;
        $pmbok_cell->no = $request->no;
        $pmbok_cell->process = $request->process;
        $pmbok_cell->save();
        // return $pmbok_cell;
    
        return redirect('api/cell');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pmbok_cells = Pmbok_cell::where('id', $request->id)->first();
        return response()->json($pmbok_cells);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
        
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
