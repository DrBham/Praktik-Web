<x-default-layout title="Majors" section_title="Majors Management">
    <div class="bg-white border border-zinc-300 shadow">
        <div class="flex justify-between items-center px-6 py-4 border-b border-zinc-300">
            <h3 class="font-bold">List of Majors</h3>
            <a href="{{ route('majors.create') }}" class="border border-green-500 text-green-500 px-4 py-2 text-sm flex items-center gap-2">
                <span>+ Add Major</span>
            </a>
        </div>
        
        <div class="p-6">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-zinc-50 text-left border-b border-zinc-300">
                        <th class="p-4 font-bold text-sm">#</th>
                        <th class="p-4 font-bold text-sm">Code</th>
                        <th class="p-4 font-bold text-sm">Major Name</th>
                        <th class="p-4 font-bold text-sm text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($majors as $major)
                    <tr class="border-b border-zinc-200">
                        <td class="p-4 text-sm">{{ $loop->iteration }}</td>
                        <td class="p-4 text-sm font-bold text-blue-600">{{ $major->code }}</td>
                        <td class="p-4 text-sm">{{ $major->name }}</td>
                        <td class="p-4">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('majors.show', $major->id) }}" class="p-1 border border-blue-400 text-blue-400">View</a>
                                <a href="{{ route('majors.edit', $major->id) }}" class="p-1 border border-yellow-400 text-yellow-400">Edit</a>
                                <form action="{{ route('majors.destroy', $major->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                        <button type="button" 
                                        class="p-1 border border-red-400 text-red-400 hover:bg-red-50 transition"
                                        onclick="if(confirm('Yakin ingin menghapus jurusan {{ $major->name }}?')) { this.closest('form').submit(); }">
                                        Delete
                                        </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-10 text-center text-zinc-400 italic">No majors found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-default-layout>