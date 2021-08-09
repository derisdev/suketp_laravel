@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat Kehilangan</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Kehilangan, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
    @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data Kehilangan</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="jenis" value="Surat Kehilangan">
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="barang">Barang :</label>
                    <input type="text" id="barang" name="barang" class="form-control" placeholder="isikan barang yang hilang">
                    @error('barang') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="barang">Tanggal Hilang :</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="isikan tanggal kehilangan">
                    @error('tanggal') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="barang">Lokasi Hilang :</label>
                <textarea class="form-control shadow" name="lokasi" id="lokasi" cols="10" rows="2" placeholder="Lokasi dugaan barang hilang"></textarea>
                @error('lokasi') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>
            <div class="mb-3">
                <label for="keterangan">Keperluan :</label>
                <textarea class="form-control shadow" name="keterangan" id="keterangan" cols="10" rows="3" placeholder="Harap isikan keperluan. contoh: untuk lapor ke polsek"></textarea>
                @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>

          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection