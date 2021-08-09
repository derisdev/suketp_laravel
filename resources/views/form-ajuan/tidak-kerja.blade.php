@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat Keterangan Tidak Masuk Kerja</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Keterangan Tidak Masuk Kerja, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
    @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Memberi Kuasa Kepada :</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="jenis" value="Surat Keterangan Tidak Masuk Kerja">
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="alasan">Alasan Tidak Masuk Kerja :</label>
                    <input type="text" id="alasan" name="alasan" class="form-control" placeholder="Alasan tidak masuk kerja">
                    @error('alasan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="tanggal">Tanggal :</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal tidak masuk kerja">
                    @error('tanggal') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-4 pr-1">
                    <label for="hari">Hari :</label>
                    <input type="text" id="hari" name="hari" class="form-control" placeholder="Hari">
                    @error('hari') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-8 pl-1">
                    <label for="perusahaan">Nama Perusahaan :</label>
                    <input type="text" id="perusahaan" name="perusahaan" class="form-control" placeholder="Nama perusahaan">
                    @error('perusahaan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <input type="hidden" name="keterangan" value="Laporan tidak masuk kerja">

            {{-- <div class="mb-3">
                <label for="keterangan">Keperluan :</label>
                <textarea class="form-control shadow" name="keterangan" id="keterangan" cols="10" rows="3" placeholder="contoh: kuasa hak asuh"></textarea>
                @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div> --}}

          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection