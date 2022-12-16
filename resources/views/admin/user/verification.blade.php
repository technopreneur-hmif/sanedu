@extends('layouts.admin.base')

@section('title')
User
@endsection



@section('content')
<div class="email-inbox-header">
    <div class="row">
        <div class="col-md-12">
            <div class="email-title">
                <span class="icon mdi mdi-accounts-alt mr-3"></span> Verifikasi Akun
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default panel-table no-border mb-0">
    <div class="panel-body">
        @if(false)
        <div class="data-is-empty">
            <p><i class="mdi mdi-close-circle"></i></p>
            <p>BELUM ADA MEMBER</p>
        </div>
        @else
        <table id="datatables" class="table datatables table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peserta</th>
                    <th>No Whatsapp</th>
                    <th>Status</th>
                    <th>Siswa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Peserta</th>
                    <th>No Whatsapp</th>
                    <th>Status</th>
                    <th>Siswa</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($unverifiedUsers as $i => $user)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->wa_user }}</td>
                    <td>
                        @if($user->roles_id=='1')
                        {{ $user->hubungan }}
                        @else
                        Siswa
                        @endif
                    </td>
                    <td>
                        {{ $user->child->nama }}
                    </td>
                    <td>
                        <a href="{{ route('admin.user.verification.edit', $user->id) }}" class="btn btn-xs btn-success" title="Delete">
                            ACC
                        </a>
                        <a href="{{ route('verifikasi_delete', $user->id) }}" class="btn btn-xs btn-danger delete" title="Edit">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection

@section('script')
@endsection