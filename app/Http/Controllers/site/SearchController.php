<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\RentCar;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchrentalcar(Request $request)
    {
        // dd($request);

        $rentalcar = RentCar::where('carname',$request->name)->orWhere('brand',$request->brand)->orWhere('model',$request->model)->orWhere('color',$request->color)->orWhere('location',$request->location)->orWhereBetween('hourlyrate', [$request->raterangemin, $request->raterangemax])->get();

        // dd($rentalcar);
        return view('site.searchrentcar')->with('cardetails', $rentalcar);
        // return response()->json($rentalcar);
    }
    public function searchpage()
    {
        $rentalcar=RentCar::all();
        return view('site.searchrentcar')->with('cardetails', $rentalcar);
    }
}
