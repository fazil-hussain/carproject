<?php

namespace App\Http\Controllers;

use App\Models\bookedcar;
use App\Models\SaleCar;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SaleCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car = SaleCar::all();
        return view('admin/allcars')->with('allcars', $car);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/add-car');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        SaleCar::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleCar  $saleCar
     * @return \Illuminate\Http\Response
     */
    public function show(SaleCar $saleCar)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleCar  $saleCar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $res = SaleCar::find($id);
        return view('admin.editallcars')->with('data', $res);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleCar  $saleCar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = SaleCar::find($request->id);
        $data->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleCar  $saleCar
     * @return \Illuminate\Http\Response
     */
    public function destroy($saleCar)
    {
        $res = SaleCar::find($saleCar)->delete();
        if ($res) {
            $data = [
                'status' => '1',

            ];
        } else {
            $data = [
                'status' => '0',

            ];
        }
        return response()->json($data);
    }


    public function bookedcar(Request $request)
    {
        // dd($request);
        bookedcar::create($request->all());
        return view('site.index');
    }

    public function cardetails($id)
    {
        $car = SaleCar::find($id);
        return view('site.cardetails')->with('cardetails', $car);
    }
    public function bookedcarss()
    {
        $cars = bookedcar::where('status', 1)->get();
        return view('admin.bookedcar')->with('bookedcars', $cars);
    }

    public function delbookcar($id)
    {
        $res = SaleCar::find($id)->delete();
        if ($res) {
            $data = [
                'status' => '1',

            ];
        } else {
            $data = [
                'status' => '0',

            ];
        }
        return response()->json($data);
    }
    public function delivercar(Request $request)
    {
        // return response($request);

        $update = DB::table('bookedcars')
            ->where('id', $request->id)
            ->update(['status' => 2]);
        if ($update) {
            $data = [
                'status' => 1
            ];
        } else {
            $data = [
                'status' => 0
            ];
        }
        return response()->json($data);
    }
    public function soldcars()
    {
        $cars = bookedcar::where('status', 2)->get();
        return view('admin.soldcars')->with('bookedcars', $cars);
    }

    public function delsoldcar($saleCar)
    {
        $res = bookedcar::find($saleCar);
        $res->delete();
        if ($res) {
            $data = [
                'status' => '1',

            ];
        } else {
            $data = [
                'status' => '0',

            ];
        }
        return response()->json($data);
    }
}
