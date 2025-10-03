@extends('layouts.app')

@section('content')
<h1 class="text-xl font-semibold mb-4">Edit Siswa</h1>
<form action="{{ route('students.update', $student) }}" method="post" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-white p-4 rounded shadow-sm">
    @csrf
    @method('PUT')
    <div>
        <label class="block text-sm">No Urut</label>
        <input name="no_urut" type="number" value="{{ old('no_urut', $student->no_urut) }}" class="border rounded w-full px-2 py-1" />
    </div>
    <div>
        <label class="block text-sm">NIS/NISN</label>
        <input name="nis" value="{{ old('nis', $student->nis) }}" class="border rounded w-full px-2 py-1" required />
    </div>
    <div>
        <label class="block text-sm">Nama</label>
        <input name="nama" value="{{ old('nama', $student->nama) }}" class="border rounded w-full px-2 py-1" required />
    </div>
    <div>
        <label class="block text-sm">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="border rounded w-full px-2 py-1" required>
            <option value="L" @selected($student->jenis_kelamin==='L')>Laki-laki</option>
            <option value="P" @selected($student->jenis_kelamin==='P')>Perempuan</option>
        </select>
    </div>
    <div>
        <label class="block text-sm">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}" class="border rounded w-full px-2 py-1" />
    </div>
    <div>
        <label class="block text-sm">Kelas</label>
        <input name="kelas" value="{{ old('kelas', $student->kelas) }}" class="border rounded w-full px-2 py-1" />
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm">Alamat</label>
        <textarea name="alamat" class="border rounded w-full px-2 py-1">{{ old('alamat', $student->alamat) }}</textarea>
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm">Foto Baru (opsional)</label>
        <input type="file" name="foto" accept="image/*" />
        @if ($student->foto_path)
            <div class="mt-2">
                <img src="{{ asset('storage/'.$student->foto_path) }}" class="h-16 w-16 object-cover rounded" />
            </div>
        @endif
    </div>
    <div class="md:col-span-2">
        <button class="bg-blue-600 text-white px-3 py-2 rounded">Update</button>
    </div>
</form>
@endsection
