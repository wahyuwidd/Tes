<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRegistrationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nik' => ['required', 'numeric', 'digits:16', 'unique:members,nik'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'unique:members,phone'],
            'province_id' => ['required', 'exists:provinces,id'],
            'regency_id' => ['required', 'exists:regencies,id'],
            'district_id' => ['required', 'exists:districts,id'],
            'village_id' => ['required', 'exists:villages,id'],
        ];
    }
}