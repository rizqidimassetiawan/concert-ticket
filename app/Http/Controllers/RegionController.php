<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionController extends Controller
{
    public function selectProvince(Request $request)
    {
        $provinces = [];

        if ($request->has('q')) {
            $search = $request->q;
            $provinces = Province::select("id", "name")
                ->Where('name', 'LIKE', "%$search%")
                ->get();
        } else {
            $provinces = Province::all();
        }
        return response()->json($provinces);
    }   
    
    public function selectRegency(Request $request)
    {
        $regencies = [];
        $provinceID = $request->provinceID;
        if ($request->has('q')) {
            $search = $request->q;
            $regencies = Regency::select("id", "name")
                ->where('province_id', $provinceID)
                ->Where('name', 'LIKE', "%$search%")
                ->get();
        } else {
            $regencies = Regency::where('province_id', $provinceID)->get();
        }
        return response()->json($regencies);
    }

     public function selectDistrict(Request $request)
    {
        $districts = [];
        $regencyID = $request->regencyID;
        if ($request->has('q')) {
            $search = $request->q;
            $districts = District::select("id", "name")
                ->where('regency_id', $regencyID)
                ->Where('name', 'LIKE', "%$search%")
                ->get();
        } else {
            $districts = District::where('regency_id', $regencyID)->get();
        }
        return response()->json($districts);
    }
    
    public function selectVillage(Request $request)
    {
        $villages = [];
        $districtID = $request->districtID;
        if ($request->has('q')) {
            $search = $request->q;
            $villages = Village::select("id", "name")
                ->where('district_id', $districtID)
                ->Where('name', 'LIKE', "%$search%")
                ->get();
        } else {
            $villages = Village::where('district_id', $districtID)->get();
        }
        return response()->json($villages);
    }
}