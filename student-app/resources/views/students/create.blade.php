@extends('layouts.app')

@section('content')
<h1 class="text-xl font-semibold mb-4">Tambah Siswa</h1>
<form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-white p-4 rounded shadow-sm">
    @csrf
    <div>
        <label class="block text-sm">No Urut</label>
        <input name="no_urut" type="number" value="{{ old('no_urut') }}" class="border rounded w-full px-2 py-1" />
    </div>
    <div>
        <label class="block text-sm">NIS/NISN</label>
        <input name="nis" value="{{ old('nis') }}" class="border rounded w-full px-2 py-1" required />
    </div>
    <div>
        <label class="block text-sm">Nama</label>
        <input name="nama" value="{{ old('nama') }}" class="border rounded w-full px-2 py-1" required />
    </div>
    <div>
        <label class="block text-sm">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="border rounded w-full px-2 py-1" required>
            <option value="">Pilih</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <div>
        <label class="block text-sm">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="border rounded w-full px-2 py-1" />
    </div>
    <div>
        <label class="block text-sm">Kelas</label>
        <input name="kelas" value="{{ old('kelas') }}" class="border rounded w-full px-2 py-1" />
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm">Alamat</label>
        <textarea name="alamat" class="border rounded w-full px-2 py-1">{{ old('alamat') }}</textarea>
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm">Foto</label>
        <input type="file" name="foto" accept="image/*" />
    </div>
    <div class="md:col-span-2">
        <button class="bg-blue-600 text-white px-3 py-2 rounded">Simpan</button>
    </div>
</form>
@endsection
