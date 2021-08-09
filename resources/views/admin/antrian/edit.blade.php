@extends('layouts.admin.bar')
@section('judul', 'Acc Ajuan Surat')
@section('content')
    <div class="row">
          <div class="col-md-5 order-2">
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Ajuan Surat</h5>
              </div>
              <div class="card-body">
                <table class="table">
                    <tbody>
                      <tr>
                        <td><label>Jenis</label></td>
                        <td>{{ $ajuan->jenis }}</td>
                      </tr>
                      <tr>
                        <td><label>Keterangan</label></td>
                        <td>{{ $ajuan->keterangan }}</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
             
              {{-- Data Pengaju --}}
              <div class="card-header">
                <h5 class="title">Pengaju</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Nama</label></td>
                      <td>{{ $ajuan->user->nama }}</td>
                    </tr>
                    <tr>
                      <td><label>NIK</label></td>
                      <td>{{ $ajuan->user->nik }}</td>
                    </tr>
                    <tr>
                      <td><label>Penduduk</label></td>
                      <td>{{ $ajuan->user->rt }}/{{ $ajuan->user->rw }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>

          

          {{-- Bagian Kiri --}}
          <div class="col-md-7 order-1">
            <div class="card px-4">
              <div class="card-body pb-3">
                 <div>
                   <h4 class="title text-center mt-0 mb-3">ACC Surat Ajuan</h4>
                 </div>
                 <hr>
                 <div class="row mb-3">
                  <div class="col-md-3">
                    <label>Pengaju</label> <br>
                    <label>Jenis Surat</label> <br>
                    <label>Keterangan</label>
                  </div>
                  <div class="col-md-9">
                    <a href="#exampleModal" data-toggle="modal" data-target="#exampleModal">{{ $ajuan->user->nama }}</a> <br>
                    <b>{{ $ajuan->jenis }}</b> <br>
                    <form action="{{ route('antrian.update', $ajuan->id) }}" method="post">
                      @method('patch')
                      @csrf
                      <select class="form-control" name="keterangan" id="keterangan">
                        <option value="{{ $ajuan->keterangan }}">dari pengaju : {{ $ajuan->keterangan }}</option>
                        @foreach ($keperluan as $k)
                          <option value="{{ $k->keperluan }}">{{ $k->keperluan }}</option>
                        @endforeach
                        @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                      </select>
                  </div>
                </div>
                <div class="justify-content-center">
                  <button type="submit" class="btn btn-primary offset-md-3">Acc Pengajuan</button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#tolakSuratHarian">Tolak Pengajuan</button>
                </div>
              </form>
              </div>
            </div>
            @if ($ajuan->jenis == 'Surat Domisili')
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Surat Domisili<br>Yang Diajukan</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Tanggal Menetap</label></td>
                      <td>{{ $ajuan->domisili->tanggal }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @endif
            @if ($ajuan->jenis == 'Surat Penghasilan')
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Surat Penghasilan<br>Yang Diajukan</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Besar Penghasilan</label></td>
                      <td>{{ $ajuan->penghasilan->besar }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @endif
            @if ($ajuan->jenis == 'Surat Keterangan Kebakaran')
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Surat Kebakaran<br>Yang Diajukan</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Barang</label></td>
                      <td>{{ $ajuan->kebakaran->barang }}</td>
                    </tr>
                    <tr>
                      <td><label>Tanggal</label></td>
                      <td>{{ $ajuan->kebakaran->tanggal }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @endif
            @if ($ajuan->jenis == 'Surat Kehilangan')
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Surat Kehilangan<br>Yang Diajukan</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Barang</label></td>
                      <td>{{ $ajuan->kehilangan->barang }}</td>
                    </tr>
                    <tr>
                      <td><label>Lokasi</label></td>
                      <td>{{ $ajuan->kehilangan->lokasi }}</td>
                    </tr>
                    <tr>
                      <td><label>Tanggal</label></td>
                      <td>{{ $ajuan->kehilangan->tanggal }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @endif
            @if ($ajuan->jenis == 'Surat KTP Expire')
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Surat KTP Expire<br>Yang Diajukan</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>No Blanko</label></td>
                      <td>{{ $ajuan->ktpExpire->noblanko }}</td>
                    </tr>
                    <tr>
                      <td><label>Masa Berlaku</label></td>
                      <td>{{ $ajuan->ktpExpire->masa }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @endif
            @if ($ajuan->jenis == 'Surat Keterangan Serbaguna')
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Surat Serbaguna<br>Yang Diajukan</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Isi surat dari pengaju</label></td>
                      <td>{{ $ajuan->serbaguna->isi }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @endif
            @if ($ajuan->jenis == 'Surat Keterangan Janda Duda')
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Surat Janda Duda<br>Yang Diajukan</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Janda/Duda</label></td>
                      <td>{{ $ajuan->jandaDuda->janda_duda }}</td>
                    </tr>
                    <tr>
                      <td><label>Pasangan</label></td>
                      <td>{{ $ajuan->jandaDuda->pasangan }}</td>
                    </tr>
                    <tr>
                      <td><label>Kepemilikan</label></td>
                      <td>{{ $ajuan->jandaDuda->kepemilikan }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @endif
            @if ($ajuan->jenis == 'Surat Keterangan Tidak Masuk Kerja')
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Surat Tidak Masuk Kerja<br>Yang Diajukan</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Alasan</label></td>
                      <td>{{ $ajuan->tidakKerja->alasan }}</td>
                    </tr>
                    <tr>
                      <td><label>Tanggal</label></td>
                      <td>{{ $ajuan->tidakKerja->hari }}, {{ $ajuan->tidakKerja->tanggal }}</td>
                    </tr>
                    <tr>
                      <td><label>Perusahaan</label></td>
                      <td>{{ $ajuan->tidakKerja->perusahaan }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @endif
            @if ($ajuan->jenis == 'Surat Keterangan Ahli Waris')
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Surat Ahli Waris<br>Yang Diajukan</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Hubungan</label></td>
                      <td>{{ $ajuan->ahliWaris->hubungan }}</td>
                    </tr>
                    <tr>
                      <td><label>Nama Pewaris</label></td>
                      <td>{{ $ajuan->ahliWaris->nama_pewaris }}</td>
                    </tr>
                    <tr>
                      <td><label>Kejadian</label></td>
                      <td>{{ $ajuan->ahliWaris->kejadian }}</td>
                    </tr>
                    <tr>
                      <td><label>Tanggal Kejadian</label></td>
                      <td>{{ $ajuan->ahliWaris->tanggal }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @endif
            @if ($ajuan->jenis == 'Surat Keterangan Izin Orang Tua')
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Surat Izin Orang Tua<br>Yang Diajukan</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Hubungan</label></td>
                      <td>{{ $ajuan->izinOrtu->hubungan }}</td>
                    </tr>
                    <tr>
                      <td><label>Nama yang diberi izin</label></td>
                      <td>{{ $ajuan->izinOrtu->nama }}</td>
                    </tr>
                    <tr>
                      <td><label>NIK yang diberi izin</label></td>
                      <td>{{ $ajuan->izinOrtu->nik }}</td>
                    </tr>
                    <tr>
                      <td><label>TTL yang diberi izin</label></td>
                      <td>{{ $ajuan->izinOrtu->tempat_lahir }}, {{ $ajuan->izinOrtu->tanggal_lahir }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @endif
            @if ($ajuan->jenis == 'Surat Keterangan Penganut Kepercayaan Tuhan YME')
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Surat Penganut Kepercayaan<br>Yang Diajukan</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Organisasi</label></td>
                      <td>{{ $ajuan->penganut->organisasi }}</td>
                    </tr>
                    <tr>
                      <td><label>Saksi 1</label></td>
                      <td>{{ $ajuan->penganut->saksi_1 }}</td>
                    </tr>
                    <tr>
                      <td><label>Saksi 2</label></td>
                      <td>{{ $ajuan->penganut->saksi_2 }}</td>
                    </tr>
                    <tr>
                      <td><label>Agama Sebelumnya</label></td>
                      <td>{{ $ajuan->penganut->agama_sebelumnya }}</td>
                    </tr>
                    <tr>
                      <td><label>Dasar Perubahan</label></td>
                      <td>{{ $ajuan->penganut->dasar_perubahan }}</td>
                    </tr>
                    <tr>
                      <td><label>Tanggal Perubahan</label></td>
                      <td>{{ $ajuan->penganut->tanggal_perubahan }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @endif
            @if ($ajuan->jenis == 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME')
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Surat Batal Kepercayaan<br>Yang Diajukan</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Organisasi</label></td>
                      <td>{{ $ajuan->batalMenganut->organisasi }}</td>
                    </tr>
                    <tr>
                      <td><label>Agama Baru</label></td>
                      <td>{{ $ajuan->batalMenganut->agama_baru }}</td>
                    </tr>
                    <tr>
                      <td><label>Dasar Perubahan</label></td>
                      <td>{{ $ajuan->batalMenganut->dasar_perubahan }}</td>
                    </tr>
                    <tr>
                      <td><label>Tanggal Perubahan</label></td>
                      <td>{{ $ajuan->batalMenganut->tanggal_perubahan }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @endif
            @if ($ajuan->jenis == 'Surat Izin Keramaian')
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Surat Izin Keramaian<br>Yang Diajukan</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Tanggal</label></td>
                      <td>{{ $ajuan->izinKeramaian->hari }}, {{ $ajuan->izinKeramaian->tanggal }}</td>
                    </tr>
                     <tr>
                      <td><label>Tempat/Lokasi</label></td>
                      <td>{{ $ajuan->izinKeramaian->tempat }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @endif
            @if ($ajuan->jenis == 'Surat Keterangan Beda Nama')
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Suket Beda Nama<br>Yang Diajukan</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Perbedaan Data</label></td>
                      <td>{{ $ajuan->bedaNama->perbedaan }}</td>
                    </tr>
                    <tr>
                      <td><label>Dokumen yang salah</label></td>
                      <td>{{ $ajuan->bedaNama->dokumen_salah }}</td>
                    </tr>
                    <tr>
                      <td><label>Tertulis salah</label></td>
                      <td>{{ $ajuan->bedaNama->tertulis_salah }}</td>
                    </tr>
                    <tr>
                      <td><label>Dokumen yang benar</label></td>
                      <td>{{ $ajuan->bedaNama->dokumen_benar }}</td>
                    </tr>
                    <tr>
                      <td><label>Tertulis benar</label></td>
                      <td>{{ $ajuan->bedaNama->tertulis_benar }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @endif
          </div>
          

        </div>



<!-- Modal Tolak Pengajuan Surat Harian -->
<div class="modal fade" id="tolakSuratHarian" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tolak Pengajuan Surat Harian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('antrian.tolak', $ajuan->id) }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="pesan_penolakan">Pesan Penolakan : </label>
              <select class="form-control mt-2" id="pesan_penolakan" name="pesan_penolakan">
                @foreach ($pesan_penolakan as $pesan)
                <option value="{{ $pesan->isi }}">{{ $pesan->isi }}</option>
                @endforeach
              </select>
            </div>
            <div class="d-flex text-right">
                <button type="submit" class="btn btn-danger mr-1">Tolak Pengajuan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>



<!-- Modal Identitas Pengaju-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Identitas Pengaju</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
         <div class="col-md-2 text-secondary">
           <span>Nama</span> <br>
           <span>NIK</span> <br>
           <span>Ttl</span> <br>
           <span>Agama</span> <br>
           <span>JK</span> <br>
           <span>Status</span> <br>
           <span>Pekerjaan</span> <br>
           <span>Rt/Rw</span> <br> 
           <span>Alamat</span> <br>
         </div>
         <div class="col-md-1">
           <span>:</span> <br>
           <span>:</span> <br>
           <span>:</span> <br>
           <span>:</span> <br>
           <span>:</span> <br>
           <span>:</span> <br>
           <span>:</span> <br>
           <span>:</span> <br>
           <span>:</span> <br>
         </div>
         <div class="col-md-9 pl-1">
           <a href="{{ route('user.show', $ajuan->user->id) }}">{{ $ajuan->user->nama }}</a> <br>
           <b>{{ $ajuan->user->nik }}</b> <br>
           <span>{{ $ajuan->user->ttl }}</span> <br>
           <span>{{ $ajuan->user->agama }}</span> <br>
           <span>{{ $ajuan->user->jk }}</span> <br>
           <span>{{ $ajuan->user->status }}</span> <br>
           <span>{{ $ajuan->user->pekerjaan }}</span> <br>
           <span>{{ $ajuan->user->rt }}/{{ $ajuan->user->rw }}</span> <br>
           <span>{{ $ajuan->user->alamat }}</span> <br>
         </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="{{ route('user.show', $ajuan->user->id) }}" class="btn btn-primary">Lihat lebih banyak</a>
        {{-- <button type="button" class="btn btn-primary">Lihat lebih banyak</button> --}}
      </div>
    </div>
  </div>
</div>
@endsection