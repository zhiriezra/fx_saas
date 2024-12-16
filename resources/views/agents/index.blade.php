<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agents') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-4">

            @include('components.sales-submenu')

            <div class="w-5/6">
                <div class="p-6 lg:p-6 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <p class="text-gray-500 dark:text-gray-400 leading-relaxed">
                        Some stats go here
                    </p>
                </div>


                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    {{-- <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <x-application-logo class="block h-12 w-auto" />

                        <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
                            Welcome to your Jetstream application!
                        </h1>

                        <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                            Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                            to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
                            you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
                            ecosystem to be a breath of fresh air. We hope you love it.
                        </p>
                    </div> --}}

                    <div class="bg-gray-100 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 gap-6 lg:gap-8 p-6 lg:p-8">

                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Image
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Phone
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Location
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @forelse ($agents as $key => $agent)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4">
                                                {{ $key+1 }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('agent.show', ['uuid' => $agent->user->uuid]) }}" class="hover:text-blue-300 hover:underline">
                                                    {{ $agent->user->firstname }} {{ $agent->user->lastname }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $agent->user->phone }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $agent->state->name }}, {{ $agent->lga->name }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('agent.show', ['uuid' => $agent->user->uuid]) }}" class="bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded text-white">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <p class="text-red-300">No agents for deployed for your company</p>
                                        </td>

                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>


        </div>
    </div>
</x-app-layout>
