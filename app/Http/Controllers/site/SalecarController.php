<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\SaleCar;
use Illuminate\Http\Request;

class SalecarController extends Controller
{
    public function bookcar($id)
    {
        $cardet = SaleCar::find($id);
        return view('site.Bookcar')->with('cardetails', $cardet);
    }
    public function salecarpage()
    {
        $salecars=SaleCar::all();
        return view('site.salecarspage')->with('salecars',$salecars);
    }
    public function salecardetails($id)
    {
        $cardetails=SaleCar::find($id);
        return view('site.cardetails')->with('$cardetails',$cardetails);
    }
}
