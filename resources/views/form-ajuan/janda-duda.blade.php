@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat Keterangan Janda Duda</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Keterangan Janda Duda, Harap isikan data dibawah ini sesuai dengan data yang sebenarnya.</p>
      </div>

    <div class="row">
    @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data Surat Keterangan Janda Duda</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="jenis" value="Surat Keterangan Janda Duda">
            @if (auth()->user()->jk == 'Perempuan')
              <input type="hidden" name="janda_duda" value="Janda">
              <input type="hidden" name="pasangan" value="suaminya">
            @else 
              <input type="hidden" name="janda_duda" value="Duda">
              <input type="hidden" name="pasangan" value="istrinya">
            @endif
            <div class="mb-3">
              <label for="kepemilikan">Pilih Kepemilikan :</label>
              <select name="kepemilikan" class="form-control" id="kepemilikan" required>
                  <option disabled selected>Pilih Kepemilikan</option>
                  <option value="Meninggal">Meninggal</option>
                  <option value="Cerai">Cerai</option>
              </select>
              @error('kepemilikan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>
            <div class="mb-3">
                <label for="keterangan">Keperluan :</label>
                <textarea class="form-control shadow" name="keterangan" id="keterangan" cols="10" rows="3" placeholder="Harap isikan keperluan."></textarea>
                @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>

          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection