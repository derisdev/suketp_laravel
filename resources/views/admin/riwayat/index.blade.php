@extends('layouts.admin.bar')
@section('judul', 'Daftar Antrian Persetujuan Surat')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="container card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-category mt-2">Daftar surat antrian yang pernah di acc atau di tolak:</h5>
                            <h4 class="card-title">Riwayat Surat</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class=" text-primary">
                                <th><b>Pengaju</b></th>
                                <th><b>Surat</b></th>
                                <th><b>Diajukan</b></th>
                                <th><b>Ditolak/Diterima</b></th>
                                <th><b>Status</b></th>
                                <th class="text-right"><b>Opsi</b></th>
                            </thead>
                            <tbody>
                            @foreach ($riwayat as $surat)
                            <tr>
                                <td>{{ $surat->user->nama }}</td>
                                <td>{{ $surat->jenis }}</td>
                                <td>{{ $surat->created_at->format('d M Y') }}</td>
                                <td>{{ $surat->updated_at->format('d M Y') }}</td>
                                <td>
                                    @if ($surat->acc == 1)
                                        <span class="text-success"><b>Diterima</b></span>
                                    @elseif ($surat->acc == 2)
                                        <span class="text-danger"><b>Ditolak</b></span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    @if ($surat->acc == 1)
                                        <a href="{{ route('adm.lihat', $surat->id) }}" class="badge badge-warning">Lihat Surat</a>
                                    @elseif ($surat->acc == 2)
                                        {{-- <a href="" class="badge badge-warning">Lihat Surat</a> --}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                            @foreach ($sktbs as $sktb)
                            <tr>
                                <td>{{ $sktb->user->nama }}</td>
                                <td>{{ $sktb->jenis }}</td>
                                <td>{{ $sktb->created_at->format('d M Y') }}</td>
                                <td>{{ $sktb->updated_at->format('d M Y') }}</td>
                                <td>
                                    @if ($sktb->acc == 1)
                                        <span class="text-success"><b>Diterima</b></span>
                                    @elseif ($sktb->acc == 2)
                                        <span class="text-danger"><b>Ditolak</b></span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    @if ($sktb->acc == 1)
                                        <a href="{{ route('adm.lihat', $sktb->id) }}" class="badge badge-warning">Lihat Surat</a>
                                    @elseif ($sktb->acc == 2)
                                        {{-- <a href="" class="badge badge-warning">Lihat Surat</a> --}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                            @foreach ($sktms as $sktm)
                            <tr>
                                <td>{{ $sktm->user->nama }}</td>
                                <td>{{ $sktm->jenis }}</td>
                                <td>{{ $sktm->created_at->format('d M Y') }}</td>
                                <td>{{ $sktm->updated_at->format('d M Y') }}</td>
                                <td>
                                    @if ($sktm->acc == 1)
                                        <span class="text-success"><b>Diterima</b></span>
                                    @elseif ($sktm->acc == 2)
                                        <span class="text-danger"><b>Ditolak</b></span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    @if ($sktm->acc == 1)
                                        <a href="{{ route('adm.lihat', $sktm->id) }}" class="badge badge-warning">Lihat Surat</a>
                                    @elseif ($sktm->acc == 2)
                                        {{-- <a href="" class="badge badge-warning">Lihat Surat</a> --}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                            @foreach ($skcks as $skck)
                            <tr>
                                <td>{{ $skck->user->nama }}</td>
                                <td>{{ $skck->jenis }}</td>
                                <td>{{ $skck->created_at->format('d M Y') }}</td>
                                <td>{{ $skck->updated_at->format('d M Y') }}</td>
                                <td>
                                    @if ($skck->acc == 1)
                                        <span class="text-success"><b>Diterima</b></span>
                                    @elseif ($skck->acc == 2)
                                        <span class="text-danger"><b>Ditolak</b></span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    @if ($skck->acc == 1)
                                        <a href="{{ route('adm.lihat', $skck->id) }}" class="badge badge-warning">Lihat Surat</a>
                                    @elseif ($skck->acc == 2)
                                        {{-- <a href="" class="badge badge-warning">Lihat Surat</a> --}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                            @foreach ($skus as $sku)
                            <tr>
                                <td>{{ $sku->user->nama }}</td>
                                <td>{{ $sku->jenis }}</td>
                                <td>{{ $sku->created_at->format('d M Y') }}</td>
                                <td>{{ $sku->updated_at->format('d M Y') }}</td>
                                <td>
                                    @if ($sku->acc == 1)
                                        <span class="text-success"><b>Diterima</b></span>
                                    @elseif ($sku->acc == 2)
                                        <span class="text-danger"><b>Ditolak</b></span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    @if ($sku->acc == 1)
                                        <a href="{{ route('adm.lihat', $sku->id) }}" class="badge badge-warning">Lihat Surat</a>
                                    @elseif ($sku->acc == 2)
                                        {{-- <a href="" class="badge badge-warning">Lihat Surat</a> --}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="container">
                    {{$riwayat->links()}} 
                </div> --}}
            </div>
        </div>
    </div>
@endsection