<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookedcar extends Model
{
    use HasFactory;
    public $fillable=['car_id','name','email','phone','addressline1','addressline2','status'];

    public function car()
    {
              return $this->belongsTo(SaleCar::class,'car_id');

    }
}
