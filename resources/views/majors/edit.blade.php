<x-default-layout title="Edit Major" section_title="Edit Major Data">
    <form action="{{ route('majors.update', $major->id) }}" method="POST" class="bg-white border border-zinc-300 shadow p-6 flex flex-col gap-4">
        @csrf
        @method('PUT')

        <div class="flex flex-col gap-2">
            <label for="code">Major Code</label>
            <input type="text" name="code" value="{{ old('code', $major->code) }}" class="px-3 py-2 border border-zinc-300 bg-slate-50">
            @error('code') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="name">Major Name</label>
            <input type="text" name="name" value="{{ old('name', $major->name) }}" class="px-3 py-2 border border-zinc-300 bg-slate-50">
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="flex self-end gap-2 mt-4">
            <a href="{{ route('majors.index') }}" class="border border-slate-500 text-slate-500 px-4 py-2">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2">Update Major</button>
        </div>
    </form>
</x-default-layout>