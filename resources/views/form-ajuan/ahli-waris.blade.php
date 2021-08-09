@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat Keterangan Ahli Waris</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Keterangan Ahli Waris, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
    @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data:</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="jenis" value="Surat Keterangan Ahli Waris">
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="hubungan">Hubungan Keluarga :</label>
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
                <div class="col-md-6 pl-1">
                    <label for="nama_pewaris">Nama Pewaris:</label>
                    <input type="text" id="nama_pewaris" name="nama_pewaris" class="form-control" placeholder="Nama Lengkap">
                    @error('nama_pewaris') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="kejadian">Kejadian :</label>
                    <div class="">
                        <select name="kejadian" class="custom-select d-block w-100 select" id="kejadian">
                          <option value="Meninggal">Meninggal</option>
                          <option value="Lainnya">Lainnya</option>
                        </select>
                        @error('kejadian')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                 <div class="col-md-6 pl-1">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="contoh: 8 September 1999">
                    @error('tanggal') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="keterangan">Keterangan :</label>
                <textarea class="form-control shadow" name="keterangan" id="keterangan" cols="10" rows="3" placeholder="contoh: isi keterangan atau keperluan"></textarea>
                @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>

          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection