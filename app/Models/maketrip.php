<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maketrip extends Model
{
    use HasFactory;
    public $fillable=['name','contact','picklocation','droplocation','pickdatetime','dropdatetime','charges','car_id','status'];
}
