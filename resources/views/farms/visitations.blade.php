<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __($farm_season->user->firstname) }} {{ __($farm_season->user->lastname ) }} --}}
            Farm Visitation Detail
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
                                <a href="{{  route('farm.show', ['uuid' => $farm_season->uuid]) }}" class="hover:font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 text-blue-500 hover:text-blue-600">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-4.28 9.22a.75.75 0 0 0 0 1.06l3 3a.75.75 0 1 0 1.06-1.06l-1.72-1.72h5.69a.75.75 0 0 0 0-1.5h-5.69l1.72-1.72a.75.75 0 0 0-1.06-1.06l-3 3Z" clip-rule="evenodd" />
                                    </svg>
                                </a>

                                <div>
                                    <h4 class="uppercase text-gray-500 text-sm font-semibold">Farm Info</h4>
                                    <div>
                                        <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi laborum, voluptas nisi pariatur exercitationem suscipit sit eligendi ea rem corporis, praesentium qui debitis! Itaque beatae at voluptate praesentium? Quasi, sequi!</p>
                                        <div class="flex gap-6 text-sm text-gray-500">
                                            <p>Latitude: {{ $farm_season->farm->lat }}</p>
                                            <p>Longitude: {{ $farm_season->farm->long }}</p>
                                        </div>
                                        <p class="text-sm text-gray-500">Location: {{ $farm_season->farm->state->name .', '. $farm_season->farm->lga->name }}</p>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="p-10 space-y-4">
                            @forelse($visitations as $key => $visitation)
                                <h4 class="uppercase text-green-500 text-sm font-semibold">{{ ordinal($loop->iteration) }} Visit</h4>

                                <div class="space-y-4">
                                    <div>
                                        <h4 class="text-gray-500 text-sm font-semibold">Date Visited</h4>
                                        <p class="text-sm">{{ \Carbon\Carbon::parse($visitation->date_visited)->isoformat('Do, MMMM Y') }}</p>
                                    </div>

                                    <div>
                                        <h4 class="text-gray-500 text-sm font-semibold">Observations</h4>
                                        <p class="text-sm">{{ $visitation->observation }}</p>
                                    </div>

                                    <div>
                                        <h4 class="text-gray-500 text-sm font-semibold">Remark</h4>
                                        <p class="text-sm">{{ $visitation->remark }}</p>
                                    </div>

                                    <hr>
                                @empty
                                    <p>No visitation yet for this farm.</p>
                                @endforelse


                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
