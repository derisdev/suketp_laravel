@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat KTP Expire</h2>
        <p class="birusubjudul">Untuk pengajuan Surat KTP Expire, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
    @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data KTP Expire</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="jenis" value="Surat KTP Expire">
            <div class="mb-3 row">
                <div class="col-md-7 pr-1">
                    <label for="noblanko">No Blanko KTP :</label>
                    <input type="text" id="noblanko" name="noblanko" class="form-control" placeholder="isikan Nomor Blanko KTP">
                    @error('noblanko') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-5 pl-1">
                    <label for="masa">Masa Berlaku KTP :</label>
                    <input type="date" id="masa" name="masa" class="form-control" placeholder="isikan masa berlaku KTP">
                    @error('masa') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <label for="keterangan">Keperluan :</label>
                <textarea class="form-control shadow" name="keterangan" id="keterangan" cols="10" rows="3" placeholder="Harap isikan keperluan. contoh: untuk mengajukan E-KTP"></textarea>
                @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>

          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection