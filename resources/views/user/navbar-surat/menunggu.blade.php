<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/surat-saya.css') }}">
    <link href="{{asset('images/favicon.png')}}" rel="icon" type="image/png">

    <title>Suket Desa Sindangsuka</title>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg costum-nav navbar-dark bg-oren px-4 py-3 shadow">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logo.png') }}" alt="logo kabupaten garut">
        <span>Suket Online</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
              @include('layouts.partials.link')
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('surat-saya') ? 'text-dark' : '' }}" href="{{ route('suratsaya') }}">Surat Saya</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('lengkapi-profil') ? 'text-dark' : '' }}" href="{{ route('lengkapi.profil') }}">Lengkapi Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('edit-profil') ? 'text-dark' : '' }}" href="{{ route('edit.profil') }}">Edit Profil</a>
          </li>
          @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="tombol-3 nav-link dropdown-toggle shadow" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->nama }}
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          Keluar
                      </a>
                      <a class="dropdown-item" href="{{ route('edit.profil') }}">
                          Pengaturan Akun
                      </a>
                      @role('admin|superadmin')
                      <a class="dropdown-item" href="{{ route('antrian.index') }}">
                          Dashboard Admin
                      </a>
                      @endrole
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
        </ul>
      </div>
    </nav>
    
    <div class="nav-scroller bg-oren3 shadow-sm">
      <nav class="nav nav-underline">
        <a class="nav-link" href="{{ route('suratsaya') }}">Semua</a>
        <a class="nav-link active" href="{{ route('menunggu') }}">Menunggu Persetujuan</a>
        <a class="nav-link" href="{{ route('diterima') }}">Diterima</a>
        <a class="nav-link" href="{{ route('ditolak') }}">Ditolak</a>
      </nav>
    </div>
    @include('layouts.alert')


    @if (count($adabelum) != 0 || count($skubelum) != 0 || count($sktbbelum) != 0 || count($sktmbelum) != 0 || count($skckbelum) != 0 || count($puskesosbelum) != 0)
    <main role="main" class="container">
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Menunggu Persetujuan</h6>

          @foreach ($adabelum as $ajuan)
          <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#ffcc00"/><text x="50%" y="50%" fill="#ffcc00" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">{{ $ajuan->jenis }}</strong>
                  <a class="badge badge-warning">Belum Disetujui</a>
              </div>
              <span class="d-block"> diajukan {{ $ajuan->created_at->format('d M Y') }} <b>&middot;</b> <a href="" data-toggle="modal" data-target="#batalkanAjuan{{$ajuan->id}}" class="text-danger">Batalkan</a> | <a href="" class="text-warning">Hubungi</a> | <a href="" data-toggle="modal" data-target="#detailAjuan{{$ajuan->id}}" class="text-info">Lihat Detail</a> </span> 
            </div>
          </div>
          <!-- Modal Batalkan Pengajuan -->
              <div class="modal fade" id="batalkanAjuan{{$ajuan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Batalkan Pengajuan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Anda yakin ingin membatalkan pengajuan <b>{{ $ajuan->jenis }}</b> Anda yang diajukan pada tanggal <i>{{ $ajuan->created_at->format('d M Y') }}</i> ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      <form action="{{ route('ajuan.batalkan', $ajuan->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Ya</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal Lihat Pengajuan -->
              <div class="modal fade" id="detailAjuan{{$ajuan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail Pengajuan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h5 class="card-title text-center">Pengajuan {{ $ajuan->jenis }}</h5>
                      <table border="0" align="center" width=100% style="padding-left: 30px;" class="mb-3">
                          <tr>
                              <td class="text-secondary" width=30%>Pengaju</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->nama }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">NIK</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->nik }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Ttl</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->ttl }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Agama</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->agama }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Jenis Kelamin</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->jk }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Status</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->status }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Pekerjaan</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->pekerjaan }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Rt/Rw</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->rt }}/{{ $ajuan->user->rw }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Alamat</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->alamat }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Pesan Keterangan</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->keterangan }}</td>
                          </tr>
                      </table>
                      <small class="text-secondary text-center"><i>*jika terdapat kesalahan data, segera batalkan pengajuan dan edit Profil anda dengan data yang benar, lalu ajukan kembali surat!</i></small>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                  </div>
                </div>
              </div>
          @endforeach

          @foreach ($puskesosbelum as $puskesos)
          <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#ffcc00"/><text x="50%" y="50%" fill="#ffcc00" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">
                  @if ($puskesos->keterangan == 'Perbaikan Data Pada Kartu Indonesia Sehat')
                      Surat Keterangan PUSKESOS Kartu Indonesia Sehat
                  @elseif ($puskesos->keterangan == 'Permohonan Perbaikan Status Pekerjaan Di Kartu Keluarga dan KTP')
                      Surat Keterangan PUSKESOS: Perbaikan Status
                  @elseif ($puskesos->keterangan == 'Keluarga Miskin Tetapi Tidak terdaftar ke dalam BDT/DTKS di SIKS-NG')
                      Surat Keterangan PUSKESOS Tidak Terdaftar BDT
                  @elseif ($puskesos->keterangan == 'Permohonan SKTM')
                      Surat Keterangan PUSKESOS Pernyataan Miskin
                  @else
                      Surat Keterangan PUSKESOS
                  @endif
                </strong>
                  <a class="badge badge-warning">Belum Disetujui</a>
              </div>
              <span class="d-block"> diajukan {{ $puskesos->created_at->format('d M Y') }} <b>&middot;</b> <a href="" data-toggle="modal" data-target="#batalkanPuskesos{{$puskesos->id}}" class="text-danger">Batalkan</a> | <a href="" class="text-warning">Hubungi</a> | <a href="" data-toggle="modal" data-target="#detailPuskesos{{$puskesos->id}}" class="text-info">Lihat Detail</a> </span> 
            </div>
          </div>
          <!-- Modal Batalkan Pengajuan -->
              <div class="modal fade" id="batalkanPuskesos{{$puskesos->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Batalkan Pengajuan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Anda yakin ingin membatalkan pengajuan <b>{{ $puskesos->jenis }}</b> Anda yang diajukan pada tanggal <i>{{ $puskesos->created_at->format('d M Y') }}</i> ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      <form action="{{ route('puskesos.batalkan', $puskesos->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Ya</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal Lihat Pengajuan -->
              <div class="modal fade" id="detailPuskesos{{$puskesos->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail Pengajuan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h5 class="card-title text-center">Pengajuan {{ $puskesos->jenis }}</h5>
                      <table border="0" align="center" width=100% style="padding-left: 30px;" class="mb-3">
                          <tr>
                              <td class="text-secondary" width=30%>Pengaju</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $puskesos->user->nama }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">NIK</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $puskesos->user->nik }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Ttl</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $puskesos->user->ttl }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Agama</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $puskesos->user->agama }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Jenis Kelamin</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $puskesos->user->jk }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Status</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $puskesos->user->status }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Pekerjaan</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $puskesos->user->pekerjaan }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Rt/Rw</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $puskesos->user->rt }}/{{ $puskesos->user->rw }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Alamat</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $puskesos->user->alamat }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Pesan Keterangan</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $puskesos->keterangan }}</td>
                          </tr>
                      </table>
                      <small class="text-secondary text-center"><i>*jika terdapat kesalahan data, segera batalkan pengajuan dan edit Profil anda dengan data yang benar, lalu ajukan kembali surat!</i></small>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                  </div>
                </div>
              </div>
          @endforeach

          @foreach ($skubelum as $sku)
          <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#ffcc00"/><text x="50%" y="50%" fill="#ffcc00" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">{{ $sku->jenis }}</strong>
                  <a class="badge badge-warning">Belum Disetujui</a>
              </div>
              <span class="d-block"> diajukan {{ $sku->created_at->format('d M Y') }} <b>&middot;</b> <a href="" data-toggle="modal" data-target="#batalkanSku{{$sku->id}}" class="text-danger">Batalkan</a> | <a href="" class="text-warning">Hubungi</a> | <a href="" data-toggle="modal" data-target="#detailSku{{$sku->id}}" class="text-info">Lihat Detail</a> </span> 
            </div>
          </div>
          <!-- Modal Batalkan Pengajuan -->
              <div class="modal fade" id="batalkanSku{{$sku->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Batalkan Pengajuan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Anda yakin ingin membatalkan pengajuan <b>{{ $sku->jenis }}</b> Anda yang diajukan pada tanggal <i>{{ $sku->created_at->format('d M Y') }}</i> ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      <form action="{{ route('sku.batalkan', $sku->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Ya</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal Lihat Pengajuan -->
              <div class="modal fade" id="detailSku{{$sku->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail Pengajuan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h5 class="card-title text-center">Pengajuan {{ $sku->jenis }}</h5>
                      <table border="0" align="center" width=100% style="padding-left: 30px;" class="mb-3">
                          <tr>
                              <td class="text-secondary" width=30%>Pengaju</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sku->user->nama }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">NIK</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sku->user->nik }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Ttl</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sku->user->ttl }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Agama</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sku->user->agama }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Jenis Kelamin</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sku->user->jk }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Status</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sku->user->status }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Pekerjaan</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sku->user->pekerjaan }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Rt/Rw</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sku->user->rt }}/{{ $sku->user->rw }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Alamat</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sku->user->alamat }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Pesan Keterangan</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sku->keterangan }}</td>
                          </tr>
                      </table>
                      <small class="text-secondary text-center"><i>*jika terdapat kesalahan data, segera batalkan pengajuan dan edit Profil anda dengan data yang benar, lalu ajukan kembali surat!</i></small>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                  </div>
                </div>
              </div>
          @endforeach

          @foreach ($sktbbelum as $sktb)
          <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#ffcc00"/><text x="50%" y="50%" fill="#ffcc00" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">{{ $sktb->jenis }}</strong>
                  <a class="badge badge-warning">Belum Disetujui</a>
              </div>
              <span class="d-block"> diajukan {{ $sktb->created_at->format('d M Y') }} <b>&middot;</b> <a href="" data-toggle="modal" data-target="#batalkanSktb{{$sktb->id}}" class="text-danger">Batalkan</a> | <a href="" class="text-warning">Hubungi</a> | <a href="" data-toggle="modal" data-target="#detailSktb{{$sktb->id}}" class="text-info">Lihat Detail</a> </span> 
            </div>
          </div>
          <!-- Modal Batalkan Pengajuan -->
              <div class="modal fade" id="batalkanSktb{{$sktb->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Batalkan Pengajuan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Anda yakin ingin membatalkan Pengajuan <b>{{ $sktb->jenis }}</b> Anda yang diajukan pada tanggal <i>{{ $sktb->created_at->format('d M Y') }}</i> ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      <form action="{{ route('sktb.batalkan', $sktb->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Ya</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal Lihat Pengajuan -->
              <div class="modal fade" id="detailSktb{{$sktb->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail Pengajuan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h5 class="card-title text-center">Pengajuan {{ $sktb->jenis }}</h5>
                      <table border="0" align="center" width=100% style="padding-left: 30px;" class="mb-3">
                          <tr>
                              <td class="text-secondary" width=30%>Pengaju</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktb->user->nama }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">NIK</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktb->user->nik }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Ttl</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktb->user->ttl }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Agama</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktb->user->agama }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Jenis Kelamin</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktb->user->jk }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Status</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktb->user->status }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Pekerjaan</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktb->user->pekerjaan }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Rt/Rw</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktb->user->rt }}/{{ $sktb->user->rw }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Alamat</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktb->user->alamat }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Pesan Keterangan</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktb->keterangan }}</td>
                          </tr>
                      </table>
                      <small class="text-secondary text-center"><i>*jika terdapat kesalahan data, segera batalkan pengajuan dan edit Profil anda dengan data yang benar, lalu ajukan kembali surat!</i></small>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                  </div>
                </div>
              </div>
          @endforeach

          @foreach ($sktmbelum as $sktm)
          <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#ffcc00"/><text x="50%" y="50%" fill="#ffcc00" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">{{ $sktm->jenis }}</strong>
                  <a class="badge badge-warning">Belum Disetujui</a>
              </div>
              <span class="d-block"> diajukan {{ $sktm->created_at->format('d M Y') }} <b>&middot;</b> <a href="" data-toggle="modal" data-target="#batalkanSktm{{$sktm->id}}" class="text-danger">Batalkan</a> | <a href="" class="text-warning">Hubungi</a> | <a href="" data-toggle="modal" data-target="#detailSktm{{$sktm->id}}" class="text-info">Lihat Detail</a> </span> 
            </div>
          </div>
          <!-- Modal Batalkan Pengajuan -->
              <div class="modal fade" id="batalkanSktm{{$sktm->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Batalkan Pengajuan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Anda yakin ingin membatalkan pengajuan <b>{{ $sktm->jenis }}</b> Anda yang diajukan pada tanggal <i>{{ $sktm->created_at->format('d M Y') }}</i> ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      <form action="{{ route('sktb.batalkan', $sktm->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Ya</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal Lihat Pengajuan -->
              <div class="modal fade" id="detailSktm{{$sktm->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail Pengajuan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h5 class="card-title text-center">Pengajuan {{ $sktm->jenis }}</h5>
                      <table border="0" align="center" width=100% style="padding-left: 30px;" class="mb-3">
                          <tr>
                              <td class="text-secondary" width=30%>Pengaju</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktm->user->nama }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">NIK</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktm->user->nik }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Ttl</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktm->user->ttl }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Agama</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktm->user->agama }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Jenis Kelamin</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktm->user->jk }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Status</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktm->user->status }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Pekerjaan</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktm->user->pekerjaan }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Rt/Rw</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktm->user->rt }}/{{ $sktm->user->rw }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Alamat</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktm->user->alamat }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Pesan Keterangan</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $sktm->keterangan }}</td>
                          </tr>
                      </table>
                      <small class="text-secondary text-center"><i>*jika terdapat kesalahan data, segera batalkan pengajuan dan edit Profil anda dengan data yang benar, lalu ajukan kembali surat!</i></small>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                  </div>
                </div>
              </div>
          @endforeach

          @foreach ($skckbelum as $skck)
          <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#ffcc00"/><text x="50%" y="50%" fill="#ffcc00" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">{{ $skck->jenis }}</strong>
                  <a class="badge badge-warning">Belum Disetujui</a>
              </div>
              <span class="d-block"> diajukan {{ $skck->created_at->format('d M Y') }} <b>&middot;</b> <a href="" data-toggle="modal" data-target="#batalkanSkck{{$skck->id}}" class="text-danger">Batalkan</a> | <a href="" class="text-warning">Hubungi</a> | <a href="" data-toggle="modal" data-target="#detailSkck{{$skck->id}}" class="text-info">Lihat Detail</a> </span> 
            </div>
          </div>
          <!-- Modal Batalkan Pengajuan -->
              <div class="modal fade" id="batalkanSkck{{$skck->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Batalkan Pengajuan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Anda yakin ingin membatalkan Pengajuan <b>{{ $skck->jenis }}</b> Anda yang diajukan pada tanggal <i>{{ $skck->created_at->format('d M Y') }}</i> ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      <form action="{{ route('skck.batalkan', $skck->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Ya</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal Lihat Pengajuan -->
              <div class="modal fade" id="detailSkck{{$skck->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail Pengajuan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h5 class="card-title text-center">Pengajuan {{ $skck->jenis }}</h5>
                      <table border="0" align="center" width=100% style="padding-left: 30px;" class="mb-3">
                          <tr>
                              <td class="text-secondary" width=30%>Pengaju</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $skck->user->nama }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">NIK</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $skck->user->nik }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Ttl</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $skck->user->ttl }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Agama</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $skck->user->agama }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Jenis Kelamin</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $skck->user->jk }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Status</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $skck->user->status }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Pekerjaan</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $skck->user->pekerjaan }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Rt/Rw</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $skck->user->rt }}/{{ $skck->user->rw }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Alamat</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $skck->user->alamat }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Pesan Keterangan</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $skck->keterangan }}</td>
                          </tr>
                      </table>
                      <small class="text-secondary text-center"><i>*jika terdapat kesalahan data, segera batalkan pengajuan dan edit Profil anda dengan data yang benar, lalu ajukan kembali surat!</i></small>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                  </div>
                </div>
              </div>
          @endforeach

        <small class="d-block text-right mt-3">
          <a href="#">All updates</a>
        </small>
      </div>
    </main>
    @endif

    @if (count($adabelum) == 0 && count($sktbbelum) == 0 && count($skubelum) == 0 && count($sktmbelum) == 0 && count($skckbelum) == 0 && count($puskesosbelum) == 0)
    <main role="main" class="container">
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Menunggu Persetujuan</h6>
        <div class="container bg-oren3 py-4">
          <img class="mx-auto d-block" src="{{ asset('images/surat.png') }}" alt="" width="48%">
          <h4 class="toren text-center mb-2"><b>Anda belum mengajukan surat apapun.<br></b></h4>
          <button data-toggle="modal" data-target="#ajukanModal" class="btn tombol-kotak-biru mx-auto d-block mt-3">Ajukan Surat &raquo;</button>
        </div>
        <small class="d-block text-right mt-3">
          <a href="#">All updates</a>
        </small>
      </div>
    </main>
    @endif

    


    <footer class="my-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2020 - PKM UIN-Desa Sindang Suka</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>


<!-- Modal -->
<div class="modal fade" id="ajukanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajukan Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="text-center">Pilih Surat yang Anda Butuhkan</h5>
        <div class="row d-flex justify-content-center">
          <a href="{{ route('skck.create') }}" class="btn tombol-kotak mx-1 my-1">SKCK</a>
          <a href="{{ route('sktm.create') }}" class="btn tombol-kotak mx-1 my-1">SKTM</a>
          <a href="{{ route('sd.create') }}" class="btn tombol-kotak mx-1 my-1">Surat Domisili</a>
          <a href="{{ route('sku.create') }}" class="btn tombol-kotak mx-1 my-1">Surat Keterangan Usaha</a>
          <a href="{{ route('sk.create') }}" class="btn tombol-kotak mx-1 my-1">Surat Kematian</a>
        </div>
        <hr>
      </div>
    </div>
  </div>
</div>