<x-layout>
    <x-breadcrumbs 
        class="mb-4"
        :links="['Jobs' => route('jobs.index'), 'My Jobs' => '#',]"
    />

    <div class="mb-4 text-right">
        <x-link-button href="{{ route('my-jobs.create') }}">
            Add New
        </x-link-button>
    </div>

    @forelse ($jobs as $job)
        <x-job-card :job="$job">
            <div class="text-xs text-slate-500">
                @forelse ($job->jobApplications as $application)
                    <div class="mb-4 flex items-center justify-between rounded-md border border-dashed border-slate-300 p-5">
                        <div>
                            <div>{{ $application->user->name }}</div>

                            <div>
                                Applied {{ $application->created_at->diffForHumans() }}
                            </div>

                            <div>
                                Download CV
                            </div>
                        </div>

                        <div>{{ Number::currency($application->expected_salary, 'EUR', 'fr') }}</div>
                    </div>
                @empty
                    <div class="rounded-md border border-dashed border-slate-300 p-5">
                        <div class="text-center font-medium">
                            No jobs applications yet
                        </div>
                    </div>
                @endforelse

                <div class="flex space-x-2 mt-2">
                    <x-link-button href="{{ route('my-jobs.edit', $job) }}">
                        Edit
                    </x-link-button>

                    <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button>
                            Delete
                        </x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No jobs yet
            </div>
            <div class="text-center">
                Post your first job <a href="{{ route('my-jobs.create') }}" class="text-indigo-500 hover:underline">here!</a>
            </div>
        </div>
    @endforelse
</x-layout>