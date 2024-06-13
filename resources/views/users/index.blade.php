
@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary">
        Daftar Pengguna
    </div>
    <div class="card-body">
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3 float-right">Tambah Pengguna</a>
        <table class="w-100">
            <thead>
                <tr>
                    <th class="cell identifier">ID</th>
                    <th class="cell identifier">Nama</th>
                    <th class="cell identifier">username</th>
                    <!-- <th class="cell identifier">RT</th> -->
                    <!-- <th class="cell identifier">Email</th> -->
                    <th class="cell identifier">Role</th>
                    <th class="cell identifier">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="cell">{{ $user->id }}</td>
                    <td class="cell">{{ $user->nama }}</td>
                    <td class="cell">{{ $user->username }}</td>
                    <!-- <td class="cell">{{ $user->RT }}</td> -->
                    <td class="cell">{{ $user->role }}</td>
                    <td class="cell">
                        <a href="{{ route('users.detail', $user->id) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i>
                            Detail
                        </a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                            Ubah
                        </a>

                        <form method="post" action="{{ route('users.destroy', $user->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                <i class="bi bi-trash"></i>
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
