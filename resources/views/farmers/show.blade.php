<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __($agent->user->firstname) }} {{ __($agent->user->lastname ) }} --}}
            Farmer Information
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-100 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 gap-6 lg:gap-8 p-6 lg:p-8">

                    <div class="relative overflow-x-auto px-6">
                        {{-- top --}}
                        <div class="flex justify-between items-center border-b pb-8">
                            <div class="flex gap-4 items-center">
                                <a href="{{  route('farmers') }}" class="hover:font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 hover:text-gray-600">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-4.28 9.22a.75.75 0 0 0 0 1.06l3 3a.75.75 0 1 0 1.06-1.06l-1.72-1.72h5.69a.75.75 0 0 0 0-1.5h-5.69l1.72-1.72a.75.75 0 0 0-1.06-1.06l-3 3Z" clip-rule="evenodd" />
                                    </svg>

                                </a>
                                <img src="{{ asset('assets/images/logo-mark.png') }}" alt="" class="shadow-md rounded-full border h-20 w-20">

                                <div class="flex flex-col">
                                    <h4 class="text-2xl font-semibold">{{ optional($farmer)->fname ?? "" }} {{ optional($farmer)->lname ?? ""  }} {{ optional($farmer)->mname ?? ""  }}</h4>
                                </div>
                            </div>
                            <div>
                                <span class="text-gray-600 font-semibold text-md">Joined: {{ $farmer->created_at->toFormattedDateString() }}</span>
                            </div>
                        </div>

                        <div class="p-10 space-y-8">

                            <!-- Farmer Detail Section -->
                            <div>
                                <h4 class="uppercase text-green-500 text-sm font-semibold mb-4">Farmer Detail</h4>
                                <div class="grid grid-cols-2 gap-8">

                                    <!-- First Column -->
                                    <div class="space-y-4">
                                        <div class="bg-gray-100 rounded p-2">
                                            <h4 class="text-sm text-gray-500">Agent Name</h4>
                                            <p>{{ optional($farmer)->agent->user->firstname ?? "" }} {{ optional($farmer)->agent->user->lastname ?? "" }} {{ optional($farmer)->agent->user->middlename ?? "" }}</p>
                                        </div>

                                        <div class="bg-gray-100 rounded p-2">
                                            <h4 class="text-sm text-gray-500">Gender</h4>
                                            <p>{{ $farmer->gender }}</p>
                                        </div>

                                        <div class="bg-gray-100 rounded p-2">
                                            <h4 class="text-sm text-gray-500">DOB</h4>
                                            <p>{{ $farmer->dob }}</p>
                                        </div>
                                    </div>

                                    <!-- Second Column -->
                                    <div class="space-y-4">
                                        <div class="bg-gray-100 rounded p-2">
                                            <h4 class="text-sm text-gray-500">Agent Phone No</h4>
                                            <p>{{ $farmer->agent->user->phone }}</p>
                                        </div>

                                        <div class="bg-gray-100 rounded p-2">
                                            <h4 class="text-sm text-gray-500">Marital Status</h4>
                                            <p>{{ $farmer->marital_status }}</p>
                                        </div>

                                        <div class="bg-gray-100 rounded p-2">
                                            <h4 class="text-sm text-gray-500">Disability</h4>
                                            <p>{{ $farmer->disability ?: 'Not provided' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Location Section -->
                            <div>
                                <h4 class="uppercase text-green-500 text-sm font-semibold mb-4">Location Information</h4>
                                <div class="grid grid-cols-2 gap-8">

                                    <!-- First Column -->
                                    <div class="space-y-4">
                                        <div class="bg-gray-100 rounded p-2">
                                            <h4 class="text-sm text-gray-500">State/Province</h4>
                                            <p>{{ $farmer->state->name }}</p>
                                        </div>

                                        <div class="bg-gray-100 rounded p-2">
                                            <h4 class="text-sm text-gray-500">Permanent Address</h4>
                                            <p>{{ $farmer->permanent_address ?: 'Not provided' }}</p>
                                        </div>

                                        <div class="bg-gray-100 rounded p-2">
                                            <h4 class="text-sm text-gray-500">Residential Status</h4>
                                            <p>{{ $farmer->residential_status ?: 'Not provided' }}</p>
                                        </div>
                                    </div>

                                    <!-- Second Column -->
                                    <div class="space-y-4">
                                        <div class="bg-gray-100 rounded p-2">
                                            <h4 class="text-sm text-gray-500">LGA/Area</h4>
                                            <p>{{ $farmer->lga->name }}</p>
                                        </div>

                                        <div class="bg-gray-100 rounded p-2">
                                            <h4 class="text-sm text-gray-500">Contact Address</h4>
                                            <p>{{ $farmer->contact_address ?: 'Not provided' }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Other Information Section -->
                            <div>
                                <h4 class="uppercase text-green-500 text-sm font-semibold mb-4">Other Information</h4>
                                <div class="grid grid-cols-2 gap-8">

                                    <!-- First Column -->
                                    <div class="space-y-4">

                                        <div class="bg-gray-100 rounded p-2">
                                            <h4 class="text-sm text-gray-500">BVN</h4>
                                            <p>{{ $farmer->bvn ?: 'Not provided' }}</p>
                                        </div>

                                        <div class="bg-gray-100 rounded p-2">
                                            <h4 class="text-sm text-gray-500">Co-operative Name</h4>
                                            <p>{{ $farmer->cooperative_name ?: 'Not provided' }}</p>
                                        </div>
                                    </div>

                                    <!-- Second Column -->
                                    <div class="space-y-4">

                                        <div class="bg-gray-100 rounded p-2">
                                            <h4 class="text-sm text-gray-500">NIN</h4>
                                            <p>{{ $farmer->nin ?: 'Not provided' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
