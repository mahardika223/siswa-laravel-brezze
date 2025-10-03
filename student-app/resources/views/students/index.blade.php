@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-4">
    <h1 class="text-xl font-semibold">Data Siswa</h1>
    <form method="get" class="flex gap-2">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama/NIS/kelas/alamat" class="border rounded px-2 py-1" />
        <button class="bg-blue-600 text-white px-3 py-1 rounded">Cari</button>
    </form>
</div>

<div class="overflow-x-auto bg-white rounded shadow-sm">
<table class="min-w-full">
    <thead>
        <tr class="bg-gray-100 text-left">
            <th class="p-2">No</th>
            <th class="p-2">NIS/NISN</th>
            <th class="p-2">Nama</th>
            <th class="p-2">JK</th>
            <th class="p-2">Kelas</th>
            <th class="p-2">Alamat</th>
            <th class="p-2">Foto</th>
            @auth
            @if (auth()->user()->is_admin)
            <th class="p-2">Aksi</th>
            @endif
            @endauth
        </tr>
    </thead>
    <tbody>
        @forelse ($students as $student)
        <tr class="border-t">
            <td class="p-2">{{ $student->no_urut }}</td>
            <td class="p-2">{{ $student->nis }}</td>
            <td class="p-2"><a href="{{ route('students.show', $student) }}" class="underline">{{ $student->nama }}</a></td>
            <td class="p-2">{{ $student->jenis_kelamin }}</td>
            <td class="p-2">{{ $student->kelas }}</td>
            <td class="p-2">{{ $student->alamat }}</td>
            <td class="p-2">
                @if ($student->foto_path)
                    <img src="{{ asset('storage/'.$student->foto_path) }}" alt="{{ $student->nama }}" class="h-12 w-12 object-cover rounded" />
                @else
                    -
                @endif
            </td>
            @auth
            @if (auth()->user()->is_admin)
            <td class="p-2">
                <a href="{{ route('students.edit', $student) }}" class="text-blue-600">Edit</a>
                <form action="{{ route('students.destroy', $student) }}" method="post" class="inline" onsubmit="return confirm('Hapus data?')">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 ml-2">Hapus</button>
                </form>
            </td>
            @endif
            @endauth
        </tr>
        @empty
        <tr><td colspan="8" class="p-4 text-center text-gray-500">Belum ada data.</td></tr>
        @endforelse
    </tbody>
</table>
</div>

<div class="mt-4">{{ $students->links() }}</div>

@auth
@if (auth()->user()->is_admin)
    <div class="mt-6">
        <a href="{{ route('students.create') }}" class="bg-green-600 text-white px-3 py-2 rounded">Tambah Siswa</a>
    </div>
@endif
@endauth
@endsection
