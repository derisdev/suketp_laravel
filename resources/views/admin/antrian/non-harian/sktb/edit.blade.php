@extends('layouts.admin.bar')
@section('judul', 'Acc Ajuan Surat')
@section('content')
    <div class="row">
          <div class="col-md-5 order-2">
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Ajuan Surat Keterangan Tanah dan Bangunan</h5>
              </div>
              <div class="card-body">
                <table class="table">
                    <tbody>
                      <tr>
                        <td><label>Pemilik</label></td>
                        <td>{{ $sktb->pemilik }}</td>
                      </tr>
                      <tr>
                        <td><label>Memiliki</label></td>
                        <td>{{ $sktb->memiliki }}</td>
                      </tr>
                      <tr>
                        <td><label>Lokasi</label></td>
                        <td>{{ $sktb->lokasi }}</td>
                      </tr>
                      <tr>
                        <td><label>Luas</label></td>
                        <td>{{ $sktb->luas }}</td>
                      </tr>
                      <tr>
                        <td><label>Harga</label></td>
                        <td>{{ $sktb->harga }}</td>
                      </tr>
                      <tr>
                        <td><label>Keterangan</label></td>
                        <td>{{ $sktb->keterangan }}</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              {{-- <div class="card-header">
                <h5 class="title">Pengaju</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Nama</label></td>
                      <td>{{ $sktb->user->nama }}</td>
                    </tr>
                    <tr>
                      <td><label>Penduduk</label></td>
                      <td>Rt/Rw {{ $sktb->user->rt_rw }}</td>
                    </tr>
                    @if ($sktb->jenis == 'Surat Kematian')
                    <tr>
                      <td><label>Hubungan dengan yang meninggal</label></td>
                      <td>{{ $sktb->sk->hubungan }}</td>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div> --}}
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
                    <a href="#exampleModal" data-toggle="modal" data-target="#exampleModal">{{ $sktb->user->nama }}</a> <br>
                    <b>{{ $sktb->jenis }}</b> <br>
                    <form action="{{ route('antrian-sktb.update', $sktb->id) }}" method="post">
                      @method('patch')
                      @csrf
                      <select class="form-control" name="keterangan" id="keterangan">
                        <option value="{{ $sktb->keterangan }}">dari pengaju : {{ $sktb->keterangan }}</option>
                        @foreach ($keperluan as $k)
                          <option value="{{ $k->keperluan }}">{{ $k->keperluan }}</option>
                        @endforeach
                        @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                      </select>
                  </div>
                </div>
                <div class="justify-content-center">
                  <button type="submit" class="btn btn-primary offset-md-3">Acc Pengajuan</button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Tolak Pengajuan</button>
                </div>
              </form>
              
              </div>
            </div>
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Ajuan SKKD</h5>
              </div>
              <div class="card-body">
                <table class="table">
                    <tbody>
                      @if ($sktb->jenis === 'Surat Keterangan Tanah Bangunan')
                        <tr>
                          <td><label>Jenis Surat yg di Aju</label></td>
                          <td>{{ $sktb->jenis }}</td>
                        </tr>
                        <tr>
                          <td><label>Akta</label></td>
                          <td>{{ $sktb->akta }}</td>
                        </tr>
                        <tr>
                          <td><label>No Akta</label></td>
                          <td>{{ $sktb->no_akta }}</td>
                        </tr>
                        <tr>
                          <td><label>No Persil</label></td>
                          <td>{{ $sktb->no_personil }}</td>
                        </tr>
                        <tr>
                          <td><label>No Kohir</label></td>
                          <td>{{ $sktb->no_kohir }}</td>
                        </tr>
                        <tr>
                          <td><label>Blok</label></td>
                          <td>{{ $sktb->blok }}</td>
                        </tr>
                        <tr>
                          <td><label>Luas</label></td>
                          <td>{{ $sktb->luas_persegi }} Meter Persegi</td>
                        </tr>
                        <tr>
                          <td><label>Harga Tanah Per M<sup>2</sup></label></td>
                          <td>Rp. {{ $sktb->harga }}</td>
                        </tr>
                        <tr>
                          <td><label>Total Harga Tanah</label></td>
                          <td>Rp. {{ $sktb->total_harga_tanah }}</td>
                        </tr>
                        <tr>
                          <td><label>Harga Bangunan</label></td>
                          <td>Rp. {{ $sktb->nominal_bangunan }}</td>
                        </tr>
                        <tr>
                          <td><label>Total Harga Tanah + Bangunan</label></td>
                          <td>Rp. {{ $sktb->total_harga }}</td>
                        </tr>
                        <tr>
                          <td><label>Batas Utara</label></td>
                          <td>{{ $sktb->utara }}</td>
                        </tr>
                        <tr>
                          <td><label>Batas Barat</label></td>
                          <td>{{ $sktb->barat }}</td>
                        </tr>
                        <tr>
                          <td><label>Batas Selatan</label></td>
                          <td>{{ $sktb->selatan }}</td>
                        </tr>
                        <tr>
                          <td><label>Batas Timur</label></td>
                          <td>{{ $sktb->timur }}</td>
                        </tr>
                        
                      @else
                        <tr>
                          <td><label>Jenis Surat yg di Aju</label></td>
                          <td>{{ $sktb->jenis }}</td>
                        </tr>
                        <tr>
                          <td><label>Keperluan</label></td>
                          <td>{{ $sktb->no_kohir }}</td>
                        </tr>
                        <tr>
                          <td><label>No SHM</label></td>
                          <td>{{ $sktb->no_shm }}</td>
                        </tr>
                        <tr>
                          <td><label>No NIB</label></td>
                          <td>{{ $sktb->no_nib }}</td>
                        </tr>
                        <tr>
                          <td><label>No Surat Ukur</label></td>
                          <td>{{ $sktb->no_surat_ukur }}</td>
                        </tr>
                        <tr>
                          <td><label>Blok</label></td>
                          <td>{{ $sktb->blok }}</td>
                        </tr>
                        <tr>
                          <td><label>Batas Utara</label></td>
                          <td>{{ $sktb->utara }}</td>
                        </tr>
                        <tr>
                          <td><label>Batas Barat</label></td>
                          <td>{{ $sktb->barat }}</td>
                        </tr>
                        <tr>
                          <td><label>Batas Selatan</label></td>
                          <td>{{ $sktb->selatan }}</td>
                        </tr>
                        <tr>
                          <td><label>Batas Timur</label></td>
                          <td>{{ $sktb->timur }}</td>
                        </tr>
                        <tr>
                          <td><label>Luas</label></td>
                          <td>{{ $sktb->luas_persegi }} Meter Persegi</td>
                        </tr>
                        <tr>
                          <td><label>Harga Tanah Per M<sup>2</sup></label></td>
                          <td>Rp. {{ $sktb->harga }}</td>
                        </tr>
                        <tr>
                          <td><label>Total Harga Tanah</label></td>
                          <td>Rp. {{ $sktb->total_harga_tanah }}</td>
                        </tr>
                        <tr>
                          <td><label>Harga Bangunan</label></td>
                          <td>Rp. {{ $sktb->nominal_bangunan }}</td>
                        </tr>
                        <tr>
                          <td><label>Total Harga Tanah + Bangunan</label></td>
                          <td>Rp. {{ $sktb->total_harga }}</td>
                        </tr>
                      @endif
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>



<!-- Modal Tolak Pengajuan -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tolak Pengajuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('sktb.tolak', $sktb->id) }}" method="post">
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
           <a href="{{ route('user.show', $sktb->user->id) }}">{{ $sktb->user->nama }}</a> <br>
           <b>{{ $sktb->user->nik }}</b> <br>
           <span>{{ $sktb->user->ttl }}</span> <br>
           <span>{{ $sktb->user->agama }}</span> <br>
           <span>{{ $sktb->user->jk }}</span> <br>
           <span>{{ $sktb->user->status }}</span> <br>
           <span>{{ $sktb->user->pekerjaan }}</span> <br>
           <span>{{ $sktb->user->rt }}/{{ $sktb->user->rw }}</span> <br>
           <span>{{ $sktb->user->alamat }}</span> <br>
         </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="{{ route('user.show', $sktb->user->id) }}" class="btn btn-primary">Lihat lebih banyak</a>
        {{-- <button type="button" class="btn btn-primary">Lihat lebih banyak</button> --}}
      </div>
    </div>
  </div>
</div>
@endsection