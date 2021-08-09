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
                        <h2 class="card-title">Surat Keterangan Usaha</h2>
                        <a type="button" class="btn btn-primary" href="{{ route('sku.laporan') }}">Download Laporan</a>
                    </div>
                    <h5 class="card-category mt-2">Daftar SKU yang telah disetujui:</h5>
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
                            @foreach ($skus as $sku)
                            <tr>
                                <td>{{ $sku->user->nama }}</td>
                                <td>{{ $sku->jenis }}</td>
                                <td>{{ $sku->nosurat }}</td>
                                <td>{{ $sku->created_at->format('d M Y') }}</td>
                                <td>{{ $sku->updated_at->format('d M Y') }}</td>
                                <td class="text-right">
                                    <a href="{{ route('adm-sku.lihat', $sku->id) }}" class="badge badge-warning">Lihat</a>
                                    <a href="{{ route('adm-sku.download', $sku->id) }}" class="badge badge-success">Download</a>
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