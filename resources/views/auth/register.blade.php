@extends('layouts.auth')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">Daftar</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="nama" class="">Nama Lengkap</label>
                                    <div class="">
                                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="nik" class="">NIK</label>
                                    <div class="">
                                        <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik">
                                        @error('nik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="no_kk" class="">No Kartu Keluarga</label>
                                    <div class="">
                                        <input id="no_kk" type="text" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" value="{{ old('no_kk') }}" required autocomplete="no_kk">
                                        @error('no_kk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="ttl" class="">Tempat, Tanggal Lahir</label>
                                    <div class="">
                                        <input id="ttl" type="text" class="form-control @error('ttl') is-invalid @enderror" name="ttl" value="{{ old('ttl') }}" required autocomplete="ttl" placeholder="contoh: Bandung, 8 September 1999">
                                        @error('ttl')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 pr-1 ">
                                <div class="form-group">
                                    <label for="agama" class="">Agama</label>
                                    <div class="">
                                        <input id="agama" type="text" class="form-control @error('agama') is-invalid @enderror" name="agama" value="{{ old('agama') }}" required autocomplete="agama">
                                        @error('agama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 pr-1 pl-1">
                                 <div class="form-group">
                                    <label for="status" class="">Status</label>
                                    <div class="">
                                        <select name="status" class="custom-select d-block w-100 select" id="status">
                                          <option value="Menikah">Menikah</option>
                                          <option value="Belum Menikah">Belum Menikah</option>
                                          <option value="Duda">Duda</option>
                                          <option value="Janda">Janda</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 pl-1 pr-1">
                                <div class="form-group">
                                    <label for="jk" class="">Jenis Kelamin</label>
                                    <div class="">
                                        <select name="jk" class="custom-select d-block w-100 select" id="jk">
                                          <option value="Laki-laki">Laki-laki</option>
                                          <option value="Perempuan">Perempuan</option>
                                        </select>
                                        @error('jk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                 <div class="form-group">
                                    <label for="pendidikan" class="">Pendidikan</label>
                                    <div class="">
                                        <select name="pendidikan" class="custom-select d-block w-100 select" id="pendidikan">
                                          <option value="SD/Sederajat">SD/Sederajat</option>
                                          <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                                          <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                          <option value="Diploma">Diploma</option>
                                          <option value="Sarjana S1">Sarjana S1</option>
                                          <option value="Sarjana S2">Sarjana S2</option>
                                          <option value="Sarjana S3">Sarjana S3</option>
                                        </select>
                                        @error('pendidikan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="pekerjaan" class="">Pekerjaan</label>
                                    <div class="">
                                        <input id="pekerjaan" type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" value="{{ old('pekerjaan') }}" required autocomplete="pekerjaan" placeholder="contoh: Ibu Rumah Tangga">
                                        @error('pekerjaan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pr-1 pl-1">
                                <div class="form-group">
                                    <label for="kewarganegaraan" class="">Kewarganegaraan</label>
                                    <div class="">
                                        <input id="kewarganegaraan" type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" value="Indonesia" required autocomplete="kewarganegaraan" placeholder="Indonesia">
                                        @error('kewarganegaraan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 pr-1 pl-1">
                                 <div class="form-group">
                                    <label for="rt" class="">Rt</label>
                                    <div class="">
                                        <select name="rt" class="custom-select d-block w-100 select" id="rt">
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                          <option value="7">8</option>
                                          <option value="7">9</option>
                                          <option value="7">10</option>
                                          <option value="7">11</option>
                                          <option value="7">12</option>
                                          <option value="7">13</option>
                                          <option value="7">14</option>
                                          <option value="7">15</option>
                                          <option value="7">16</option>
                                          <option value="7">17</option>
                                        </select>
                                        @error('rt')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 pl-1">
                                 <div class="form-group">
                                    <label for="rw" class="">Rw</label>
                                    <div class="">
                                        <select name="rw" class="custom-select d-block w-100 select" id="rw">
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                          <option value="7">8</option>
                                          <option value="7">9</option>
                                          <option value="7">10</option>
                                          <option value="7">11</option>
                                          <option value="7">12</option>
                                          <option value="7">13</option>
                                          <option value="7">14</option>
                                          <option value="7">15</option>
                                          <option value="7">16</option>
                                          <option value="7">17</option>
                                        </select>
                                        @error('rw')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-3 pr-1 pl-1">
                                <div class="form-group">
                                    <label for="rt_rw" class="">Anggota Rt/Rw</label>
                                    <div class="">
                                        <input id="rt_rw" type="text" class="form-control @error('rt_rw') is-invalid @enderror" name="rt_rw" value="{{ old('rt_rw') }}" required autocomplete="rt_rw" placeholder="cont: 03/05">
                                        @error('rt_rw')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="ayah" class="">Nama Ayah</label>
                                    <div class="">
                                        <input id="ayah" type="text" class="form-control @error('ayah') is-invalid @enderror" name="ayah" value="{{ old('ayah') }}" required autocomplete="ayah" autofocus>
                                        @error('ayah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="ibu" class="">Nama Ibu</label>
                                    <div class="">
                                        <input id="ibu" type="text" class="form-control @error('ibu') is-invalid @enderror" name="ibu" value="{{ old('ibu') }}" required autocomplete="ibu">
                                        @error('ibu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="">Alamat Lengkap</label>
                            <div class="">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" placeholder="No Rumah, Jalan, Rt/Rw, Kecamatan, Desa, Kabupaten/Kota">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="password" class="">Kata Sandi</label>
                                    <div class="">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="password-confirm" class="">Ulangi Kata Sandi</label>
                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 my-3">
                                <button type="submit" class="btn tombol">
                                    <span class="px-5">
                                        Daftar
                                    </span>
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
