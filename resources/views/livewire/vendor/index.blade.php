<div class="w-5/6">
    <div class="p-1 lg:p-1 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
        <div class="p-10 grid grid-cols-2 gap-8 justify-between">
            <div class="space-y-4">
                <button wire:click="exportVendorsToExcel"  type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                    <span wire:loading.remove wire:target="exportVendorsToExcel">Export</span>
                        <span wire:loading wire:target="exportVendorsToExcel">
                            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                            Exporting...
                        </span>
                </button>
                <script>
                    document.addEventListener('export-started', event => {
                        alert(event.detail.message); 
                    });
                </script>
            </div>

            <div class="space-y-4 w-52 justify-self-end">
                <input wire:model.debounce.500ms="search"  type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required />

            </div>
            
        </div>
        <div>  
            @if($notifications->isNotEmpty())  
            <div>  
              @foreach($notifications as $notification) 
              <div class="p-2">
                <span id="badge-dismiss-default" class="inline-flex items-center px-2 py-1 me-2 text-sm font-medium text-blue-800 bg-blue-100 rounded dark:bg-blue-900 dark:text-blue-300">
                    {{ $notification->data['message'] }}&nbsp;<a href="{{ $notification->data['download_link'] }}" class="font-bold text-blue-500 hover:text-blue-800"> Click to download</a>
                    <button onclick="confirm('Are you sure you want to trash this?') || event.stopImmediatePropagation()" wire:click="deleteNotification('{{ $notification->id }}')" type="button" class="inline-flex items-center p-1 ms-2 text-sm text-blue-400 bg-transparent rounded-sm hover:bg-blue-200 hover:text-blue-900 dark:hover:bg-blue-800 dark:hover:text-blue-300" data-dismiss-target="#badge-dismiss-default" aria-label="Remove">
                    <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Remove badge</span>
                    </button>
                    </span>
                </div>
              @endforeach  
            </div>  
            @endif 
             
          </div>
        <!-- Livewire Polling -->
        <script>
            Livewire.on('exportCompleted', () => {
                Livewire.emit('refreshNotifications');
            });
        </script>
        <!-- refreshing every 5 sec -->
        <div wire:poll.5s="refreshNotifications"></div>
        <h4 class="text-2xl font-bold pl-7">Hub List</h4>
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
                                Hub
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Manager
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
                        @forelse ($vendors as $key => $vendor)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $key+1 }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('vendor.show', ['uuid' => $vendor->uuid]) }}" class="hover:text-blue-300 hover:underline">
                                        {{ $vendor->business_name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $vendor->user->firstname }} {{ $vendor->user->lastname }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $vendor->user->phone }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $vendor->state->name }}, {{ $vendor->lga->name }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('vendor.show', ['uuid' => $vendor->uuid]) }}" class="bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded text-white">View</a>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <p class="text-red-300">No vendor found</p>
                            </td>

                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
        <div class="p-4">
            {{ $vendors->links() }}
        </div>
    </div>
</div>