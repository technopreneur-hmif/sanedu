@extends('layouts.cms.app')

<!-- TITLE -->
@section('title', 'Orang Tua')

@section('content')
    <!-- CONTENT -->
        <table class="table table-sm table-striped">
            <thead><tr><td><div style="margin: 100px;"></div></td></tr>
                <tr>
                    <th>
                        <div class="button">
                            <a class="btn btn-primary" href="{{ route('verifikasi') }}" role="button">Verifikasi Akun</a>
                            <a class="btn btn-primary" href="{{ route('siswa') }}" role="button">Siswa</a>
                            <a class="btn btn-dark" href="{{ route('ortu') }}" role="button">Orang Tua</a>
                            <a class="btn btn-primary" href="{{ route('kelas') }}" role="button">Kelas</a>
                        </div>
                    </th><th></th><th></th><th></th><th></th>
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
                                Siswa
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    @foreach($data as $result)
                    <tr>
                        <td>
                            {{ $result->nama }}
                        </td>
                        <td>
                            {{ $result->wa_user }}
                        </td>
                        <td>
                            {{ $result->hubungan }}
                        </td>
                        <td>
                            @foreach($siswa as $s)
                            @if($s->wa_user==$result->wa_siswa)
                                {{ $s->nama }}
                            @endif
                            @endforeach
                        </td>
                        <td>
                            <div class="col-md-13">
                                <a href="ortu/edit/{{ $result->id }}"><button type="button" class="btn btn-warning">Edit</button></a>
                                <a href="ortu/delete/{{ $result->id }}"><button type="button" class="btn btn-danger">Hapus</button></a>
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




