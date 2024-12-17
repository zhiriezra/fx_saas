<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('farmers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-4">

            @include('components.sales-submenu')

            <div class="w-5/6">
                <div class="p-6 lg:p-6 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <p class="text-gray-500 dark:text-gray-400 leading-relaxed">
                        Total farmers: {{  $farmers->count() }}
                    </p>
                </div>


                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

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
                                    @forelse ($farmers as $key => $farmer)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4">
                                                {{ $key+1 }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('assets/images/logo-mark.png') }}" alt="Img Here" />
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('farmer.show', ['uuid' => $farmer->uuid]) }}" class="hover:text-blue-300 hover:underline">
                                                    {{ $farmer->fname }} {{ $farmer->lname }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $farmer->mobile_no }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $farmer->state->name }}, {{ $farmer->lga->name }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('farmer.show', ['uuid' => $farmer->uuid]) }}" class="bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded text-white">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <p class="text-red-300">No farmers for deployed for your company</p>
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
