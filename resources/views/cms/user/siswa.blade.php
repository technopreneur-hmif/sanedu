@extends('layouts.cms.app')

<!-- TITLE -->
@section('title', 'Verifikasi')

@section('content')
    <!-- CONTENT -->

        <table class="table table-sm table-striped">
            <thead><tr><td><div style="margin: 100px;"></div></td></tr>
                <tr>
                    <th>
                        <div class="button">
                            <a class="btn btn-primary" href="{{ route('verifikasi') }}" role="button">Verifikasi Akun</a>
                            <a class="btn btn-dark" href="{{ route('siswa') }}" role="button">Siswa</a>
                            <a class="btn btn-primary" href="{{ route('ortu') }}" role="button">Orang Tua</a>
                            <a class="btn btn-primary" href="{{ route('kelas') }}" role="button">Kelas</a>
                        </div>
                    </th><th></th><th></th><th></th>
                    <th>
                        <form action="#" align="right">
                            <select name="classroom" id="lang">
                            <option value="kelas">Kelas</option>
                            <option value="saintek1">Saintek 1</option>
                            <option value="xiipa1">Xi IPA 1</option>
                            <option value="saintek2">Saintek 2</option>
                            <option value="saintek3">Saintek 3</option>
                            </select>
                        </form>
                    </th>
                </tr>
                <tr>
                    <th>
                        Nama
                    </th>
                    <th>
                        No WA
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Kelas
                    </th>
                    <th>
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $siswa)
            <tr>
                <td>
                    {{ $siswa->nama }}
                </td>
                <td>
                    {{ $siswa->wa_user }}
                </td>
                <td>
                    Siswa
                </td>
                <td>
                    @foreach($kelas as $k)
                    @if($k->id==$siswa->kelas)
                        {{ $k->nama_kelas }}
                    @endif
                    @endforeach
                </td>
                <td>
                    <div class="col-md-13">
                        <a href="siswa/edit/{{ $siswa->id }}"><button type="button" class="btn btn-warning">Edit</button></a>
                        <a href="siswa/delete/{{ $siswa->id }}"><button type="button" class="btn btn-danger">Hapus</button></a>
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
