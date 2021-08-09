@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat Kuasa</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Kuasa, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
    @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Memberi Kuasa Kepada :</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="jenis" value="Surat Kuasa">
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="nama">Nama :</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama lengkap">
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
                    <label for="umur">Umur :</label>
                    <input type="text" id="umur" name="umur" class="form-control" placeholder="Isikan Umur">
                    @error('umur') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-8 pl-1">
                    <label for="pekerjaan">Pekerjaan :</label>
                    <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" placeholder="isikan pekerjaan">
                    @error('pekerjaan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="alamat">Alamat RT/RW :</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat tempat tinggal">
                    @error('alamat') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-3 pr-1 pl-1">
                    <label for="desa">Desa :</label>
                    <input type="text" id="desa" name="desa" class="form-control" placeholder="Desa tempat tinggal">
                    @error('desa') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-3 pl-1">
                    <label for="kecamatan">Kecamatan :</label>
                    <input type="text" id="kecamatan" name="kecamatan" class="form-control" placeholder="Kecamatan tempat tinggal">
                    @error('kecamatan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="keterangan">Keperluan :</label>
                <textarea class="form-control shadow" name="keterangan" id="keterangan" cols="10" rows="3" placeholder="contoh: kuasa hak asuh"></textarea>
                @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>

          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection