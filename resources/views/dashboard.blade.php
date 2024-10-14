<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-center">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-xl leading-12">
                    <p class="font-bold"> Welcome {{Auth::user()->name}} To The Dashboard</p><br>
                    {{ __("If you want to check the clientside you can click the button") }}
                </div>
                <form action="{{ route('movies.clientIndex') }}" method="GET">
                <button class="hover:shadow-form mb-6 rounded-md bg-yellow-400 py-3 px-8 text-center text-base font-semibold text-black outline-none">Main Site</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
