<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'admin_pusat',
            'password' => Hash::make('password'),
            'role' => 'admin_pusat'
        ]);

        $province = Province::first();
        
        User::create([
            'username' => 'admin_provinsi_' . strtolower(str_replace(' ', '_', $province->name)),
            'password' => Hash::make('password'),
            'role' => 'admin_provinsi',
            'province_id' => $province->id
        ]);

        $regency = $province->regencies()->first();
        
        User::create([
            'username' => 'admin_kabupaten_' . strtolower(str_replace(' ', '_', $regency->name)),
            'password' => Hash::make('password'),
            'role' => 'admin_kabupaten',
            'province_id' => $province->id,
            'regency_id' => $regency->id
        ]);

        $district = $regency->districts()->first();
        
        User::create([
            'username' => 'admin_kecamatan_' . strtolower(str_replace(' ', '_', $district->name)),
            'password' => Hash::make('password'),
            'role' => 'admin_kecamatan',
            'province_id' => $province->id,
            'regency_id' => $regency->id,
            'district_id' => $district->id
        ]);

        $village = $district->villages()->first();
        
        User::create([
            'username' => 'admin_kelurahan_' . strtolower(str_replace(' ', '_', $village->name)),
            'password' => Hash::make('password'),
            'role' => 'admin_kelurahan',
            'province_id' => $province->id,
            'regency_id' => $regency->id,
            'district_id' => $district->id,
            'village_id' => $village->id
        ]);
    }
}
