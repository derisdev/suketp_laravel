@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat Keterangan PUSKESOS</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Keterangan PUSKESOS, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
    @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data</h4>
        <form action="{{ route('puskesos.store') }}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="jenis" value="Surat Keterangan PUSKESOS">
            <div class="mb-3">
                <label for="keterangan">Keperluan :</label>
                <div class="">
                    <select name="keterangan" class="custom-select d-block w-100 select" id="keterangan">
                      <option disabled selected>Pilih Keperluan</option>
                      <option value="Permohonan SKTM">Permohonan SKTM</option>
                      <option value="Permohonan Pembebasan Biaya/Keringanan Biaya Ke Rumah Sakit">Permohonan Pembebasan Biaya/Keringanan Biaya Ke Rumah Sakit</option>
                      <option value="Permohonan Perbaikan Status Pekerjaan Di Kartu Keluarga dan KTP">Permohonan Perbaikan Status Pekerjaan Di Kartu Keluarga dan KTP</option>
                      <option value="Perbaikan Data Pada Kartu Indonesia Sehat">Perbaikan Data Pada Kartu Indonesia Sehat</option>
                      <option value="Keluarga Miskin Tetapi Tidak terdaftar ke dalam BDT/DTKS di SIKS-NG">Keluarga Miskin Tetapi Tidak terdaftar ke dalam BDT/DTKS di SIKS-NG</option>
                    </select>
                    @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- <div class="mb-3">
              <label for="keterangan">Keperluan :</label>
              <textarea class="form-control shadow" name="keterangan" id="keterangan" cols="10" rows="3" placeholder="Harap isikan keperluan. contoh: untuk perlengkapan administrasi"></textarea>
                @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div> --}}

          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection