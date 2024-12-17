<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __($farm_season->user->firstname) }} {{ __($farm_season->user->lastname ) }} --}}
            Farm Season Information
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
                                <a href="{{  route('farms') }}" class="hover:font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 text-blue-500 hover:text-blue-600">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-4.28 9.22a.75.75 0 0 0 0 1.06l3 3a.75.75 0 1 0 1.06-1.06l-1.72-1.72h5.69a.75.75 0 0 0 0-1.5h-5.69l1.72-1.72a.75.75 0 0 0-1.06-1.06l-3 3Z" clip-rule="evenodd" />
                                    </svg>

                                </a>
                                <img src="{{ asset('assets/images/logo-mark.png') }}" alt="" class="shadow-md rounded-full border h-20 w-20">

                                <div class="flex flex-col">
                                    <h4 class="text-2xl font-semibold">{{ $farm_season->farm->farmer->fname .' '. $farm_season->farm->farmer->lname  }}</h4>
                                    <p class="text-sm text-gray-400">{{ $farm_season->farm->state->name .', '. $farm_season->farm->lga->name }}</p>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('farm.farm-visitations', ['farm' => $farm_season->uuid]) }}" class="bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded text-white">View Farm Visitations</a>
                            </div>
                        </div>

                        <div class="p-10 grid grid-cols-3 gap-8 justify-between">

                            <div class="space-y-4">
                                <h4 class="uppercase text-gray-500 text-sm font-semibold">Farmer Detail</h4>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Full Name</h4>
                                    <p>{{ $farm_season->farm->farmer->fname .' '. $farm_season->farm->farmer->lname }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Phone</h4>
                                    <p>{{ $farm_season->farm->farmer->mobile_no }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Gender</h4>
                                    <p>{{ $farm_season->farm->farmer->gender }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Date of Birth</h4>
                                    <p>{{ $farm_season->farm->farmer->dob? : 'not provided' }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Marital Status</h4>
                                    <p>{{ $farm_season->farm->farmer->marital_status? : 'not provided' }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">BVN</h4>
                                    <p>{{ $farm_season->farm->farmer->bvn? : 'not provided' }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">NIN</h4>
                                    <p>{{ $farm_season->farm->farmer->nin? : 'not provided' }}</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <h4 class="uppercase text-gray-500 text-sm font-semibold">Farm Information</h4>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Description</h4>
                                    <p>{{ $farm_season->farm->description? : 'not provided' }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Estimated Size</h4>
                                    <p>{{ $farm_season->farm->size? : 'not provided' }} hectares</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Location</h4>
                                    <p>{{ $farm_season->farm->state->name .', '. $farm_season->farm->lga->name }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Latitude</h4>
                                    <p>{{ $farm_season->farm->lat }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Longitude</h4>
                                    <p>{{ $farm_season->farm->long }}</p>
                                </div>

                            </div>

                            <div class="space-y-4">
                                <h4 class="uppercase text-gray-500 text-sm font-semibold">Farm Season Info</h4>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Commodity Planted</h4>
                                    <p>{{ $farm_season->commodity }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Planted Date</h4>
                                    <p>{{ \Carbon\Carbon::parse($farm_season->planted_date)->isoformat('Do, MMMM Y') }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Harvest Date</h4>
                                    @if($farm_season->harvest != NULL)
                                        <p>{{ \Carbon\Carbon::parse($farm_season->season_year)->isoformat('Do, MMMM Y') }}</p>
                                    @else
                                        <p>Not harvested</p>
                                    @endif
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Season Year</h4>
                                    <p>{{ $farm_season->season_year }}</p>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
