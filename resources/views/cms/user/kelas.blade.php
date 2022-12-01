@extends('layouts.cms.app')

<!-- TITLE -->
@section('title', 'Kelas')

@section('content')
    <!-- CONTENT -->
        <table class="table table-striped">
            <thead><tr><td><div style="margin: 100px;"></div></td></tr>
                <tr>
                    <th>
                        <div class="button">
                            <a class="btn btn-primary" href="{{ route('verifikasi') }}" role="button">Verifikasi Akun</a>
                            <a class="btn btn-primary" href="{{ route('siswa') }}" role="button">Siswa</a>
                            <a class="btn btn-primary" href="{{ route('ortu') }}" role="button">Orang Tua</a>
                            <a class="btn btn-dark" href="{{ route('kelas') }}" role="button">Kelas</a>
                        </div>
                    </th><th></th>
                    <th>
                        <a href="kelas/tambahkelas"><button type="button" class="btn btn-warning">Tambah Kelas</button></a>
                    </th>
                </tr>
                <tr>
                    <th>
                        Nama
                    </th>
                    <th>
                        Jumlah
                    </th>
                    <th>
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $kelas)
            <tr>
                <td>
                    {{ $kelas->nama_kelas }}
                </td>
                <td>
                    {{ $kelas->jumlah }}
                </td>
                <td>
                    <div class="col-md-13">
                        <a href="kelas/edit/{{ $kelas->id }}"><button type="button" class="btn btn-warning">Edit</button></a>
                        <a href="kelas/delete/{{ $kelas->id }}"><button type="button" class="btn btn-danger">Hapus</button></a>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div>
        @if (session('sukses'))
            <div class="alert alert-success">
                {{ session('sukses') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        </div>
@endsection

