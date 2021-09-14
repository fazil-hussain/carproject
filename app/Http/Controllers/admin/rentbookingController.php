<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\maketrip;
use App\Models\RentCar;
use Illuminate\Http\Request;

class rentbookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentbooking=maketrip::where('status',0)->get();
        return view('admin.rentbooking')->with('rentbooking',$rentbooking);
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
     * @param  \App\Models\maketrip  $maketrip
     * @return \Illuminate\Http\Response
     */
    public function show(maketrip $maketrip)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\maketrip  $maketrip
     * @return \Illuminate\Http\Response
     */
    public function edit(maketrip $maketrip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\maketrip  $maketrip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, maketrip $maketrip)
    {
        $car=RentCar::find($request->car_id);
         $status=$car->update(['status'=>1]);
         
            $maketrip->update(['status'=>1]);
            return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\maketrip  $maketrip
     * @return \Illuminate\Http\Response
     */
    public function destroy(maketrip $maketrip)
    {
        // dd($maketrip);
        $destory=$maketrip->delete();
        if($destory)
        {
            return redirect()->back();
        }
        else
        {
            return redirect()->back();

        }

    }

    public function confirmbooking()
    {
        $rentbooking=maketrip::where('status',1)->get();
        return view('admin.rentconfirmbooking')->with('rentbooking',$rentbooking);
    }
}
