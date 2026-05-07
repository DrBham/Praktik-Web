<?php

namespace App\Http\Controllers;

use App\Ai\Agents\AgenKuliah;
use App\Models\Student;
use App\Models\Majors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    // 1. Tampilan Daftar Mahasiswa
    public function index()
    {
        if (!Gate::allows('view-student')) {
            abort(401);
        }

        $students = Student::with('majors')->get();
        return view('students.index', compact('students'));
    }

    // 2. Tampilan Form Tambah
    public function create()
    {
        if (!Gate::allows('store-student')) {
            abort(401);
        }

        $majors = Majors::all(); 
        return view('students.create', compact('majors'));
    }

    // 3. Proses Simpan
    public function store(Request $request)
    {
        if (!Gate::allows('store-student')) {
            abort(401);
        }

        $request->validate([
            'name' => 'required|min:3',
            'student_id_number' => 'required|unique:students,student_id_number',
            'email' => 'required|email',
            'phone_number' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'majors' => 'required',
            'status' => 'required',
        ]);

        Student::create([
            'name' => $request->name,
            'student_id_number' => $request->student_id_number,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'major_id' => $request->majors,
            'status' => $request->status,
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    // 4. Tampilan Detail
    public function show(string $id)
    {
        if (!Gate::allows('view-student')) {
            abort(401);
        }

        $student = Student::with('majors')->findOrFail($id);
        return view('students.show', compact('student'));
    }

    // 5. Tampilan Form Edit
    public function edit(string $id)
    {
        if (!Gate::allows('update-student')) {
            abort(401);
        }

        $student = Student::findOrFail($id);
        $majors = Majors::all();
        return view('students.edit', compact('student', 'majors'));
    }

    // 6. Proses Update
    public function update(Request $request, string $id)
    {
        if (!Gate::allows('update-student')) {
            abort(401);
        }

        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'student_id_number' => 'required|unique:students,student_id_number,'.$id,
            'majors' => 'required',
        ]);

        $student->update([
            'name' => $request->name,
            'student_id_number' => $request->student_id_number,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'major_id' => $request->majors,
            'status' => $request->status,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // 7. Proses Hapus
    public function destroy(string $id)
    {
        if (!Gate::allows('destroy-student')) {
            abort(401);
        }

        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }

    // 8. Analisis Karir dengan Agent AI
    public function analyzeCareer(string $id)
    {
        // Mengambil data mahasiswa beserta relasi jurusannya
        $student = Student::with('majors')->findOrFail($id);

        try {
            // Memanggil Agent AI untuk memberikan analisis
            $response = AgenKuliah::make()->prompt(
                "Berikan analisis terkait peluang karir " .
                "dan saran akademik untuk mahasiswa bernama " .
                "{$student->name} dari jurusan {$student->majors->name}. " .
                "tidak perlu berikan pertanyaan lain, hanya berikan " .
                "analisis berdasarkan data yang saya berikan."
            );
        } catch (\Exception $e) {
            $response = "Gagal mengambil analisis AI. Error: " . $e->getMessage();
        }

        // Mengirimkan hasil ke view
        return view('students.analysis', [
            'student' => $student,
            'analysis' => $response
        ]);
    }
}