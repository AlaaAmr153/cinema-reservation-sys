<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cinemas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session()->has('message'))
                        <div
                            class="flex justify-left items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-100 bg-green-800 border border-green-700 ">
                            <div slot="avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                            </div>
                            <div class="text-xl font-normal  max-w-full flex-initial">
                                <div class="py-2">This is a success messsage
                                    <div class="text-sm font-base">{{ session('message') }}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- <form class="sm:px-6 lg:px-8" method="get" action="{{ route('cinemas.index') }}">
                    <div>
                        <x-input-label>Search</x-input-label>
                        <x-text-input name="search"></x-text-input>
                    </div>
                </form> --}}


                <div class="flex justify-end m-3">
                    <x-button-link>
                        Add New Cinema
                        <x-slot name="href">{{ route('cinemas.create') }}</x-slot>
                    </x-button-link>
                </div>

                <!-- component -->
                <div class="flex flex-col w-full">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="bg-gray-200 border-b">
                                        <tr class="text-center">
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                #
                                            </th>

                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Cinema Image
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Cinema Name
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-1 py-4 text-center ">
                                                Location
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Total Screens
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Contact Number
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cinemas as $key => $cinema)
                                            <tr
                                                class="bg-white border-b text-center transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                                    {{ $cinemas->firstItem() + $key }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    <img src="{{ asset($cinema->cinema_img) }}" alt="cinema"
                                                        class="w-20 h-auto">
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    {{ $cinema->cinema_name }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap"
                                                x-data="{ open: false }">
                                                <button @click="open=true" class="text-blue-500">View
                                                    Location</button>
                                                <div x-show="open">
                                                    <div class="bg-white p-6 rounded shadow-lg relative">
                                                        <p class="text-gray-900" id="location">
                                                            {!! nl2br(str_replace(',', ',<br>',  $cinema->location  )) !!}</p>
                                                        <button @click="open = false"
                                                            class="absolute top-4 right-4 text-gray-600">X</button>
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    {{ $cinema->total_screens }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    {{ $cinema->contact_number }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    <div class="flex justify-evenly">
                                                        <div>
                                                            <a href="{{ route('cinemas.edit', $cinema->id) }}">
                                                                <i class="fa-solid fa-pen-to-square text-lg"></i></a>
                                                        </div>
                                                        <div>
                                                            <form method="POST"
                                                                action="{{ route('cinemas.delete', $cinema->id) }}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit">
                                                                    {{-- <a href="{{route('cinemas.delete',$cinema->id)}}"> --}}
                                                                    <i class="fa-solid fa-trash text-lg"
                                                                        style="color: #ff0000;"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                </td>
                                        </tr>
                                        @empty
                                        <tr
                                            class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                            <td colspan="4"
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                No Cinemas Yet
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                <div class="mt-2">{{ $cinemas->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
