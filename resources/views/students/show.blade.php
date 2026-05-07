<x-default-layout title="Student" section_title="Student detail">
    <div class="grid grid-cols-3">
        <div class="flex flex-col gap-4 px-6 py-4 bg-white border border-zinc-300 shadow col-span-3 md:col-span-2">
            
            <div class="grid sm:grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <div>Name</div>
                    <div class="px-3 py-2 border border-zinc-300">{{ $student->name }}</div>
                </div>

                <div class="flex flex-col gap-2">
                    <div>Student ID Number</div>
                    <div class="px-3 py-2 border border-zinc-300">{{ $student->student_id_number }}</div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <div>Email</div>
                    <div class="px-3 py-2 border border-zinc-300">{{ $student->email }}</div>
                </div>

                <div class="flex flex-col gap-2">
                    <div>Phone Number</div>
                    <div class="px-3 py-2 border border-zinc-300">{{ $student->phone_number }}</div>
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <div>Birth Date</div>
                <div class="px-3 py-2 border border-zinc-300">
                    {{ date('d F Y', strtotime($student->birth_date)) }}
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <div>Gender</div>
                <div class="px-3 py-2 border border-zinc-300">{{ $student->gender }}</div>
            </div>

            <div class="flex flex-col gap-2">
                <div>Major</div>
                <div class="px-3 py-2 border border-zinc-300">{{ $student->majors->name }}</div>
            </div>

            <div class="flex flex-col gap-2">
                <div>Status</div>
                <div class="px-3 py-2 border border-zinc-300">{{ $student->status }}</div>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('students.index') }}" 
                   class="border border-slate-500 text-slate-500 px-3 py-2 cursor-pointer">
                    <span>Back</span>
                </a>

                <a href="{{ route('students.edit', $student->id) }}" 
                   class="bg-yellow-500 border border-yellow-500 text-white px-3 py-2 flex items-center gap-2 cursor-pointer">
                    <span>Edit</span>
                </a>
                 {{-- tombol analisis --}}
                <form action="{{ route('students.analyze', $student->id) }}" method="GET" class="inline">
                    <button type="submit"
                        class="bg-blue-600 border border-blue-600 text-white px-3 py-2 flex items-center gap-2 hover:bg-blue-700">
                        <span>Lihat Analisis</span>
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-default-layout>