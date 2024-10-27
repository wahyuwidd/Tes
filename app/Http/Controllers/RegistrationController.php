<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Http\Requests\MemberRegistrationRequest;
use App\Models\Member;

class RegistrationController extends Controller
{
    public function create()
    {
        $provinces = Province::all();
        $districts = District::all();
        $regencies = Regency::all();
        return view('registration.create', compact('provinces', 'districts', 'regencies'));	
    }

    public function store(MemberRegistrationRequest $request)
    {
        Member::create($request->validated());
        return view('registration.success'); 
    }

    public function getRegencies($provinceId)
    {
        $regencies = Regency::where('province_id', $provinceId)->get();
        return response()->json($regencies);
    }

    public function getDistricts($regencyId)
    {
        $districts = District::where('regency_id', $regencyId)->get();
        return response()->json($districts);
    }

    public function getVillages($districtId)
    {
        $villages = Village::where('district_id', $districtId)->get();
        return response()->json($villages);
    }
}
