<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script>
        $(document).ready(function() {
    $('#province_id').change(function() {
        const provinceId = $(this).val();
        if (provinceId) {
            $.get(`/api/provinces/${provinceId}/regencies`, function(data) {
                $('#regency_id').prop('disabled', false).empty()
                    .append('<option value="">Pilih Kabupaten</option>');
                data.forEach(function(regency) {
                    $('#regency_id').append(
                        `<option value="${regency.id}">${regency.name}</option>`
                    );
                });
            });
        } else {
            $('#regency_id').prop('disabled', true).empty()
                .append('<option value="">Pilih Kabupaten</option>');
        }
        $('#district_id, #village_id').prop('disabled', true).empty()
            .append('<option value="">Pilih...</option>');
    });

    $('#regency_id').change(function() {
        const regencyId = $(this).val();
        if (regencyId) {
            $.get(`/api/regencies/${regencyId}/districts`, function(data) {
                $('#district_id').prop('disabled', false).empty()
                    .append('<option value="">Pilih Kecamatan</option>');
                data.forEach(function(district) {
                    $('#district_id').append(
                        `<option value="${district.id}">${district.name}</option>`
                    );
                });
            });
        } else {
            $('#district_id').prop('disabled', true).empty()
                .append('<option value="">Pilih Kecamatan</option>');
        }
        $('#village_id').prop('disabled', true).empty()
            .append('<option value="">Pilih Kelurahan</option>');
    });

    $('#district_id').change(function() {
    const districtId = $(this).val();
    if (districtId) {
        $.get(`/api/districts/${districtId}/villages`, function(data) {
            $('#village_id').prop('disabled', false).empty()
                .append('<option value="">Pilih Kelurahan</option>');
            data.forEach(function(village) {
                $('#village_id').append(
                    `<option value="${village.id}">${village.name}</option>`
                );
            });
        });
    } else {
        $('#village_id').prop('disabled', true).empty()
            .append('<option value="">Pilih Kelurahan</option>');
    }
});

});

    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        $(document).ready(function() {
            // Set up CSRF token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#province_id').change(function() {
                const provinceId = $(this).val();
                if (provinceId) {
                    $.ajax({
                        url: `/api/provinces/${provinceId}/regencies`,
                        type: 'GET',
                        success: function(data) {
                            $('#regency_id').prop('disabled', false).empty()
                                .append('<option value="">Pilih Kabupaten</option>');
                            data.forEach(function(regency) {
                                $('#regency_id').append(
                                    `<option value="${regency.id}">${regency.name}</option>`
                                );
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                        }
                    });
                } else {
                    $('#regency_id').prop('disabled', true).empty()
                        .append('<option value="">Pilih Kabupaten</option>');
                }
            });
        });
    </script>
</body>
</html>
