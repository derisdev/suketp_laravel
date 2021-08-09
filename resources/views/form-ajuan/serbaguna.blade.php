@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat Keterangan Serbaguna</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Keterangan Serbaguna, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
    @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data Keterangan Serbaguna</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="jenis" value="Surat Keterangan Serbaguna">
            <div class="mb-3">
                <label for="isi">Isi Surat :</label>
                <textarea class="form-control shadow" name="isi" id="isi" cols="10" rows="3" placeholder="Harap isikan keperluan. contoh: untuk pengajuan"></textarea>
                @error('isi') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>
            <input type="hidden" name="keterangan" value="untuk keperluan administrasi">
            {{-- <div class="mb-3">
                <label for="keterangan">Keperluan :</label>
                <textarea class="form-control shadow" name="keterangan" id="keterangan" cols="10" rows="3" placeholder="Harap isikan keperluan. contoh: untuk pengajuan"></textarea>
                @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div> --}}
          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection