<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Management') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
     <!-- Customer Management Card -->
     <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">
                {{ __('Customer Management') }}
            </h3>
            {{-- <p class="text-gray-700 dark:text-gray-300 mt-2">
                Manage customer information  details.
            </p> --}}
            <a href="{{ route('customers.index') }}" class="btn btn-info" style="width: 300px; height: 40px;">
                Go to Customer Management
            </a>
            {{-- <a href="{{ route('tickets.index') }}" class="mt-4 inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                Go to Ticket Management
            </a> --}}
        </div>
        <div class="p-6">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">
                {{ __('Ticket Management') }}
            </h3>
            {{-- <p class="text-gray-700 dark:text-gray-300 mt-2">
                Manage ticket information details.
            </p> --}}
            <a href="{{ route('tickets.index') }}" class="btn btn-primary" style="width: 300px; height: 40px;">
                Go to Ticket Management
            </a>           
        </div>
    </div>
    <!-- End of Customer Management Card -->
</div>
</x-app-layout>
