@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formulir Pendaftaran</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('registration.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="nik">No. KTP</label>
                    <input type="text" 
                           class="form-control @error('nik') is-invalid @enderror" 
                           id="nik" 
                           name="nik" 
                           value="{{ old('nik') }}" 
                           required 
                           maxlength="16" 
                           pattern="\d{16}">
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" 
                           class="form-control @error('name') is-invalid @enderror" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') }}" 
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">No. Handphone</label>
                    <input type="text" 
                           class="form-control @error('phone') is-invalid @enderror" 
                           id="phone" 
                           name="phone" 
                           value="{{ old('phone') }}" 
                           required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="province_id">Provinsi</label>
                    <select class="form-control @error('province_id') is-invalid @enderror" 
                            id="province_id" 
                            name="province_id" 
                            required>
                        <option value="">Pilih Provinsi</option>
                        @foreach($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                    @error('province_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="regency_id">Kabupaten</label>
                    <select class="form-control @error('regency_id') is-invalid @enderror" 
                            id="regency_id" 
                            name="regency_id" 
                            required 
                            disabled>
                        <option value="">Pilih Kabupaten</option>
                    </select>
                    @error('regency_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="district_id">Kecamatan</label>
                    <select class="form-control @error('district_id') is-invalid @enderror" 
                            id="district_id" 
                            name="district_id" 
                            required 
                            disabled>
                        <option value="">Pilih Kecamatan</option>
                    </select>
                    @error('district_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="village_id">Kelurahan</label>
                    <select class="form-control @error('village_id') is-invalid @enderror" 
                            id="village_id" 
                            name="village_id" 
                            required 
                            disabled>
                        <option value="">Pilih Kelurahan</option>
                    </select>
                    @error('village_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">Daftar</button>
            </form>
        </div>
    </div>
</div>
@endsection