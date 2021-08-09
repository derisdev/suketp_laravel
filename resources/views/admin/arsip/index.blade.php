@extends('layouts.admin.bar')
@section('judul', 'Arsip Surat Harian')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="container" style="background-color: #F2F2F2">
                    <nav class="nav nav-underline justify-content-center">
                      {{-- <a class="nav-link text-muted" href="{{ route('arsip.index') }}"><b>Surat Harian</b></a> --}}
                      <a class="nav-link text-muted" href="{{ route('arsip.index') }}"><b>Surat Harian</b></a>
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link text-muted dropdown-toggle {{ request()->is('sku', 'sk', 'sktm', 'skck', 'sd') ? 'text-dark' : '' }}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              Surat Non-Harian
                          </a>
                          @include('layouts.partials.link-arsip')
                      </li>
                    </nav>
                </div>
                <div class="card-header mx-4">
                    <div class="d-flex justify-content-between">
                        <h2 class="card-title">Arsip Surat Harian</h2>
                        <a type="button" class="btn btn-primary" href="{{ route('arsip.laporan') }}">Download Laporan</a>
                    </div>
                    <h5 class="card-category mt-2">Daftar Surat Harian yang telah disetujui:</h5>
                </div>
                <div class="card-body mx-4">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class="text-primary">
                                <th><b>Pengaju</b></th>
                                <th><b>Surat</b></th>
                                <th><b>Nomor Surat</b></th>
                                <th><b>Tanggal Ajuan</b></th>
                                <th><b>Tanggal Acc</b></th>
                                <th class="text-right" width="16%"><b>Opsi</b></th>
                            </thead>
                            <tbody>
                            @foreach ($arsip as $a)
                            @if ($a->jenis == "Surat Domisili")
                                <tr>
                                    <td>{{ $a->user->nama }}</td>
                                    <td>{{ $a->jenis }}</td>
                                    <td>{{ $a->nosurat }}</td>
                                    <td>{{ $a->created_at->format('d M Y') }}</td>
                                    <td>{{ $a->updated_at->format('d M Y') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('adm.lihat', $a->id) }}" class="badge badge-warning dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lihat</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="{{ route('adm.lihat', $a->id) }}">Lihat Surat Domisili</a>
                                          <a class="dropdown-item" href="{{ route('lihat-domisili.pernyataan', $a->id) }}">Lihat Surat Pernyataan Menetap</a>
                                        </div>
                                        <a href="{{ route('adm.download', $a->id) }}" class="badge badge-success">Download</a>
                                    </td>
                                </tr>
                            @elseif($a->jenis == "Surat Keterangan Penganut Kepercayaan Tuhan YME")
                                <tr>
                                    <td>{{ $a->user->nama }}</td>
                                    <td>{{ $a->jenis }}</td>
                                    <td>{{ $a->nosurat }}</td>
                                    <td>{{ $a->created_at->format('d M Y') }}</td>
                                    <td>{{ $a->updated_at->format('d M Y') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('adm.lihat', $a->id) }}" class="badge badge-warning dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lihat</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="{{ route('adm.lihat', $a->id) }}">Lihat Surat Pernyataan</a>
                                          <a class="dropdown-item" href="{{ route('lihat-penganut.kk', $a->id) }}">Lihat Surat Permohonan Cetak KK Bagi Penganut</a>
                                          <a class="dropdown-item" href="{{ route('lihat-penganut.tanggung', $a->id) }}">Lihat Surat Pernyataan Pertanggung Jawaban</a>
                                        </div>
                                        <a href="{{ route('adm.download', $a->id) }}" class="badge badge-success">Download</a>
                                    </td>
                                </tr>
                            @elseif($a->jenis == "Surat Izin Keramaian")
                                <tr>
                                    <td>{{ $a->user->nama }}</td>
                                    <td>{{ $a->jenis }}</td>
                                    <td>{{ $a->nosurat }}</td>
                                    <td>{{ $a->created_at->format('d M Y') }}</td>
                                    <td>{{ $a->updated_at->format('d M Y') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('adm.lihat', $a->id) }}" class="badge badge-warning dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lihat</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="{{ route('adm.lihat', $a->id) }}">Lihat Surat Izin Keramaian</a>
                                          <a class="dropdown-item" href="{{ route('lihat-keramaian.pernyataan', $a->id) }}">Lihat Surat Pernyataan</a>
                                        </div>
                                        <a href="{{ route('adm.download', $a->id) }}" class="badge badge-success">Download</a>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td>{{ $a->user->nama }}</td>
                                    <td>{{ $a->jenis }}</td>
                                    <td>{{ $a->nosurat }}</td>
                                    <td>{{ $a->created_at->format('d M Y') }}</td>
                                    <td>{{ $a->updated_at->format('d M Y') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('adm.lihat', $a->id) }}" class="badge badge-warning">Lihat</a>
                                        <a href="{{ route('adm.download', $a->id) }}" class="badge badge-success">Download</a>
                                        {{-- <a href="{{ route('adm.download', $a->id) }}" class="badge badge-danger">Hapus</a> --}}
                                    </td>
                                </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection