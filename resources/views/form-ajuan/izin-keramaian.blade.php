@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat Izin Keramaian</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Izin Keramaian, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
    @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data:</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="jenis" value="Surat Izin Keramaian">
            <div class="mb-3">
                <label for="keterangan">Maksud/Keperluan :</label>
                <textarea class="form-control" name="keterangan" id="keterangan" cols="10" rows="2" placeholder="contoh: Acara kegiatan berbagi takjil, dengan dijaga protokol yang ketat"></textarea>
                @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="hari">Hari:</label>
                    <input type="text" id="hari" name="hari" class="form-control" placeholder="Hari">
                    @error('hari') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal">
                    @error('tanggal') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="tempat">Tempat :</label>
                <textarea class="form-control" name="tempat" id="tempat" cols="10" rows="2" placeholder="contoh: Gedung Serbaguna Jalan Cibatu, No. 11"></textarea>
                @error('tempat') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>

          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection