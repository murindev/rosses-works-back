<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use App\Models\Helper\HelperRegion;
use Illuminate\Http\Request;

class HelperRegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return HelperRegion[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return HelperRegion::all();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return HelperRegion[]|\Illuminate\Database\Eloquent\Collection
     */
    public function store(Request $request)
    {
        HelperRegion::updateOrCreate(['id' => $request->input('id')],$request->all());
        return $this->index();
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
