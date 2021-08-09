@extends('layouts.admin.bar')
@section('judul', 'Arsip Surat Non Harian')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="container" style="background-color: #F2F2F2">
                    <nav class="nav nav-underline justify-content-center">
                      {{-- <a class="nav-link text-muted" href="{{ route('arsip.index') }}"><b>Surat Harian</b></a> --}}
                      <a class="nav-link text-muted" href="{{ route('arsip.index') }}">Surat Harian</a>
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link text-muted dropdown-toggle {{ request()->is('sku', 'sk', 'sktm', 'puskesos', 'sd') ? 'text-dark' : '' }}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              <b>Surat Non-Harian</b>
                          </a>
                          @include('layouts.partials.link-arsip')
                      </li>
                    </nav>
                </div>
                <div class="card-header mx-4">
                    <div class="d-flex justify-content-between">
                        <h2 class="card-title">Surat Keterangan Tanah Bangunan</h2>
                        <a type="button" class="btn btn-primary" href="{{ route('puskesos.laporan') }}">Download Laporan</a>
                    </div>
                    <h5 class="card-category mt-2">Daftar Surat Keterangan PUSKESOS yang telah disetujui:</h5>
                </div>
                <div class="card-body mx-4">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class="text-primary">
                                <th><b>Pengaju</b></th>
                                <th><b>Jenis</b></th>
                                <th><b>Keterangan</b></th>
                                <th><b>Nomor Surat</b></th>
                                <th><b>Tanggal Ajuan</b></th>
                                <th><b>Tanggal Acc</b></th>
                                <th class="text-right" width="15%"><b>Opsi</b></th>
                            </thead>
                            <tbody>
                            @foreach ($puskesoss as $puskesos)
                            <tr>
                                <td>{{ $puskesos->user->nama }}</td>
                                <td>
                                    @if ($puskesos->keterangan == 'Perbaikan Data Pada Kartu Indonesia Sehat')
                                        Perbaikan KIS
                                    @elseif($puskesos->keterangan == 'Permohonan Perbaikan Status Pekerjaan Di Kartu Keluarga dan KTP')
                                        Perbaikan Status Kerja
                                    @elseif($puskesos->keterangan == 'Keluarga Miskin Tetapi Tidak terdaftar ke dalam BDT/DTKS di SIKS-NG')
                                        Tidak Terdaftar di BDT/DTKS
                                    @else
                                        Puskesos Biasa
                                    @endif
                                </td>
                                <td>{{ $puskesos->keterangan }}</td>
                                <td>{{ $puskesos->nosurat }}</td>
                                <td>{{ $puskesos->created_at->format('d M Y') }}</td>
                                <td>{{ $puskesos->updated_at->format('d M Y') }}</td>
                                <td class="text-right">
                                    {{-- <a href="" class="badge badge-warning dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lihat</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="{{ route('adm-puskesos.lihat', $puskesos->id) }}">PUSKESOS Biasa</a>
                                          <a class="dropdown-item" href="{{ route('lihat-puskesos.semi', $puskesos->id) }}">PUSKESOS Semi</a>
                                          <a class="dropdown-item" href="{{ route('lihat-puskesos.lengkap', $puskesos->id) }}">puskesos Lengkap</a>
                                        </div> --}}
                                    <a href="{{ route('adm-puskesos.lihat', $puskesos->id) }}" class="badge badge-warning">Lihat</a>
                                    <a href="{{ route('adm-puskesos.download', $puskesos->id) }}" class="badge badge-success">Download</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection