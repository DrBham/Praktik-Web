<x-default-layout title="Add Major" section_title="Create New Major">
    <div class="max-w-2xl bg-white border border-zinc-300 shadow p-8">
        <form action="{{ route('majors.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                {{-- Input Kode Major --}}
                <div class="flex flex-col gap-2">
                    <label class="font-bold uppercase text-xs text-zinc-500">Major Code</label>
                    <input type="text" name="code" value="{{ old('code') }}" class="border border-zinc-300 p-2" placeholder="Contoh: TI">
                    @error('code') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                </div>

                {{-- Input Nama Major --}}
                <div class="flex flex-col gap-2">
                    <label class="font-bold uppercase text-xs text-zinc-500">Major Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="border border-zinc-300 p-2" placeholder="Contoh: Teknik Informatika">
                    @error('name') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                </div>

                <div class="flex gap-2 pt-4">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 text-sm font-bold">SAVE MAJOR</button>
                    <a href="{{ route('majors.index') }}" class="border border-zinc-300 px-6 py-2 text-sm font-bold">CANCEL</a>
                </div>
            </div>
        </form>
    </div>
</x-default-layout>