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
        <a class="nav-link" href="{{ route('menunggu') }}">Menunggu Persetujuan</a>
        <a class="nav-link active" href="{{ route('diterima') }}">Diterima</a>
        <a class="nav-link" href="{{ route('ditolak') }}">Ditolak</a>
      </nav>
    </div>
    @include('layouts.alert')

    
    @if (count($adaterima) != 0 || count($sktbterima) != 0 || count($skuterima) != 0 || count($sktmterima) != 0 || count($skckterima) != 0 || count($puskesosterima) != 0)
    <main role="main" class="container">
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Surat yang telah di Acc</h6>
          @foreach ($adaterima as $ajuan)
          <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#339900"/><text x="50%" y="50%" fill="#339900" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">{{ $ajuan->jenis }}</strong>
                  <a class="badge badge-success">Disetujui</a>
              </div>
                
                  @if ($ajuan->jenis == "Surat Domisili")
                    <span class="d-block"> diajukan {{ $ajuan->created_at->format('d M Y') }} <b>&middot;</b> <a href="" class="text-success dropdown-toggle" id="downloadDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Download</a> 
                      <div class="dropdown-menu" aria-labelledby="downloadDropdown">
                        <a class="dropdown-item" href="{{ route('download', $ajuan->id) }}">Unduh Surat Domisili</a>
                        <a class="dropdown-item" href="{{ route('domisili.pernyataan', $ajuan->id) }}">Unduh Surat Pernyataan Menetap</a>
                      </div>
                  @elseif($ajuan->jenis == "Surat Keterangan Penganut Kepercayaan Tuhan YME")
                    <span class="d-block"> diajukan {{ $ajuan->created_at->format('d M Y') }} <b>&middot;</b> <a href="{{ route('download', $ajuan->id) }}" class="text-success dropdown-toggle" id="downloadDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Download</a> 
                      <div class="dropdown-menu" aria-labelledby="downloadDropdown">
                        <a class="dropdown-item" href="{{ route('download', $ajuan->id) }}">Unduh Surat Pernyataan</a>
                        <a class="dropdown-item" href="{{ route('penganut.kk', $ajuan->id) }}">Permohonan cetak KK bagi penganut</a>
                        <a class="dropdown-item" href="{{ route('penganut.tanggung', $ajuan->id) }}">Unduh Surat Pernyataan Tanggung Jawab</a>
                      </div>
                  @elseif($ajuan->jenis == "Surat Izin Keramaian")
                    <span class="d-block"> diajukan {{ $ajuan->created_at->format('d M Y') }} <b>&middot;</b> <a href="{{ route('download', $ajuan->id) }}" class="text-success dropdown-toggle" id="downloadDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Download</a> 
                      <div class="dropdown-menu" aria-labelledby="downloadDropdown">
                        <a class="dropdown-item" href="{{ route('download', $ajuan->id) }}">Unduh Surat Izin Keramaian</a>
                        <a class="dropdown-item" href="{{ route('keramaian.pernyataan', $ajuan->id) }}">Unduh Surat Pernyataan</a>
                      </div>
                  @else
                      <span class="d-block"> diajukan {{ $ajuan->created_at->format('d M Y') }} <b>&middot;</b> <a href="{{ route('lihat', $ajuan->id) }}" class="text-primary">Lihat</a> | <a href="{{ route('download', $ajuan->id) }}" class="text-success">Download</a> 
                  @endif

                  
            </div>
          </div>
          @endforeach
          @foreach ($sktbterima as $ajuan)
          <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#339900"/><text x="50%" y="50%" fill="#339900" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">{{ $ajuan->jenis }}</strong>
                  <a class="badge badge-success">Disetujui</a>
              </div>
                <span class="d-block"> diajukan {{ $ajuan->created_at->format('d M Y') }} <b>&middot;</b> <a href="{{ route('skkd.lihat', $ajuan->id) }}" class="text-primary">Lihat</a> | <a href="{{ route('skkd.download', $ajuan->id) }}" class="text-success dropdown-toggle" id="downloadDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Download</a> 
                      <div class="dropdown-menu" aria-labelledby="downloadDropdown">
                        <a class="dropdown-item" href="{{ route('skkd.download', $ajuan->id) }}">Unduh SKKD</a>
                        <a class="dropdown-item" href="{{ route('sktb.download', $ajuan->id) }}">Unduh SKTB</a>
                      </div>
            </div>
          </div>
          @endforeach
          @foreach ($puskesosterima as $ajuan)
          <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#339900"/><text x="50%" y="50%" fill="#339900" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">
                  @if ($ajuan->keterangan == 'Perbaikan Data Pada Kartu Indonesia Sehat')
                      Surat Keterangan PUSKESOS Kartu Indonesia Sehat
                  @elseif ($ajuan->keterangan == 'Permohonan Perbaikan Status Pekerjaan Di Kartu Keluarga dan KTP')
                      Surat Keterangan PUSKESOS: Perbaikan Status
                  @elseif ($ajuan->keterangan == 'Keluarga Miskin Tetapi Tidak terdaftar ke dalam BDT/DTKS di SIKS-NG')
                      Surat Keterangan PUSKESOS Tidak Terdaftar BDT
                  @elseif ($ajuan->keterangan == 'Permohonan SKTM')
                      Surat Keterangan PUSKESOS Pernyataan Miskin
                  @else
                      Surat Keterangan PUSKESOS
                  @endif
                </strong>
                  <a class="badge badge-success">Disetujui</a>
              </div>
                <span class="d-block"> diajukan {{ $ajuan->created_at->format('d M Y') }} <b>&middot;</b> <a href="{{ route('puskesos.lihat', $ajuan->id) }}" class="text-primary">Lihat</a> | <a href="{{ route('puskesos.download', $ajuan->id) }}" class="text-success">Download</a> 
            </div>
          </div>
          @endforeach
          @foreach ($skuterima as $ajuan)
          <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#339900"/><text x="50%" y="50%" fill="#339900" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">{{ $ajuan->jenis }}</strong>
                  <a class="badge badge-success">Disetujui</a>
              </div>
                <span class="d-block"> diajukan {{ $ajuan->created_at->format('d M Y') }} <b>&middot;</b> <a href="{{ route('sku.lihat', $ajuan->id) }}" class="text-primary">Lihat</a> | <a href="{{ route('sku.download', $ajuan->id) }}" class="text-success">Download</a> 
            </div>
          </div>
          @endforeach
          @foreach ($sktmterima as $ajuan)
          <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#339900"/><text x="50%" y="50%" fill="#339900" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">{{ $ajuan->jenis }}</strong>
                  <a class="badge badge-success">Disetujui</a>
              </div>
                <span class="d-block"> diajukan {{ $ajuan->created_at->format('d M Y') }} <b>&middot;</b> <a href="{{ route('sktm.lihat', $ajuan->id) }}" class="text-primary">Lihat</a> | <a href="{{ route('sktm.download', $ajuan->id) }}" class="text-success">Download</a> 
            </div>
          </div>
          @endforeach
          @foreach ($skckterima as $ajuan)
          <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#339900"/><text x="50%" y="50%" fill="#339900" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">{{ $ajuan->jenis }}</strong>
                  <a class="badge badge-success">Disetujui</a>
              </div>
                <span class="d-block"> diajukan {{ $ajuan->created_at->format('d M Y') }} <b>&middot;</b> <a href="{{ route('skck.lihat', $ajuan->id) }}" class="text-primary">Lihat</a> | <a href="" class="text-success dropdown-toggle" id="downloadDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Download</a> 
                  <div class="dropdown-menu" aria-labelledby="downloadDropdown">
                    <a class="dropdown-item" href="{{ route('skck.download', $ajuan->id) }}">Unduh SKCK Biasa</a>
                    <a class="dropdown-item" href="{{ route('skck.semi', $ajuan->id) }}">Unduh SKCK Semi</a>
                    <a class="dropdown-item" href="{{ route('skck.lengkap', $ajuan->id) }}">Unduh SKCK Lengkap</a>
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
    

    @if (count($adaterima) == 0 && count($sktbterima) == 0 && count($skuterima) == 0 && count($sktmterima) == 0 && count($skckterima) == 0 && count($puskesosterima) == 0)
    <main role="main" class="container">
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Surat Diterima</h6>
        <div class="container bg-oren3 py-4">
          <img class="mx-auto d-block" src="{{ asset('images/surat.png') }}" alt="" width="48%">
          <h4 class="toren text-center mb-2"><b>Anda belum memiliki surat yang sudah diterima.<br>mohon menunggu persetujuan pihak desa.</b></h4>
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