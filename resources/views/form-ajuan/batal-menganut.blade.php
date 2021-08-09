@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat Keterangan Batal Menganut Kepercayaan Tuhan YME</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Keterangan Batal Menganut Kepercayaan Tuhan YME, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
    @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data:</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="jenis" value="Surat Keterangan Batal Menganut Kepercayaan Tuhan YME">
            <input type="hidden" name="keterangan" value="Pengajuan Surat Keterangan Batal Menganut Kepercayaan Tuhan YME">
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="organisasi">Nama Organisasi (Kep Tuhan YME):</label>
                    <input type="text" id="organisasi" name="organisasi" class="form-control" placeholder="Nama organisasi kepercayaan">
                    @error('organisasi') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="agama_baru">Agama yang sekarang akan dianut:</label>
                    <div class="">
                        <select name="agama_baru" class="custom-select d-block w-100 select" id="agama_baru">
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Protestan">Protestan</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                          <option value="Konghuchu">Konghuchu</option>
                          <option value="Yahudi">Yahudi</option>
                        </select>
                        @error('agama_baru')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-4 pr-1">
                    <label for="tanggal_perubahan">Tanggal Perubahan:</label>
                    <input type="date" id="tanggal_perubahan" name="tanggal_perubahan" class="form-control" placeholder="">
                    @error('tanggal_perubahan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-8 pl-1">
                    <label for="dasar_perubahan">Dasar Perubahan :</label>
                    <textarea class="form-control" name="dasar_perubahan" id="dasar_perubahan" cols="10" rows="3"    placeholder="Dasar perubahan kepercayaan"></textarea>
                    @error('dasar_perubahan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection