@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat Kelahiran</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Kelahiran, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
    @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data:</h4>
        <form action="{{ route('kelahiran.store') }}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="jenis" value="Surat Kelahiran">
            <input type="hidden" name="keterangan" value="Surat Kelahiran">
            <div class="mb-3 row">
                <div class="col-md-4 pr-1">
                    <label for="hari">Hari:</label>
                    <input type="text" id="hari" name="hari" class="form-control" placeholder="Hari">
                    @error('hari') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-4 pr-1 pl-1">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal">
                    @error('tanggal') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-4 pl-1">
                    <label for="pukul">Pukul:</label>
                    <input type="text" id="pukul" name="pukul" class="form-control" placeholder="Pukul">
                    @error('pukul') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="tempat">Tempat :</label>
                <textarea class="form-control" name="tempat" id="tempat" cols="10" rows="2" placeholder="contoh: Gedung Serbaguna Jalan Cibatu, No. 11"></textarea>
                @error('tempat') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>
            <hr>
            <h4 class="mb-3">Isi Data Anak:</h4>
            <div class="mb-3">
                <label for="nama_anak">Nama Anak:</label>
                <input type="text" id="nama_anak" name="nama_anak" class="form-control" placeholder="Nama Lengkap Anak">
                @error('nama_anak') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="jk_anak">Jenis Kelamin Anak :</label>
                    <select name="jk_anak" class="form-control" id="jk_anak" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6 pl-1">
                    <label for="anak_ke">Anak Ke:</label>
                    <input type="text" id="anak_ke" name="anak_ke" class="form-control" placeholder="Contoh: 2">
                    @error('anak_ke') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>

            <hr>
            <h4 class="mb-3">Isi Data Ibu:</h4>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="nama_ibu">Nama Ibu:</label>
                    <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" placeholder="Nama Lengkap Ibu">
                    @error('nama_ibu') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="umur_ibu">Umur Ibu:</label>
                    <input type="text" id="umur_ibu" name="umur_ibu" class="form-control" placeholder="Isi Umur">
                    @error('umur_ibu') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="agama_ibu">Agama Ibu:</label>
                    <input type="text" id="agama_ibu" name="agama_ibu" class="form-control" placeholder="Isi Agama">
                    @error('agama_ibu') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="pekerjaan_ibu">Pekerjaan Ibu:</label>
                    <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="form-control" placeholder="Contoh: Ibu Rumah Tangga">
                    @error('pekerjaan_ibu') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat_ibu">Alamat Ibu:</label>
                <textarea class="form-control" name="alamat_ibu" id="alamat_ibu" cols="10" rows="2" placeholder="contoh: Gedung Serbaguna Jalan Cibatu, No. 11"></textarea>
                @error('alamat_ibu') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>

            <hr>
            <h4 class="mb-3">Isi Data Ayah:</h4>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="nama_ayah">Nama Ayah:</label>
                    <input type="text" id="nama_ayah" name="nama_ayah" class="form-control" placeholder="Nama Lengkap ayah">
                    @error('nama_ayah') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="umur_ayah">Umur Ayah:</label>
                    <input type="text" id="umur_ayah" name="umur_ayah" class="form-control" placeholder="Isi Umur">
                    @error('umur_ayah') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="agama_ayah">Agama Ayah:</label>
                    <input type="text" id="agama_ayah" name="agama_ayah" class="form-control" placeholder="Isi Agama">
                    @error('agama_ayah') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="pekerjaan_ayah">Pekerjaan Ayah:</label>
                    <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="form-control" placeholder="Contoh: ayah Rumah Tangga">
                    @error('pekerjaan_ayah') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat_ayah">Alamat Ayah:</label>
                <textarea class="form-control" name="alamat_ayah" id="alamat_ayah" cols="10" rows="2" placeholder="contoh: Gedung Serbaguna Jalan Cibatu, No. 11"></textarea>
                @error('alamat_ayah') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>

          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection