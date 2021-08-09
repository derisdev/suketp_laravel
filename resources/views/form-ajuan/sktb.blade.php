@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan SKKD / Surat Keterangan Tanah Bangunan</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Keterangan Tanah Bangunan, Harap isikan data dibawah ini sesuai dengan data yang sebenarnya.</p>
      </div>

    <div class="row">
    @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data Surat Keterangan Tanah Bangunan</h4>
        <form action="{{ route('sktb.store') }}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="jenis" value="Surat Keterangan Tanah Bangunan">
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="pemilik">Pemilik :</label>
                    <input type="text" id="pemilik" name="pemilik" class="form-control" placeholder="Nama lengkap pemilik">
                    @error('pemilik') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="memiliki">Memiliki :</label>
                    <select name="memiliki" class="form-control" id="memiliki" required>
                   	    <option disabled selected>Pilih Kepemilikan</option>
                        <option value="Tanah">Tanah</option>
                        <option value="Bangunan">Bangunan</option>
                        <option value="Tanah dan Bangunan">Tanah dan Bangunan</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="akta">Akta :</label>
                    <input type="text" id="akta" name="akta" class="form-control" placeholder="contoh: Jual Beli">
                    @error('akta') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="no_akta">Nomor Akta :</label>
                    <input type="text" id="no_akta" name="no_akta" class="form-control" placeholder="contoh: 545/2019">
                    @error('no_akta') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-4 pr-1">
                    <label for="no_personil">No. Persil :</label>
                    <input type="text" id="no_personil" name="no_personil" class="form-control" placeholder="contoh: 10.S.III">
                    @error('no_personil') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-4 pr-1 pl-1">
                    <label for="no_kohir">No. Kohir :</label>
                    <input type="text" id="no_kohir" name="no_kohir" class="form-control" placeholder="contoh: 172">
                    @error('no_kohir') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-4 pl-1">
                    <label for="blok">Blok :</label>
                    <input type="text" id="blok" name="blok" class="form-control" placeholder="contoh: Kiara Lawang">
                    @error('blok') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <br>
            <h5 class="mb-3"><i>Luas dan Harga Tanah</i></h5>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="luas_persegi">Luas Tanah (M<sup>2</sup>) :</label>
                    <input type="text" id="luas_persegi" name="luas_persegi" class="form-control" placeholder="contoh: 1500">
                    @error('luas_persegi') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="luas">Luas (panjang x lebar) :</label>
                    <input type="text" id="luas" name="luas" class="form-control" placeholder="contoh: 30 x 50 m">
                    @error('luas') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="harga">Harga Tanah Per M<sup>2</sup> (Nominal) :</label>
                    <input type="text" id="harga" name="harga" class="form-control" placeholder="contoh: 150.000">
                    @error('harga') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="harga_terbilang">Harga (Terbilang) :</label>
                    <input type="text" id="harga_terbilang" name="harga_terbilang" class="form-control" placeholder="contoh: Seratus Lima Ribu Rupiah">
                    @error('harga_terbilang') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="total_harga_tanah">Total Harga Tanah (Luas Tanah M<sup>2</sup> x Harga Tanah Per M<sup>2</sup>):</label>
                <input type="text" id="total_harga_tanah" name="total_harga_tanah" class="form-control" placeholder="(hasil kali luas dan harga) cont: 225.000.000">
                @error('total_harga_tanah') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>
            <h5 class="mb-3"><i>Bangunan</i></h5>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="nominal_bangunan">Harga Bangunan (Nominal) :</label>
                    <input type="text" id="nominal_bangunan" name="nominal_bangunan" class="form-control" placeholder="kosongkan jika tidak ada bangunan.">
                    @error('nominal_bangunan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="terbilang_bangunan">Harga Bangunan (Terbilang) :</label>
                    <input type="text" id="terbilang_bangunan" name="terbilang_bangunan" class="form-control" placeholder="kosongkan jika tidak ada bangunan.">
                    @error('terbilang_bangunan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <h5 class="mb-3"><i>Harga Tanah dan Bangunan</i></h5>
            <div class="mb-3">
                <label for="total_harga">Hasil Total Harga Tanah + Harga Bangunan:</label>
                <input type="text" id="total_harga" name="total_harga" class="form-control" placeholder="(Isikan total harga tanah saja jika bangunan tidak ada) cont: 325.000.000">
                @error('total_harga') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>
            <br>
            <h5 class="mb-3"><i>Batas-batas tanah/bangunan kepemilikan:</i></h5>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="utara">Batas Utara :</label>
                    <input type="text" id="utara" name="utara" class="form-control" placeholder="contoh: Jembatan sukamadu">
                    @error('utara') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="barat">Batas Barat :</label>
                    <input type="text" id="barat" name="barat" class="form-control" placeholder="contoh: Tanah Milik Suparman">
                    @error('barat') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="selatan">Batas Selatan :</label>
                    <input type="text" id="selatan" name="selatan" class="form-control" placeholder="contoh: Tanah Milik Ujang">
                    @error('selatan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="timur">Batas Timur :</label>
                    <input type="text" id="timur" name="timur" class="form-control" placeholder="contoh: Jalan Desa">
                    @error('timur') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 pr-1">
                    <label for="lokasi">Lokasi :</label>
                    <textarea class="form-control" name="lokasi" id="lokasi" cols="10" rows="3" placeholder="Lokasi tanah atau bangunan"></textarea>
                    @error('lokasi') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pl-1">
                    <label for="keterangan">Keterangan :</label>
                    <textarea class="form-control" name="keterangan" id="keterangan" cols="10" rows="3" placeholder="Contoh: (kalau tidak ada isi - . jangan dikosongkan)Tanah tersebut diatas pada SPPT PBB masih tertulis a.n WAWAN dengan NOP : 24.09.652.020.010-0015.0"></textarea>
                    @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>

          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection