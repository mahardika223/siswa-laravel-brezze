@extends('layouts.app')

@section('content')
<div class="bg-white rounded shadow-sm p-4">
    <div class="flex items-start gap-4">
        <div>
            @if ($student->foto_path)
                <img src="{{ asset('storage/'.$student->foto_path) }}" class="h-32 w-32 object-cover rounded" />
            @else
                <div class="h-32 w-32 bg-gray-100 rounded flex items-center justify-center text-gray-400">No Photo</div>
            @endif
        </div>
        <div class="grid grid-cols-2 gap-x-8 gap-y-2">
            <div class="text-gray-500">No Urut</div><div>{{ $student->no_urut }}</div>
            <div class="text-gray-500">NIS/NISN</div><div>{{ $student->nis }}</div>
            <div class="text-gray-500">Nama</div><div>{{ $student->nama }}</div>
            <div class="text-gray-500">Jenis Kelamin</div><div>{{ $student->jenis_kelamin }}</div>
            <div class="text-gray-500">Tanggal Lahir</div><div>{{ $student->tanggal_lahir }}</div>
            <div class="text-gray-500">Kelas</div><div>{{ $student->kelas }}</div>
            <div class="text-gray-500">Alamat</div><div>{{ $student->alamat }}</div>
        </div>
    </div>
    <div class="mt-6">
        <a href="{{ route('students.index') }}" class="text-blue-600">Kembali ke daftar</a>
    </div>
</div>
@endsection
