@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat Keterangan Kebakaran</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Keterangan Kebakaran, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
    @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data Kebakaran</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="jenis" value="Surat Keterangan Kebakaran">
            <div class="mb-3 row">
                <div class="col-md-8 pr-1">
                    <label for="barang">Barang/Dokumen :</label>
                    <input type="text" id="barang" name="barang" class="form-control" placeholder="Nama dokumen atau barang yang terkena kebakaran">
                    @error('barang') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-4 pl-1">
                    <label for="barang">Tanggal Kebakaran :</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="isikan tanggal kejadian kebakaran">
                    @error('tanggal') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="keterangan">Keperluan :</label>
                <textarea class="form-control shadow" name="keterangan" id="keterangan" cols="10" rows="3" placeholder="Harap isikan keperluan. contoh: untuk keperluan administrasi"></textarea>
                @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>

          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection