<?php
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run()
    {
        $provinces = [
            ['name' => 'DKI Jakarta'],
            ['name' => 'Jawa Barat'],
            ['name' => 'Jawa Tengah'],
            ['name' => 'Jawa Timur'],
            ['name' => 'Banten'],
        ];

        foreach ($provinces as $province) {
            $provinceModel = Province::create($province);

            // Regencies for each province
            $regencies = [];

            if ($provinceModel->name == 'DKI Jakarta') {
                $regencies = [
                    ['name' => 'Jakarta Pusat'],
                    ['name' => 'Jakarta Utara'],
                    ['name' => 'Jakarta Selatan'],
                    ['name' => 'Jakarta Barat'],
                    ['name' => 'Jakarta Timur'],
                ];
            } elseif ($provinceModel->name == 'Jawa Barat') {
                $regencies = [
                    ['name' => 'Kabupaten Bogor'],
                    ['name' => 'Kabupaten Bandung'],
                    ['name' => 'Kabupaten Sukabumi'],
                    ['name' => 'Kabupaten Cirebon'],
                    ['name' => 'Kabupaten Garut'],
                ];
            } elseif ($provinceModel->name == 'Jawa Tengah') {
                $regencies = [
                    ['name' => 'Kabupaten Semarang'],
                    ['name' => 'Kabupaten Banyumas'],
                    ['name' => 'Kabupaten Kudus'],
                    ['name' => 'Kabupaten Magelang'],
                    ['name' => 'Kabupaten Demak'],
                ];
            } elseif ($provinceModel->name == 'Jawa Timur') {
                $regencies = [
                    ['name' => 'Kabupaten Malang'],
                    ['name' => 'Kabupaten Surabaya'],
                    ['name' => 'Kabupaten Sidoarjo'],
                    ['name' => 'Kabupaten Jember'],
                    ['name' => 'Kabupaten Banyuwangi'],
                ];
            } elseif ($provinceModel->name == 'Banten') {
                $regencies = [
                    ['name' => 'Kabupaten Tangerang'],
                    ['name' => 'Kabupaten Serang'],
                    ['name' => 'Kabupaten Lebak'],
                    ['name' => 'Kabupaten Pandeglang'],
                    ['name' => 'Kabupaten Cilegon'],
                ];
            }

            foreach ($regencies as $regency) {
                $regencyModel = $provinceModel->regencies()->create($regency);

                // Districts for each regency
                $districts = [];

                if ($regencyModel->name == 'Jakarta Pusat') {
                    $districts = [
                        ['name' => 'Menteng'],
                        ['name' => 'Tanah Abang'],
                    ];
                } elseif ($regencyModel->name == 'Jakarta Utara') {
                    $districts = [
                        ['name' => 'Pademangan'],
                        ['name' => 'Kelapa Gading'],
                    ];
                } elseif ($regencyModel->name == 'Jakarta Selatan') {
                    $districts = [
                        ['name' => 'Kebayoran Baru'],
                        ['name' => 'Cilandak'],
                    ];
                } elseif ($regencyModel->name == 'Jakarta Barat') {
                    $districts = [
                        ['name' => 'Kembangan'],
                        ['name' => 'Grogol Petamburan'],
                    ];
                } elseif ($regencyModel->name == 'Jakarta Timur') {
                    $districts = [
                        ['name' => 'Cakung'],
                        ['name' => 'Duren Sawit'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Bogor') {
                    $districts = [
                        ['name' => 'Bogor Selatan'],
                        ['name' => 'Cibinong'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Bandung') {
                    $districts = [
                        ['name' => 'Bandung Kulon'],
                        ['name' => 'Cimahi'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Sukabumi') {
                    $districts = [
                        ['name' => 'Sukabumi'],
                        ['name' => 'Cibadak'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Cirebon') {
                    $districts = [
                        ['name' => 'Cirebon Utara'],
                        ['name' => 'Kedawung'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Garut') {
                    $districts = [
                        ['name' => 'Garut Kota'],
                        ['name' => 'Banyuresmi'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Semarang') {
                    $districts = [
                        ['name' => 'Ungaran Timur'],
                        ['name' => 'Banyumanik'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Banyumas') {
                    $districts = [
                        ['name' => 'Purwokerto Selatan'],
                        ['name' => 'Ajibarang'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Kudus') {
                    $districts = [
                        ['name' => 'Kudus'],
                        ['name' => 'Jati'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Magelang') {
                    $districts = [
                        ['name' => 'Magelang Selatan'],
                        ['name' => 'Mertoyudan'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Demak') {
                    $districts = [
                        ['name' => 'Demak'],
                        ['name' => 'Karangawen'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Malang') {
                    $districts = [
                        ['name' => 'Batu'],
                        ['name' => 'Kedung Kandang'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Surabaya') {
                    $districts = [
                        ['name' => 'Gubeng'],
                        ['name' => 'Wonokromo'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Sidoarjo') {
                    $districts = [
                        ['name' => 'Sidoarjo'],
                        ['name' => 'Taman'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Jember') {
                    $districts = [
                        ['name' => 'Jember'],
                        ['name' => 'Sempolan'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Banyuwangi') {
                    $districts = [
                        ['name' => 'Banyuwangi'],
                        ['name' => 'Glenmore'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Tangerang') {
                    $districts = [
                        ['name' => 'Tangerang'],
                        ['name' => 'Cisauk'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Serang') {
                    $districts = [
                        ['name' => 'Serang'],
                        ['name' => 'Cikande'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Lebak') {
                    $districts = [
                        ['name' => 'Lebak'],
                        ['name' => 'Cihara'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Pandeglang') {
                    $districts = [
                        ['name' => 'Pandeglang'],
                        ['name' => 'Cibeber'],
                    ];
                } elseif ($regencyModel->name == 'Kabupaten Cilegon') {
                    $districts = [
                        ['name' => 'Cilegon'],
                        ['name' => 'Jombang'],
                    ];
                }

                foreach ($districts as $district) {
                    $districtModel = $regencyModel->districts()->create($district);

                    // Villages for each district
                    $villages = [];

                    if ($districtModel->name == 'Menteng') {
                        $villages = [
                            ['name' => 'Kelurahan Menteng 1'],
                            ['name' => 'Kelurahan Menteng 2'],
                            ['name' => 'Kelurahan Menteng 3'],
                            ['name' => 'Kelurahan Menteng 4'],
                            ['name' => 'Kelurahan Menteng 5'],
                        ];
                    } elseif ($districtModel->name == 'Tanah Abang') {
                        $villages = [
                            ['name' => 'Kelurahan Kebon Kacang 1'],
                            ['name' => 'Kelurahan Kebon Kacang 2'],
                            ['name' => 'Kelurahan Kebon Kacang 3'],
                            ['name' => 'Kelurahan Kebon Kacang 4'],
                            ['name' => 'Kelurahan Kebon Kacang 5'],
                        ];
                    } elseif ($districtModel->name == 'Pademangan') {
                        $villages = [
                            ['name' => 'Kelurahan Pademangan Barat 1'],
                            ['name' => 'Kelurahan Pademangan Barat 2'],
                            ['name' => 'Kelurahan Pademangan Barat 3'],
                            ['name' => 'Kelurahan Pademangan Barat 4'],
                            ['name' => 'Kelurahan Pademangan Barat 5'],
                        ];
                    } elseif ($districtModel->name == 'Kelapa Gading') {
                        $villages = [
                            ['name' => 'Kelurahan Kelapa Gading 1'],
                            ['name' => 'Kelurahan Kelapa Gading 2'],
                            ['name' => 'Kelurahan Kelapa Gading 3'],
                            ['name' => 'Kelurahan Kelapa Gading 4'],
                            ['name' => 'Kelurahan Kelapa Gading 5'],
                        ];
                    } elseif ($districtModel->name == 'Kebayoran Baru') {
                        $villages = [
                            ['name' => 'Kelurahan Kebayoran Baru 1'],
                            ['name' => 'Kelurahan Kebayoran Baru 2'],
                            ['name' => 'Kelurahan Kebayoran Baru 3'],
                            ['name' => 'Kelurahan Kebayoran Baru 4'],
                            ['name' => 'Kelurahan Kebayoran Baru 5'],
                        ];
                    } elseif ($districtModel->name == 'Cilandak') {
                        $villages = [
                            ['name' => 'Kelurahan Cilandak 1'],
                            ['name' => 'Kelurahan Cilandak 2'],
                            ['name' => 'Kelurahan Cilandak 3'],
                            ['name' => 'Kelurahan Cilandak 4'],
                            ['name' => 'Kelurahan Cilandak 5'],
                        ];
                    } elseif ($districtModel->name == 'Kembangan') {
                        $villages = [
                            ['name' => 'Kelurahan Kembangan 1'],
                            ['name' => 'Kelurahan Kembangan 2'],
                            ['name' => 'Kelurahan Kembangan 3'],
                            ['name' => 'Kelurahan Kembangan 4'],
                            ['name' => 'Kelurahan Kembangan 5'],
                        ];
                    } elseif ($districtModel->name == 'Grogol Petamburan') {
                        $villages = [
                            ['name' => 'Kelurahan Grogol 1'],
                            ['name' => 'Kelurahan Grogol 2'],
                            ['name' => 'Kelurahan Grogol 3'],
                            ['name' => 'Kelurahan Grogol 4'],
                            ['name' => 'Kelurahan Grogol 5'],
                        ];
                    } elseif ($districtModel->name == 'Cakung') {
                        $villages = [
                            ['name' => 'Kelurahan Cakung 1'],
                            ['name' => 'Kelurahan Cakung 2'],
                            ['name' => 'Kelurahan Cakung 3'],
                            ['name' => 'Kelurahan Cakung 4'],
                            ['name' => 'Kelurahan Cakung 5'],
                        ];
                    } elseif ($districtModel->name == 'Duren Sawit') {
                        $villages = [
                            ['name' => 'Kelurahan Duren Sawit 1'],
                            ['name' => 'Kelurahan Duren Sawit 2'],
                            ['name' => 'Kelurahan Duren Sawit 3'],
                            ['name' => 'Kelurahan Duren Sawit 4'],
                            ['name' => 'Kelurahan Duren Sawit 5'],
                        ];
                    } elseif ($districtModel->name == 'Bogor Selatan') {
                        $villages = [
                            ['name' => 'Kelurahan Bogor Selatan 1'],
                            ['name' => 'Kelurahan Bogor Selatan 2'],
                            ['name' => 'Kelurahan Bogor Selatan 3'],
                            ['name' => 'Kelurahan Bogor Selatan 4'],
                            ['name' => 'Kelurahan Bogor Selatan 5'],
                        ];
                    } elseif ($districtModel->name == 'Cibinong') {
                        $villages = [
                            ['name' => 'Kelurahan Cibinong 1'],
                            ['name' => 'Kelurahan Cibinong 2'],
                            ['name' => 'Kelurahan Cibinong 3'],
                            ['name' => 'Kelurahan Cibinong 4'],
                            ['name' => 'Kelurahan Cibinong 5'],
                        ];
                    } elseif ($districtModel->name == 'Bandung Kulon') {
                        $villages = [
                            ['name' => 'Kelurahan Bandung Kulon 1'],
                            ['name' => 'Kelurahan Bandung Kulon 2'],
                            ['name' => 'Kelurahan Bandung Kulon 3'],
                            ['name' => 'Kelurahan Bandung Kulon 4'],
                            ['name' => 'Kelurahan Bandung Kulon 5'],
                        ];
                    } elseif ($districtModel->name == 'Cimahi') {
                        $villages = [
                            ['name' => 'Kelurahan Cimahi 1'],
                            ['name' => 'Kelurahan Cimahi 2'],
                            ['name' => 'Kelurahan Cimahi 3'],
                            ['name' => 'Kelurahan Cimahi 4'],
                            ['name' => 'Kelurahan Cimahi 5'],
                        ];
                    } elseif ($districtModel->name == 'Sukabumi') {
                        $villages = [
                            ['name' => 'Kelurahan Sukabumi 1'],
                            ['name' => 'Kelurahan Sukabumi 2'],
                            ['name' => 'Kelurahan Sukabumi 3'],
                            ['name' => 'Kelurahan Sukabumi 4'],
                            ['name' => 'Kelurahan Sukabumi 5'],
                        ];
                    } elseif ($districtModel->name == 'Cirebon Utara') {
                        $villages = [
                            ['name' => 'Kelurahan Cirebon Utara 1'],
                            ['name' => 'Kelurahan Cirebon Utara 2'],
                            ['name' => 'Kelurahan Cirebon Utara 3'],
                            ['name' => 'Kelurahan Cirebon Utara 4'],
                            ['name' => 'Kelurahan Cirebon Utara 5'],
                        ];
                    } elseif ($districtModel->name == 'Kedawung') {
                        $villages = [
                            ['name' => 'Kelurahan Kedawung 1'],
                            ['name' => 'Kelurahan Kedawung 2'],
                            ['name' => 'Kelurahan Kedawung 3'],
                            ['name' => 'Kelurahan Kedawung 4'],
                            ['name' => 'Kelurahan Kedawung 5'],
                        ];
                    } elseif ($districtModel->name == 'Garut Kota') {
                        $villages = [
                            ['name' => 'Kelurahan Garut Kota 1'],
                            ['name' => 'Kelurahan Garut Kota 2'],
                            ['name' => 'Kelurahan Garut Kota 3'],
                            ['name' => 'Kelurahan Garut Kota 4'],
                            ['name' => 'Kelurahan Garut Kota 5'],
                        ];
                    } elseif ($districtModel->name == 'Banyuresmi') {
                        $villages = [
                            ['name' => 'Kelurahan Banyuresmi 1'],
                            ['name' => 'Kelurahan Banyuresmi 2'],
                            ['name' => 'Kelurahan Banyuresmi 3'],
                            ['name' => 'Kelurahan Banyuresmi 4'],
                            ['name' => 'Kelurahan Banyuresmi 5'],
                        ];
                    } elseif ($districtModel->name == 'Ungaran Timur') {
                        $villages = [
                            ['name' => 'Kelurahan Ungaran Timur 1'],
                            ['name' => 'Kelurahan Ungaran Timur 2'],
                            ['name' => 'Kelurahan Ungaran Timur 3'],
                            ['name' => 'Kelurahan Ungaran Timur 4'],
                            ['name' => 'Kelurahan Ungaran Timur 5'],
                        ];
                    } elseif ($districtModel->name == 'Banyumanik') {
                        $villages = [
                            ['name' => 'Kelurahan Banyumanik 1'],
                            ['name' => 'Kelurahan Banyumanik 2'],
                            ['name' => 'Kelurahan Banyumanik 3'],
                            ['name' => 'Kelurahan Banyumanik 4'],
                            ['name' => 'Kelurahan Banyumanik 5'],
                        ];
                    } elseif ($districtModel->name == 'Purwokerto Selatan') {
                        $villages = [
                            ['name' => 'Kelurahan Purwokerto Selatan 1'],
                            ['name' => 'Kelurahan Purwokerto Selatan 2'],
                            ['name' => 'Kelurahan Purwokerto Selatan 3'],
                            ['name' => 'Kelurahan Purwokerto Selatan 4'],
                            ['name' => 'Kelurahan Purwokerto Selatan 5'],
                        ];
                    } elseif ($districtModel->name == 'Ajibarang') {
                        $villages = [
                            ['name' => 'Kelurahan Ajibarang 1'],
                            ['name' => 'Kelurahan Ajibarang 2'],
                            ['name' => 'Kelurahan Ajibarang 3'],
                            ['name' => 'Kelurahan Ajibarang 4'],
                            ['name' => 'Kelurahan Ajibarang 5'],
                        ];
                    } elseif ($districtModel->name == 'Tebet') {
                        $villages = [
                            ['name' => 'Kelurahan Tebet 1'],
                            ['name' => 'Kelurahan Tebet 2'],
                            ['name' => 'Kelurahan Tebet 3'],
                            ['name' => 'Kelurahan Tebet 4'],
                            ['name' => 'Kelurahan Tebet 5'],
                        ];
                    }

                    foreach ($villages as $village) {
                        $districtModel->villages()->create($village);
                    }
                }
            }
        }
    }
}
