@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan SKTM</h2>
        <p class="birusubjudul">Untuk pengajuan SKTM, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
      @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data Lainnya</h4>
        <form action="{{ route('sktm.store') }}" method="post" class="needs-validation" novalidate>
          @csrf
            <input type="hidden" name="jenis" value="SKTM">
            <div class="mb-3 row">
                <div class="col-md-7 pr-1">
                    <label for="nama_anak">Nama Anak :</label>
                    <input type="text" id="nama_anak" name="nama_anak" class="form-control" placeholder="isikan Nama Anak">
                    @error('nama_anak') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-5 pl-1">
                    <label for="nik_anak">NIK Anak :</label>
                    <input type="text" id="nik_anak" name="nik_anak" class="form-control" placeholder="isikan NIK anak">
                    @error('nik_anak') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-4 pr-1">
                    <label for="tanggal_lahir">Tanggal Lahir :</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" placeholder="isikan tanggal lahir anak">
                    @error('tanggal_lahir') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-4 pr-1 pl-1">
                    <label for="tempat_lahir">Tempat Lahir :</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="isikan tempat lahir anak">
                    @error('tempat_lahir') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-4 pl-1">
                    <label for="jk_anak">Jenis Kelamin :</label>
                    <input type="text" id="jk_anak" name="jk_anak" class="form-control" placeholder="Jenis Kelamin Anak">
                    @error('jk_anak') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-7 pr-1">
                    <label for="sekolah">Sekolah/Universitas :</label>
                    <input type="text" id="sekolah" name="sekolah" class="form-control" placeholder="Sekolah/Universitas Anak">
                    @error('sekolah') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-5 pl-1">
                    <label for="kelas">Kelas/Tingkat :</label>
                    <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Tingkat/Kelas">
                    @error('kelas') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3">
              <label for="keterangan">Keperluan :</label>
              <textarea class="form-control shadow" name="keterangan" id="keterangan" cols="10" rows="3" placeholder="contoh: untuk pengajuan keringanan biaya UKT/SPP"></textarea>
              @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>

          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit" name="translate">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection