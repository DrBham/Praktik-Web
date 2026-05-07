<?php

namespace App\Http\Controllers;

use App\Ai\Agents\AgenKuliah;
use App\Models\Majors;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ai\Facades\AI;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Majors::all();
        return view('majors.index', compact('majors'));
    }

    public function create()
    {
        return view('majors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:majors,code|max:10',
            'description' => 'nullable|string',
        ]);

        Majors::create($request->all());

        return redirect()->route('majors.index')->with('success', 'Major created successfully.');
    }

    public function show(string $id)
    {
        $major = Majors::findOrFail($id);
        return view('majors.show', compact('major'));
    }

    public function edit(string $id)
    {
        $major = Majors::findOrFail($id);
        return view('majors.edit', compact('major'));
    }

    public function update(Request $request, string $id)
    {
        $major = Majors::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:majors,code,' . $id,
        ]);

        $major->update($request->all());

        return redirect()->route('majors.index')->with('success', 'Major updated successfully.');
    }

    public function destroy(string $id)
    {
        $major = Majors::findOrFail($id);
        $major->delete();

        return redirect()->route('majors.index')->with('success', 'Major deleted successfully.');
    }

    /**
     * Menghasilkan audit akademik dan statistik prodi menggunakan AI.
     */
    public function majorInsights()
    {
        // Mengambil data statistik jumlah mahasiswa berdasarkan jurusan dan status
        $stats = Student::with('majors')
            ->select('major_id', 'status', DB::raw('count(*) as total'))
            ->groupBy('major_id', 'status')
            ->get();

        // Mengonversi data statistik menjadi format teks untuk dipahami AI
        $dataTeks = $stats->map(function ($item) {
            return "Jurusan {$item->majors->name} (Status {$item->status}: {$item->total} orang)";
        })->implode(', ');

        try {
            // Mengirim data ke Agent AI untuk mendapatkan insight analitis
            $insight = AI::agent(AgenKuliah::class)
                ->prompt(
                    "Berikut adalah data statistik pada {$dataTeks}.\n"
                    . "Tolong berikan:\n"
                    . "1. Deskripsi singkat kondisi jurusan.\n"
                    . "2. Evaluasi akademik.\n"
                    . "3. Kritik dan saran untuk dosen."
                );
        } catch (\Exception $e) {
            $insight = "Gagal mengambil analisis AI. Error: " . $e->getMessage();
        }

        // Mengembalikan hasil ke view majors.insight
        return view('majors.insight', compact('insight', 'stats'));
    }
}