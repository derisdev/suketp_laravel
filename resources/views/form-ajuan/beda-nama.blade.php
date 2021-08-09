@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat Keterangan Beda Nama</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Keterangan Beda Nama, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
    @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data:</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="jenis" value="Surat Keterangan Beda Nama">
            <div class="mb-3">
                <label for="perbedaan">Perbedaan :</label>
                <div class="">
                    <select name="perbedaan" class="custom-select d-block w-100 select" id="Pilih perbedaan/kesalahan pada dokumen">
                      <option disabled selected>Pilih Data Yang Terdapat Salah</option>
                      {{-- <option disabled value="Nama Lengkap">Nama Lengkap</option> --}}
                      <option value="Nama Lengkap">Nama Lengkap</option>
                      <option value="Tempat Lahir">Tempat Lahir</option>
                      <option value="Tanggal Lahir">Tanggal Lahir</option>
                      <option value="Agama">Agama</option>
                      <option value="Pekerjaan">Pekerjaan</option>
                      <option value="Status Perkawinan">Status Perkawinan</option>
                      <option value="Alamat">Alamat</option>
                      <option value="Data">Lainnya</option>
                    </select>
                    @error('perbedaan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="dokumen_salah">Dokumen yang terdapat kesalahan:</label>
                    <input type="text" id="dokumen_salah" name="dokumen_salah" class="form-control" placeholder="contoh: Ijazah">
                    @error('dokumen_salah') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="tertulis_salah">Tertulis (Salah):</label>
                    <input type="text" id="tertulis_salah" name="tertulis_salah" class="form-control" placeholder="contoh: Liya Amaliya">
                    @error('tertulis_salah') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="dokumen_benar">Dokumen yang benar:</label>
                    <input type="text" id="dokumen_benar" name="dokumen_benar" class="form-control" placeholder="contoh: Akta Kelahiran">
                    @error('dokumen_benar') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="tertulis_benar">Tertulis (Yang seharusnya):</label>
                    <input type="text" id="tertulis_benar" name="tertulis_benar" class="form-control" placeholder="contoh: Lia Amalia">
                    @error('tertulis_benar') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="keterangan">Keperluan :</label>
                <textarea class="form-control shadow" name="keterangan" id="keterangan" cols="10" rows="3" placeholder="contoh: Untuk pengajuan perbaikan data ijazah ke sekolah"></textarea>
                @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>

          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection