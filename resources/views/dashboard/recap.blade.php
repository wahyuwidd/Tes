@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Rekapitulasi Anggota</h3>
            <!--  -->
        </div>
        <div class="card-body">
            @if(isset($data['provinces']))
            <h4>Provinsi</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Provinsi</th>
                            <th>Total Anggota</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['provinces'] as $i => $province)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $province->name }}</td>
                            <td>{{ $province->members_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

            @if(isset($data['regencies']))
            <h4>Kabupaten</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kabupaten</th>
                            <th>Total Anggota</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['regencies'] as $i => $regency)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $regency->name }}</td>
                            <td>{{ $regency->members_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

            @if(isset($data['districts']))
            <h4>Kecamatan</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kecamatan</th>
                            <th>Total Anggota</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['districts'] as $i => $district)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $district->name }}</td>
                            <td>{{ $district->members_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection