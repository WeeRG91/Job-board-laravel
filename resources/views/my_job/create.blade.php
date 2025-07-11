<x-layout>
    <x-breadcrumbs 
        class="mb-4"
        :links="['Jobs' => route('jobs.index'), 'My Jobs' => route('my-jobs.index'), 'Create a Job' => '#',]"
    />

    <x-card class="mb-4">
        <form action="{{ route('my-jobs.store') }}" method="POST">
            @csrf

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">
                        Job Title
                    </x-label>
                    <x-text-input name="title" />
                </div>

                <div>
                    <x-label for="location" :required="true">
                        Location
                    </x-label>
                    <x-text-input name="location" />
                </div>

                <div class="col-span-2">
                    <x-label for="salary" :required="true">
                        Salary
                    </x-label>
                    <x-text-input name="salary" type="number" />
                </div>

                <div class="col-span-2">
                    <x-label for="description" :required="true">
                        Description
                    </x-label>
                    <x-text-input name="description" type="textarea" />
                </div>

                <div>
                    <x-label for="experience" :required="true">
                        Experience
                    </x-label>
                    <x-radio-group name="experience" :all="false" :value="old('experience')" :options="\App\Models\Job::$experience" />
                </div>

                <div>
                    <x-label for="category" :required="true">
                        Category
                    </x-label>
                    <x-radio-group name="category" :all="false" :value="old('category')" :options="\App\Models\Job::$category" />
                </div>

                <div class="col-span-2">
                    <x-button class="w-full">Create</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>