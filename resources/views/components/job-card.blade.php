<x-card class="mb-2">
    <div class="mb-2 flex justify-between">
        <h2 class="text-lg font-medium">{{ $job->title }}</h2>

        <div class="text-slate-500 text-sm">
            {{ Number::currency($job->salary, 'EUR', 'fr') }}
        </div>
    </div>

    <div class="mb-4 flex items-center justify-between text-sm text-slate-500">
        <div  class="flex items-center space-x-2">
            <div>{{ $job->employer->company_name }}</div>
            <div>{{ $job->location }}</div>

            @if ($job->deleted_at)
                <span class="text-xs text-red-500 border border-red-500 px-2 py-1 rounded-md">
                    Deleted
                </span>
            @endif
        </div>
        <div class="flex space-x-2 text-xs">
            <x-tag>
                <a href="{{ route('jobs.index', ['experience' => $job->experience]) }}">
                    {{ Str::ucfirst($job->experience) }}
                </a>
            </x-tag>
            <x-tag>
                <a href="{{ route('jobs.index', ['category' => $job->category]) }}">
                    {{ $job->category }}
                </a>
            </x-tag>
        </div>
    </div>

    {{ $slot }}
</x-card>