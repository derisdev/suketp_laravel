<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle {{ request()->is('sku', 'sk', 'sktm', 'skck', 'sd') ? 'text-dark' : '' }}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Ajukan Surat
    </a>
    <div class="dropdown-menu dropdown-menu-right text-left" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="" data-toggle="modal" data-target="#skkdModal">
            SKKD
        </a>
        <a class="dropdown-item" href="{{ route('sktm.create') }}">
            SKTM
        </a>
        <a class="dropdown-item" href="{{ route('skck.create') }}">
            SKCK
        </a>
        <a class="dropdown-item" href="{{ route('puskesos.create') }}">
            PUSKESOS
        </a>
        <a class="dropdown-item" href="{{ route('kelahiran.create') }}">
            Surat Kelahiran
        </a>
        {{-- <a class="dropdown-item" href="{{ route('sktb.create') }}">
            Surat Keterangan Tanah Bangunan
        </a> --}}
        <a class="dropdown-item" href="{{ route('sku.create') }}">
            Surat Keterangan Usaha
        </a>
        <a class="dropdown-item" href="{{ route('penghasilan.create') }}">
            Surat Keterangan Penghasilan
        </a>
        <a class="dropdown-item" href="{{ route('kebakaran.create') }}">
            Surat Keterangan Kebakaran
        </a>
        <a class="dropdown-item" href="{{ route('kehilangan.create') }}">
            Surat Keterangan Kehilangan
        </a>
        <a class="dropdown-item" href="{{ route('ktpExpire.create') }}">
            Surat Keterangan KTP Expired
        </a>
        <a class="dropdown-item" href="{{ route('diluar-kota.create') }}">
            Surat Keterangan Diluar Kota
        </a>
        <a class="dropdown-item" href="{{ route('serbaguna.create') }}">
            Surat Keterangan Serbaguna
        </a>
        <a class="dropdown-item" href="{{ route('belum-menikah.create') }}">
            Surat Keterangan Belum Menikah
        </a>
        <a class="dropdown-item" href="{{ route('janda-duda.create') }}">
            Surat Keterangan Janda Duda
        </a>
        <a class="dropdown-item" href="{{ route('izin-ortu.create') }}">
            Surat Izin Orang Tua
        </a>
        <a class="dropdown-item" href="{{ route('tidak-kerja.create') }}">
            Surat Keterangan Tidak Masuk Kerja
        </a>
        <a class="dropdown-item" href="{{ route('ahli-waris.create') }}">
            Surat Keterangan Ahli Waris
        </a>
         <a class="dropdown-item" href="{{ route('penganut.create') }}">
            Surat Keterangan Penganut Kepercayaan
        </a>
        <a class="dropdown-item" href="{{ route('batal-menganut.create') }}">
            Surat Keterangan Batal Menganut Kepercayaan
        </a>
        <a class="dropdown-item" href="{{ route('beda-nama.create') }}">
            Surat Keterangan Beda Nama
        </a>
        <a class="dropdown-item" href="{{ route('izin-keramaian.create') }}">
            Surat Izin Keramaian
        </a>
        <a class="dropdown-item" href="{{ route('sd.create') }}">
            Surat Domisili
        </a>
        <a class="dropdown-item" href="{{ route('kuasa.create') }}">
            Surat Kuasa
        </a>
    </div>
</li>

<div class="modal fade" id="skkdModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Jenis SKKD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <a type="button" class="btn tombol-kotak" href="{{ route('sktb.create') }}">SKKD 1</a>
        <a type="button" class="btn tombol-kotak" href="{{ route('sktb2.create') }}">SKKD 2</a>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>