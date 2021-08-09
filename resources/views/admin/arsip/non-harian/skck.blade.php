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
                          <a id="navbarDropdown" class="nav-link text-muted dropdown-toggle {{ request()->is('sku', 'sk', 'sktm', 'skck', 'sd') ? 'text-dark' : '' }}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              <b>Surat Non-Harian</b>
                          </a>
                          @include('layouts.partials.link-arsip')
                      </li>
                    </nav>
                </div>
                <div class="card-header mx-4">
                    <div class="d-flex justify-content-between">
                        <h2 class="card-title">Surat Keterangan Tanah Bangunan</h2>
                        <a type="button" class="btn btn-primary" href="{{ route('skck.laporan') }}">Download Laporan</a>
                    </div>
                    <h5 class="card-category mt-2">Daftar SKCK yang telah disetujui:</h5>
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
                                <th class="text-right" width="15%"><b>Opsi</b></th>
                            </thead>
                            <tbody>
                            @foreach ($skcks as $skck)
                            <tr>
                                <td>{{ $skck->user->nama }}</td>
                                <td>{{ $skck->jenis }}</td>
                                <td>{{ $skck->nosurat }}</td>
                                <td>{{ $skck->created_at->format('d M Y') }}</td>
                                <td>{{ $skck->updated_at->format('d M Y') }}</td>
                                <td class="text-right">
                                    <a href="" class="badge badge-warning dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lihat</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="{{ route('adm-skck.lihat', $skck->id) }}">SKCK Biasa</a>
                                          <a class="dropdown-item" href="{{ route('lihat-skck.semi', $skck->id) }}">SKCK Semi</a>
                                          <a class="dropdown-item" href="{{ route('lihat-skck.lengkap', $skck->id) }}">SKCK Lengkap</a>
                                        </div>
                                    <a href="{{ route('adm-skck.download', $skck->id) }}" class="badge badge-success">Download</a>
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