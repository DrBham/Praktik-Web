<x-default-layout title="Major Insights" section_title="Academic Analysis">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Statistics Section -->
        <div class="lg:col-span-1 space-y-4">
            <div class="bg-white border border-zinc-300 shadow p-6 rounded">
                <h3 class="font-bold text-zinc-800 mb-4">Student Statistics</h3>
                <div class="space-y-3">
                    @forelse ($stats as $stat)
                    <div class="p-3 bg-zinc-50 border border-zinc-200 rounded">
                        <div class="text-xs font-bold text-zinc-500 mb-1">
                            {{ $stat->majors->name }} - {{ $stat->status }}
                        </div>
                        <div class="text-2xl font-bold text-blue-600">
                            {{ $stat->total }} 
                            <span class="text-xs text-zinc-400">students</span>
                        </div>
                    </div>
                    @empty
                    <p class="text-xs text-zinc-400 italic">No data available</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- AI Analysis Section -->
        <div class="lg:col-span-2">
            <div class="bg-white border border-zinc-300 shadow p-6 rounded">
                <h3 class="font-bold text-zinc-800 mb-4 flex items-center gap-2">
                    <i class="ph ph-sparkles"></i> AI Academic Insights
                </h3>
                
                @if (is_string($insight) && strpos($insight, 'Gagal') !== false)
                    <div class="bg-red-50 border border-red-300 text-red-700 p-4 rounded text-sm">
                        {{ $insight }}
                    </div>
                @else
                    <div class="prose prose-sm max-w-none">
                        <div class="bg-zinc-50 p-4 rounded border border-zinc-200 text-zinc-700 text-sm leading-relaxed whitespace-pre-wrap">
                            {{ $insight }}
                        </div>
                    </div>
                @endif
                
                <div class="mt-4 pt-4 border-t border-zinc-200">
                    <a href="{{ route('majors.index') }}" class="border border-zinc-300 px-4 py-2 text-sm inline-block">
                        Back to Majors
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>