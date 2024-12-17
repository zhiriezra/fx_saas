<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Value-chain Insights') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
                       Monitoring & Evaluation
                    </h1>

                </div>


                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="bg-gray-100 dark:bg-gray-800 bg-opacity-25 grid grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

                        @livewire('charts.sample-farmers-chart')

                        @livewire('charts.threat-assessment-chart')

                        @livewire('charts.field-operations-chart')

                        @livewire('charts.input-distribution-chart')

                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
