<x-default-layout title="AI Career Analysis" section_title="Student Analysis">
    <div class="container mx-auto py-8 px-4">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Student Profile Card -->
        <div class="lg:col-span-1">
            <div class="bg-white shadow-sm border border-zinc-200 rounded-lg overflow-hidden">
                <div class="bg-zinc-700 text-white px-4 py-3 font-bold text-sm uppercase">
                    Student Profile
                </div>
                <div class="p-4 space-y-3">
                    <div>
                        <label class="text-[11px] font-bold text-zinc-500 uppercase">Nama</label>
                        <p class="text-sm font-semibold text-zinc-800">{{ $student->name }}</p>
                    </div>
                    <div>
                        <label class="text-[11px] font-bold text-zinc-500 uppercase">NIM</label>
                        <p class="text-sm text-zinc-700">{{ $student->student_id_number }}</p>
                    </div>
                    <div>
                        <label class="text-[11px] font-bold text-zinc-500 uppercase">Jurusan</label>
                        <p class="text-sm text-zinc-700">{{ $student->majors->name }}</p>
                    </div>
                    <div>
                        <label class="text-[11px] font-bold text-zinc-500 uppercase">Status</label>
                        <p class="text-sm">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase 
                            {{ $student->status == 'Active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $student->status }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- AI Analysis Section -->
        <div class="lg:col-span-2">
            <div class="bg-indigo-50 border border-indigo-200 shadow-sm rounded-lg overflow-hidden">
                <div class="bg-indigo-600 px-6 py-3 flex justify-between items-center text-white">
                    <div class="flex items-center gap-2 font-semibold tracking-wide text-sm uppercase">
                        <i class="ph ph-magic-wand text-lg"></i> AI Career Analysis
                    </div>
                </div>
                
                <div class="p-6">
                    @if (is_string($analysis) && strpos($analysis, 'Gagal') !== false)
                        <div class="bg-red-50 border border-red-300 text-red-700 p-4 rounded text-sm">
                            {{ $analysis }}
                        </div>
                    @else
                        <div class="text-zinc-700 text-sm leading-relaxed whitespace-pre-wrap">
                            {{ $analysis }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <!-- Back Button -->
    <div class="mt-6 flex justify-center">
        <a href="{{ route('students.show', $student->id) }}" class="border border-zinc-300 px-6 py-2 text-sm font-semibold hover:bg-zinc-50 transition">
            Back to Student Profile
        </a>
    </div>
</div>
</x-default-layout>