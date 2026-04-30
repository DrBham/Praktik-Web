<x-default-layout title="Major Detail" section_title="Major Information">
    <div class="bg-white border border-zinc-300 shadow p-6 flex flex-col gap-4">
        <div class="flex flex-col gap-1">
            <span class="text-xs font-bold text-zinc-500">Major Code</span>
            <div class="p-2 bg-slate-50 border border-zinc-200">{{ $major->code }}</div>
        </div>

        <div class="flex flex-col gap-1">
            <span class="text-xs font-bold text-zinc-500">Major Name</span>
            <div class="p-2 bg-slate-50 border border-zinc-200">{{ $major->name }}</div>
        </div>

        <div class="flex gap-2 mt-4">
            <a href="{{ route('majors.index') }}" class="border border-zinc-300 px-4 py-2 text-sm">Back</a>
            <a href="{{ route('majors.edit', $major->id) }}" class="bg-yellow-500 text-white px-4 py-2 text-sm">Edit Data</a>
        </div>
    </div>
</x-default-layout>