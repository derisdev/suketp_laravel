@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat Keterangan Izin Orang Tua</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Keterangan Izin Orang Tua, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
    @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data :</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="jenis" value="Surat Keterangan Izin Orang Tua">
            <div class="mb-3">
                <label for="hubungan">Hubungan keluarga dengan yang diberi izin :</label>
                <div class="">
                    <select name="hubungan" class="custom-select d-block w-100 select" id="hubungan">
                      <option value="Suami">Suami</option>
                      <option value="Istri">Istri</option>
                      <option value="Anak">Anak</option>
                      <option value="Menantu">Menantu</option>
                      <option value="Cucu">Cucu</option>
                      <option value="Orang Tua">Orang Tua</option>
                      <option value="Mertua">Mertua</option>
                      <option value="Famili Lain">Famili Lain</option>
                      <option value="Pembantu">Pembantu</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                    @error('hubungan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="nama">Nama yang di beri izin :</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap">
                    @error('nama') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="nik">NIK :</label>
                    <input type="text" id="nik" name="nik" class="form-control" placeholder="isikan NIK">
                    @error('nik') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-4 pr-1">
                    <label for="tempat_lahir">Tempat Lahir :</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Isikan tempat lahir">
                    @error('tempat_lahir') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-8 pl-1">
                    <label for="tanggal_lahir">Tanggal Lahir :</label>
                    <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control" placeholder="contoh: 8 September 1999">
                    @error('tanggal_lahir') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="keterangan">Memberikan izin untuk :</label>
                <textarea class="form-control shadow" name="keterangan" id="keterangan" cols="10" rows="3" placeholder="contoh: Tidak masuk sekolah"></textarea>
                @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>

          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection