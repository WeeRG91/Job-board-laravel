<x-layout>
    <x-breadcrumbs 
        class="mb-4"
        :links="['Jobs' => route('jobs.index'), 'My Job Applications' => '#',]"
    />

    @forelse ($applications as $application)
        <x-job-card :job="$application->job">
            <div class="flex items-center justify-between text-sm text-slate-500">
                <div>
                    <div>
                        Applied <span class="font-bold">{{ $application->created_at->diffForHumans() }}</span>
                    </div>
                    <div>
                        Other <span class="font-bold">{{ $application->job->job_applications_count - 1 }} {{ Str::plural('applicant', $application->job->job_applications_count - 1) }}</span>
                    </div>
                    <div>
                        Your asking salary <span class="font-bold">{{ Number::currency($application->expected_salary, 'EUR', 'fr') }}</span>
                    </div>
                    <div>
                        Average asking salary <span class="font-bold">{{ Number::currency($application->job->job_applications_avg_expected_salary, 'EUR', 'fr') }}</span>
                    </div>
                </div>

                <div>
                    <form 
                        action="{{ route('my-job-applications.destroy', ['my_job_application' => $application]) }}" 
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')
                        <x-button>
                            Cancel
                        </x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No job application yet
            </div>
            <div class="text-center">
                Go find some jobs <a class="text-indigo-500 hover:underline" href="{{ route('jobs.index') }}">here!</a>
            </div>
        </div>
    @endforelse
</x-layout>