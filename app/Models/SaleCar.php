<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleCar extends Model
{
    use HasFactory;

    protected $fillable=['carname','brand','model','color','price','image','description'];

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

