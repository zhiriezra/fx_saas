<div class="w-1/6 bg-white py-6 shadow-xl sm:rounded-b-lg overflow-y-auto max-h-[350px] h-full">

    <div class="space-y-4 text-start">
        <div class="border-0 border-b pl-6 pb-6 font-semibold">
            Navigation
        </div>

        <a href="{{ route('agents') }}" class="block p-2 pl-6 hover:text-green-600 {{ request()->is('sales/agents*') ? 'bg-gray-200': '' }} hover:bg-gray-200">Agents</a>
        <a href="{{ route('farmers') }}" class="block p-2 pl-6 hover:text-green-600 {{ request()->is('sales/farmers*') ? 'bg-gray-200': '' }} hover:bg-gray-200">Farmers</a>
        <a href="{{ route('farms') }}" class="block p-2 pl-6 hover:text-green-600 {{ request()->is('sales/farms*') ? 'bg-gray-200': '' }} hover:bg-gray-200">Farm Seasons</a>
        <a href="{{ route('vendors') }}" class="block p-2 pl-6 hover:text-green-600 {{ request()->is('sales/vendors*') ? 'bg-gray-200': '' }} hover:bg-gray-200">Hubs (Vendors)</a>
        <a href="#" class="block p-2 pl-6 hover:text-green-600 hover:bg-gray-200">Trainings</a>
        <a href="#" class="block p-2 pl-6 hover:text-green-600 hover:bg-gray-200">Demos</a>
    </div>

</div>
