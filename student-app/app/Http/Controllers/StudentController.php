<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($search = $request->query('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                  ->orWhere('nis', 'like', "%$search%")
                  ->orWhere('kelas', 'like', "%$search%")
                  ->orWhere('alamat', 'like', "%$search%");
            });
        }

        $students = $query->orderBy('nama')->paginate(10)->withQueryString();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_urut' => ['nullable', 'integer', 'min:1'],
            'nis' => ['required', 'string', 'max:50', 'unique:students,nis'],
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'tanggal_lahir' => ['nullable', 'date'],
            'kelas' => ['nullable', 'string', 'max:50'],
            'alamat' => ['nullable', 'string', 'max:1000'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto_path'] = $request->file('foto')->store('students', 'public');
        }

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'no_urut' => ['nullable', 'integer', 'min:1'],
            'nis' => ['required', 'string', 'max:50', 'unique:students,nis,' . $student->id],
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'tanggal_lahir' => ['nullable', 'date'],
            'kelas' => ['nullable', 'string', 'max:50'],
            'alamat' => ['nullable', 'string', 'max:1000'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            if ($student->foto_path) {
                Storage::disk('public')->delete($student->foto_path);
            }
            $validated['foto_path'] = $request->file('foto')->store('students', 'public');
        }

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy(Student $student)
    {
        if ($student->foto_path) {
            Storage::disk('public')->delete($student->foto_path);
        }
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
