<x-default-layout title="Profile" section_title="Profile">
    <div class="flex flex-col w-full gap-4 border border-zinc-300 bg-white p-6 shadow">
        <div>
            <h1 class="font-semibold text-2xl">Profile</h1>
            <p class="text-zinc-600 text-sm">Informasi akun Anda saat ini.</p>
        </div>
        <div class="h-[1px] bg-zinc-300"></div>

        <div class="flex flex-col gap-4 mt-2">
            <div class="flex flex-col gap-2">
                <label class="font-semibold text-sm">Name</label>
                <div class="px-3 py-2 border border-zinc-300 bg-slate-50 text-zinc-700">
                    {{ $user->name }}
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <label class="font-semibold text-sm">Email</label>
                <div class="px-3 py-2 border border-zinc-300 bg-slate-50 text-zinc-700">
                    {{ $user->email }}
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <label class="font-semibold text-sm">Role</label>
                <div class="px-3 py-2 border border-zinc-300 bg-slate-50 text-zinc-700 capitalize">
                    {{ $user->role }}
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <form onsubmit="return confirm('Apakah Anda yakin ingin keluar?')" method="POST"
                    action="{{ route('auth.logout') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 border text-white px-4 py-2 text-sm cursor-pointer hover:bg-red-700 transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-default-layout>