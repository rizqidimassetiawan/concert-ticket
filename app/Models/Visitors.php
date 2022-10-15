<?php

namespace App\Models;

use App\Models\Band;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitors extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function band(){
        return $this->belongsTo(Band::class,'band_id');
    }
    public function province(){
        return $this->belongsTo(Province::class,'province_id');
    }

    public function regency(){
        return $this->belongsTo(Regency::class,'regency_id');
    }

    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }

    public function village(){
        return $this->belongsTo(Village::class,'village_id');
    }
}