<div class="w-1/6 bg-white py-6 shadow-xl sm:rounded-lg overflow-y-auto max-h-screen h-full">

    <div class="space-y-4 text-center">
        <div class="border-0 border-b pb-6 font-semibold">
            Navigation
        </div>
        <a href="{{ route('vendors') }}" class="block p-2 hover:text-green-600 {{ request()->is('sales/vendors*') ? 'bg-gray-200': '' }} hover:bg-gray-200">Hubs (Vendors)</a>
        <a href="{{ route('farmers') }}" class="block p-2 hover:text-green-600 {{ request()->is('value-chain/farmers*') ? 'bg-gray-200': '' }} hover:bg-gray-200">Trainings</a>
        <a href="{{ route('farms') }}" class="block p-2 hover:text-green-600 {{ request()->is('value-chain/farms*') ? 'bg-gray-200': '' }} hover:bg-gray-200">Demos</a>
    </div>

</div>
