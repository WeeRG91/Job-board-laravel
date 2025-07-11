<x-layout>
    <x-breadcrumbs 
        class="mb-4"
        :links="['Jobs' => route('jobs.index'), 'My Jobs' => route('my-jobs.index'), 'Edit Job ' . $job->title => '#',]"
    />

    <x-card class="mb-4">
        <form action="{{ route('my-jobs.update', $job) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">
                        Job Title
                    </x-label>
                    <x-text-input name="title" :value="$job->title"/>
                </div>

                <div>
                    <x-label for="location" :required="true">
                        Location
                    </x-label>
                    <x-text-input name="location" :value="$job->location"/>
                </div>

                <div class="col-span-2">
                    <x-label for="salary" :required="true">
                        Salary
                    </x-label>
                    <x-text-input name="salary" type="number" :value="$job->salary"/>
                </div>

                <div class="col-span-2">
                    <x-label for="description" :required="true">
                        Description
                    </x-label>
                    <x-text-input name="description" type="textarea" :value="$job->description"/>
                </div>

                <div>
                    <x-label for="experience" :required="true">
                        Experience
                    </x-label>
                    <x-radio-group name="experience" :all="false" :value="$job->experience" :options="\App\Models\Job::$experience" />
                </div>

                <div>
                    <x-label for="category" :required="true">
                        Category
                    </x-label>
                    <x-radio-group name="category" :all="false" :value="$job->category" :options="\App\Models\Job::$category" />
                </div>

                <div class="col-span-2">
                    <x-button class="w-full">Edit</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>