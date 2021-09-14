<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentCar extends Model
{
    use HasFactory;
    public $fillable=['carname','brand','model','color','registernumber','ownername','ownercnic','location','image','description','hourlyrate','driverid','status'];
    public function setImageAttribute($value){
        if(is_string($value)){
            $this->attributes['image'] = ImageHelper::saveImageFromApi($value,'admin/images');
        }
        else if(is_file($value)){

            $this->attributes['image'] = ImageHelper::saveImage($value,'admin/images');
        }
    }
    public function getImageAttribute($value){
        return $this->attributes['image'] = asset($value);
    }
}
