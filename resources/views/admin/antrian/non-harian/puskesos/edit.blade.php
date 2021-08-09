@extends('layouts.admin.bar')
@section('judul', 'Acc Ajuan Surat')
@section('content')
    <div class="row">
          <div class="col-md-5 order-2">
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Ajuan SKCK</h5>
              </div>
              <div class="card-body">
                <table class="table">
                    <tbody>
                      <tr>
                        <td><label>Jenis Surat</label></td>
                        <td>{{ $puskesos->jenis }}</td>
                      </tr>
                      <tr>
                        <td><label>Keperluan</label></td>
                        <td>{{ $puskesos->keterangan }}</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <div class="card-header">
                <h5 class="title">Pengaju</h5>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><label>Nama</label></td>
                      <td>{{ $puskesos->user->nama }}</td>
                    </tr>
                    <tr>
                      <td><label>Penduduk</label></td>
                      <td>Rt/Rw : {{ $puskesos->user->rt }}/{{ $puskesos->user->rw }}</td>
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
                    <a href="#exampleModal" data-toggle="modal" data-target="#exampleModal">{{ $puskesos->user->nama }}</a> <br>
                    <b>{{ $puskesos->jenis }}</b> <br>
                    <form action="{{ route('antrian-puskesos.update', $puskesos->id) }}" method="post">
                      @method('patch')
                      @csrf
                      <select class="form-control" name="keterangan" id="keterangan">
                        <option value="{{ $puskesos->keterangan }}">dari pengaju : {{ $puskesos->keterangan }}</option>
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
        <form action="{{ route('puskesos.tolak', $puskesos->id) }}" method="post">
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
           <a href="{{ route('user.show', $puskesos->user->id) }}">{{ $puskesos->user->nama }}</a> <br>
           <b>{{ $puskesos->user->nik }}</b> <br>
           <span>{{ $puskesos->user->ttl }}</span> <br>
           <span>{{ $puskesos->user->agama }}</span> <br>
           <span>{{ $puskesos->user->jk }}</span> <br>
           <span>{{ $puskesos->user->status }}</span> <br>
           <span>{{ $puskesos->user->pekerjaan }}</span> <br>
           <span>{{ $puskesos->user->rt }}/{{ $puskesos->user->rw }}</span> <br>
           <span>{{ $puskesos->user->alamat }}</span> <br>
         </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="{{ route('user.show', $puskesos->user->id) }}" class="btn btn-primary">Lihat lebih banyak</a>
        {{-- <button type="button" class="btn btn-primary">Lihat lebih banyak</button> --}}
      </div>
    </div>
  </div>
</div>
@endsection