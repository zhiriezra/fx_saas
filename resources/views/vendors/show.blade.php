<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __($vendor->user->firstname) }} {{ __($vendor->user->lastname ) }} --}}
            Vendor Information
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
                                <a href="{{  route('vendors') }}" class="hover:font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 text-blue-500 hover:text-blue-600">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-4.28 9.22a.75.75 0 0 0 0 1.06l3 3a.75.75 0 1 0 1.06-1.06l-1.72-1.72h5.69a.75.75 0 0 0 0-1.5h-5.69l1.72-1.72a.75.75 0 0 0-1.06-1.06l-3 3Z" clip-rule="evenodd" />
                                    </svg>

                                </a>
                                <img src="{{ $vendor->user->profile_image? : asset('assets/images/logo-mark.png') }}" alt="" class="shadow-md rounded-full border h-20 w-20">

                                <div class="flex flex-col">
                                    <h4 class="text-2xl font-semibold">{{ $vendor->user->firstname .' '. $vendor->user->lastname  }}</h4>
                                </div>
                            </div>
                            <div>
                                <span class="text-gray-600 font-semibold text-md">Joined: {{ $vendor->user->created_at->toFormattedDateString() }}</span>
                            </div>
                        </div>

                        <div class="p-10 grid grid-cols-4 gap-8 justify-between">

                            <div class="space-y-4">
                                <h4 class="uppercase text-gray-500 text-sm font-semibold">Vendor Bio</h4>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Email</h4>
                                    <p>{{ $vendor->user->email }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Phone</h4>
                                    <p>{{ $vendor->user->phone }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Data of Birth</h4>
                                    <p>{{ $vendor->dob }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Gender</h4>
                                    <p>{{ $vendor->gender }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Marital status</h4>
                                    <p>{{ $vendor->marital_status }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Mode Of Identification</h4>
                                    <p>{{ $vendor->identification_mode}}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Identification No.</h4>
                                    <p>{{ $vendor->identification_no}}</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <h4 class="uppercase text-gray-500 text-sm font-semibold">Location</h4>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">State/Province</h4>
                                    <p>{{ $vendor->state->name }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">LGA/Area</h4>
                                    <p>{{ $vendor->lga->name }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Permanent Address</h4>
                                    <p>{{ $vendor->permanent_address? : 'Not provided' }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Community</h4>
                                    <p>{{ $vendor->community? : 'Not provided' }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Community</h4>
                                    <p>{{ $vendor->community? : 'Not provided' }}</p>
                                </div>

                            </div>

                            <div class="space-y-4">
                                <h4 class="uppercase text-gray-500 text-sm font-semibold">Business Information</h4>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Business Name</h4>
                                    <p>{{ $vendor->business_name? : 'Not provided' }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Address</h4>
                                    <p>{{ $vendor->business_address? : 'Not provided' }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Registration Number</h4>
                                    <p>{{ $vendor->registration_no? : 'Not provided' }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Business Type</h4>
                                    <p>{{ $vendor->business_type? : 'Not provided' }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Business email</h4>
                                    <p>{{ $vendor->business_email? : 'Not provided' }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Business Mobile Number</h4>
                                    <p>{{ $vendor->business_mobile? : 'Not provided' }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">TIN Number</h4>
                                    <p>{{ $vendor->tin? : 'Not provided' }}</p>
                                </div>

                            </div>

                            <div class="space-y-4">
                                <h4 class="uppercase text-gray-500 text-sm font-semibold">Bank Details</h4>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Bank Name</h4>
                                    <p>{{ $vendor->bank_info->name? : 'Not provided' }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Account Name</h4>
                                    <p>{{ $vendor->account_name? : 'Not provided' }}</p>
                                </div>

                                <div class="bg-gray-100 rounded p-2">
                                    <h4 class="text-sm text-gray-500">Account Number</h4>
                                    <p>{{ $vendor->account_no? : 'Not provided' }}</p>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
