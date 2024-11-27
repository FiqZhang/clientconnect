<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('nav_lang.Management') }}
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
 <div class="container-fluid d-flex justify-content-center align-items-center " style="max-width: 1400px; margin: 0 auto;">
     <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 " >
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">
                {{ __('manage_lang.Customer Management') }}
            </h3>
            <a href="{{ route('customers.index') }}" 
                class="btn btn-info d-flex justify-content-center align-items-center" 
                style="width: 200px; height: 50px;">
                <img src="{{ asset('logo/cust.png') }}" alt="Icon" 
                        style="width: 40px; height: 40px;">
            </a>
        </div>
        <div class="p-6">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">
                {{ __('manage_lang.Ticket Management') }}
            </h3>
            <a href="{{ route('tickets.index') }}" 
                class="btn btn-primary d-flex justify-content-center align-items-center" 
                style="width: 200px; height: 50px;">
                <img src="{{ asset('logo/ticket.png') }}" alt="Icon" 
                        style="width: 40px; height: 40px;">
            </a>
          
        </div>
    </div>
</div>
    <!-- End of Customer Management Card -->
</div>
</x-app-layout>
