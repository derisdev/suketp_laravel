@extends('layouts.admin.bar')
@section('judul', 'Antrian Pengajuan Surat')
@section('content')

    <div class="row">
        <div class="col-md-12">
            
            <div class="container card">
                <div class="card-header mx-2">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-category mt-2">Daftar Antrian Pengajuan Surat:</h5>
                            {{-- <h5 class="card-category mt-2">Menunggu Persetujuan:</h5> --}}
                            <h4 class="card-title">Antrian Pengajuan</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body mx-2">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class=" text-primary">
                                <th><b>Pengaju</b></th>
                                <th><b>Surat</b></th>
                                <th><b>Tanggal Ajuan</b></th>
                                <th class="text-right"><b>Opsi</b></th>
                            </thead>
                            <tbody>
                            @foreach ($antrian as $surat)
                            <tr>
                                <td>{{ $surat->user->nama }}</td>
                                <td><b>{{ $surat->jenis }}</b></td>
                                <td>{{ $surat->created_at->diffForHumans() }}</td>
                                <td class="text-right">
                                    <a href="{{ route('antrian.edit', $surat->id) }}" class="badge badge-warning">Buka</a>
                                    {{-- <a href="{{ route('antrian.show', $surat->id) }}" class="badge badge-info">Lihat</a> --}}
                                </td>
                            </tr>
                            @endforeach
                            @foreach ($sktb as $sk)
                            <tr>
                                <td>{{ $sk->user->nama }}</td>
                                <td><b>{{ $sk->jenis }}</b></td>
                                <td>{{ $sk->created_at->diffForHumans() }}</td>
                                <td class="text-right">
                                    <a href="{{ route('antrian-sktb.edit', $sk->id) }}" class="badge badge-warning">Buka</a>
                                </td>
                            </tr>
                            @endforeach
                            @foreach ($kelahiran as $kel)
                            <tr>
                                <td>{{ $kel->user->nama }}</td>
                                <td><b>{{ $kel->jenis }}</b></td>
                                <td>{{ $kel->created_at->diffForHumans() }}</td>
                                <td class="text-right">
                                    <a href="{{ route('antrian-kelahiran.edit', $kel->id) }}" class="badge badge-warning">Buka</a>
                                </td>
                            </tr>
                            @endforeach
                            @foreach ($puskesos as $pus)
                            <tr>
                                <td>{{ $pus->user->nama }}</td>
                                <td><b>{{ $pus->jenis }}</b></td>
                                <td>{{ $pus->created_at->diffForHumans() }}</td>
                                <td class="text-right">
                                    <a href="{{ route('antrian-puskesos.edit', $pus->id) }}" class="badge badge-warning">Buka</a>
                                </td>
                            </tr>
                            @endforeach
                            @foreach ($sku as $sk)
                            <tr>
                                <td>{{ $sk->user->nama }}</td>
                                <td><b>{{ $sk->jenis }}</b></td>
                                <td>{{ $sk->created_at->diffForHumans() }}</td>
                                <td class="text-right">
                                    <a href="{{ route('antrian-sku.edit', $sk->id) }}" class="badge badge-warning">Buka</a>
                                </td>
                            </tr>
                            @endforeach
                            @foreach ($sktm as $sk)
                            <tr>
                                <td>{{ $sk->user->nama }}</td>
                                <td><b>{{ $sk->jenis }}</b></td>
                                <td>{{ $sk->created_at->diffForHumans() }}</td>
                                <td class="text-right">
                                    <a href="{{ route('antrian-sktm.edit', $sk->id) }}" class="badge badge-warning">Buka</a>
                                </td>
                            </tr>
                            @endforeach
                            @foreach ($skck as $sk)
                            <tr>
                                <td>{{ $sk->user->nama }}</td>
                                <td><b>{{ $sk->jenis }}</b></td>
                                <td>{{ $sk->created_at->diffForHumans() }}</td>
                                <td class="text-right">
                                    <a href="{{ route('antrian-skck.edit', $sk->id) }}" class="badge badge-warning">Buka</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container">
                    {{$antrian->links()}} 
                </div>
            </div>
        </div>
    </div>
@endsection