@extends('layouts.admin.bar')
@section('judul', 'Acc Ajuan Surat')
@section('content')
    <div class="row">
          <div class="col-md-5 order-2">
            <div class="card px-3">
              <div class="card-header">
                <h5 class="title">Data Anak</h5>
              </div>
              <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                          <td><label>Nama Anak</label></td>
                          <td>{{ $kelahiran->nama_anak }}</td>
                        </tr>
                        <tr>
                          <td><label>Jenis Kelamin</label></td>
                          <td>{{ $kelahiran->jk_anak }}</td>
                        </tr>
                        <tr>
                          <td><label>Anak Ke-</label></td>
                          <td>{{ $kelahiran->anak_ke }}</td>
                        </tr>
                    </tbody>
                  </table>
              </div>
              <div class="card-header">
                <h5 class="title">Data Ibu</h5>
              </div>
              <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                          <td><label>Nama Ibu</label></td>
                          <td>{{ $kelahiran->nama_ibu }}</td>
                        </tr>
                        <tr>
                          <td><label>Umur Ibu</label></td>
                          <td>{{ $kelahiran->umur_ibu }}</td>
                        </tr>
                        <tr>
                          <td><label>Agama Ibu</label></td>
                          <td>{{ $kelahiran->agama_ibu }}</td>
                        </tr>
                        <tr>
                          <td><label>Pekerjaan Ibu</label></td>
                          <td>{{ $kelahiran->pekerjaan_ibu }}</td>
                        </tr>
                        <tr>
                          <td><label>Alamat Ibu</label></td>
                          <td>{{ $kelahiran->alamat_ibu }}</td>
                        </tr>
                    </tbody>
                  </table>
              </div>
              <div class="card-header">
                <h5 class="title">Data Ayah</h5>
              </div>
              <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                          <td><label>Nama Ayah</label></td>
                          <td>{{ $kelahiran->nama_ayah }}</td>
                        </tr>
                        <tr>
                          <td><label>Umur Ayah</label></td>
                          <td>{{ $kelahiran->umur_ayah }}</td>
                        </tr>
                        <tr>
                          <td><label>Agama Ayah</label></td>
                          <td>{{ $kelahiran->agama_ayah }}</td>
                        </tr>
                        <tr>
                          <td><label>Pekerjaan Ayah</label></td>
                          <td>{{ $kelahiran->pekerjaan_ayah }}</td>
                        </tr>
                        <tr>
                          <td><label>Alamat Ayah</label></td>
                          <td>{{ $kelahiran->alamat_ayah }}</td>
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
                    <a href="#exampleModal" data-toggle="modal" data-target="#exampleModal">{{ $kelahiran->user->nama }}</a> <br>
                    <b>{{ $kelahiran->jenis }}</b> <br>
                    <form action="{{ route('antrian-kelahiran.update', $kelahiran->id) }}" method="post">
                      @method('patch')
                      @csrf
                      <select class="form-control" name="keterangan" id="keterangan">
                        <option value="{{ $kelahiran->keterangan }}">dari pengaju : {{ $kelahiran->keterangan }}</option>
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
                <h5 class="title">Data Kelahiran Anak</h5>
              </div>
              <div class="card-body">
                <table class="table">
                    <tbody>
                      <tr>
                        <td><label>Hari</label></td>
                        <td>{{ $kelahiran->hari }}</td>
                      </tr>
                      <tr>
                        <td><label>Tanggal</label></td>
                        <td>{{ $kelahiran->tanggal }}</td>
                      </tr>
                      <tr>
                        <td><label>Pukul</label></td>
                        <td>{{ $kelahiran->pukul }}</td>
                      </tr>
                      <tr>
                        <td><label>Tempat</label></td>
                        <td>{{ $kelahiran->tempat }}</td>
                      </tr>
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
        <form action="{{ route('kelahiran.tolak', $kelahiran->id) }}" method="post">
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
           <a href="{{ route('user.show', $kelahiran->user->id) }}">{{ $kelahiran->user->nama }}</a> <br>
           <b>{{ $kelahiran->user->nik }}</b> <br>
           <span>{{ $kelahiran->user->ttl }}</span> <br>
           <span>{{ $kelahiran->user->agama }}</span> <br>
           <span>{{ $kelahiran->user->jk }}</span> <br>
           <span>{{ $kelahiran->user->status }}</span> <br>
           <span>{{ $kelahiran->user->pekerjaan }}</span> <br>
           <span>{{ $kelahiran->user->rt }}/{{ $kelahiran->user->rw }}</span> <br>
           <span>{{ $kelahiran->user->alamat }}</span> <br>
         </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="{{ route('user.show', $kelahiran->user->id) }}" class="btn btn-primary">Lihat lebih banyak</a>
        {{-- <button type="button" class="btn btn-primary">Lihat lebih banyak</button> --}}
      </div>
    </div>
  </div>
</div>
@endsection