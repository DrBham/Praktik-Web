<x-default-layout title="Student" section_title="Add new student">
    <div>
        <form action="{{ route('students.store') }}" method="POST"
            class="flex flex-col gap-4 px-6 py-4 bg-white border border-zinc-300 shadow col-span-3 md:col-span-2">
            @csrf
            <div class="grid sm:grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="px-3 py-2 border border-zinc-300 bg-slate-50"
                        placeholder="Student Name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label for="student_id_number">Student ID Number</label>
                    <input type="text" id="student_id_number" name="student_id_number"
                        class="px-3 py-2 border border-zinc-300 bg-slate-50" placeholder="Student ID (e.g., F55122001)"
                        value="{{ old('student_id_number') }}">
                    @error('student_id_number')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <div class="flex flex-col gap-2">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="px-3 py-2 border border-zinc-300 bg-slate-50"
                        placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number"
                    class="px-3 py-2 border border-zinc-300 bg-slate-50" placeholder="Phone Number"
                    value="{{ old('phone_number') }}">
                @error('phone_number')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="birth_date">Birth Date</label>
                <input type="date" id="birth_date" name="birth_date"
                    class="px-3 py-2 border border-zinc-300 bg-slate-50" value="{{ old('birth_date') }}">
                @error('birth_date')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="px-3 py-2 border border-zinc-300 appearance-none bg-slate-50">
                    <option value="" disabled {{ old('gender') == '' ? 'selected' : '' }}>Select Gender</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

           <div class="flex flex-col gap-2">
            <label for="majors" class="font-semibold text-zinc-700">Major</label>
            <select name="majors" id="majors" class="px-3 py-2 border border-zinc-300 bg-slate-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" disabled selected>-- Select Major --</option>
                @foreach ($majors as $major)
                <option value="{{ $major->id }}" {{ old('majors') == $major->id ? 'selected' : '' }}>
                {{ $major->name }} ({{ $major->code }})
                </option>
                @endforeach
            </select>

                @error('majors')
            <div class="text-red-500 text-xs mt-1 italic">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="status">Status</label>
                <select name="status" id="status" class="px-3 py-2 border border-zinc-300 appearance-none bg-slate-50">
                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="Graduated" {{ old('status') == 'Graduated' ? 'selected' : '' }}>Graduated</option>
                    <option value="Dropped Out" {{ old('status') == 'Dropped Out' ? 'selected' : '' }}>Dropped Out</option>
                </select>
                @error('status')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex self-end gap-2">
                <a href="{{ route('students.index') }}"
                    class="border border-slate-500 text-slate-500 px-3 py-2 cursor-pointer">
                    <span>Cancel</span>
                </a>
                <button type="submit"
                    class="bg-blue-50 border border-blue-400 text-blue-400 px-3 py-2 flex items-center gap-2 cursor-pointer">
                    <i class="ph ph-floppy-disk block text-blue-400"></i>
                    <span>Add</span>
                </button>
            </div>
        </form>
    </div>
</x-default-layout>