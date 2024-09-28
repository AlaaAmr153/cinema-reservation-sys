<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Movies
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session()->has('message'))
                        <div
                            class="flex justify-left items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-700 ">
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

                <form class="sm:px-6 lg:px-8" method="get" action="{{ route('movies.index') }}">
                    <div>
                        <x-input-label>Search</x-input-label>
                        <x-text-input name="search"></x-text-input>
                    </div>
                </form>


                <div class="flex justify-end m-3">
                    <x-button-link>
                        Add New Movie
                        <x-slot name="href">{{ route('movies.create') }}</x-slot>
                    </x-button-link>
                </div>

                @if (session('success'))
                    <div class="p-2 bg-green-300 rounded my-2 mx-auto w-fit">
                        {{ session('success') }}
                    </div>
                @endif

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
                                                Image
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Title
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Description
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Duration
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Release Date
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Director
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Cast
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Country
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                trailer_url
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($movies as $movie)
                                            <tr
                                                class="bg-white border-b text-center transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                                    @if (Storage::disk('public')->exists($movie->poster))
                                                        <img src="{{ asset('storage/' . $movie->poster) }}">
                                                    @else
                                                        <img src="{{ asset($movie->poster) }}">
                                                    @endif
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    {{ $movie->title }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap"
                                                    x-data="{ open: false }">
                                                    <button @click="open=true" class="text-blue-500">View
                                                        Description</button>
                                                    <div x-show="open">
                                                        <div class="bg-white p-6 rounded shadow-lg relative">
                                                            <p class="text-gray-900" id="description">
                                                                {!! nl2br(str_replace(',', ',<br>', $movie->description)) !!}</p>
                                                            <button @click="open = false"
                                                                class="absolute top-4 right-4 text-gray-600">X</button>
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    {{ $movie->duration }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    {{ $movie->release_date }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    {{ $movie->director }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap"
                                                    x-data="{ open: false }">
                                                    <button @click="open=true" class="text-blue-500">View
                                                        Cast</button>
                                                    <div x-show="open">
                                                        <div class="bg-white p-6 rounded shadow-lg relative">
                                                            <p class="text-gray-900">
                                                                {!! nl2br(str_replace(',', ',<br>', $movie->cast)) !!}</p>
                                                            <button @click="open = false"
                                                                class="absolute top-4 right-4 text-gray-600">X</button>
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    {{ $movie->country->country_name }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    <a href={{ $movie->trailer_url }}
                                                        class="text-blue-500">{{ $movie->title }} Trailer</a>
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    <div class="flex justify-evenly">
                                                        <div>
                                                            <a href="{{ route('movies.images', $movie->id) }}">
                                                                <i class="fa-regular fa-image text-lg"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('movies.edit', $movie->id) }}">
                                                                <i class="fa-solid fa-pen-to-square text-lg"></i></a>
                                                        </div>
                                                        <div>
                                                            <form method="post"
                                                                action="{{ route('movies.delete', $movie->id) }}">
                                                                @method('DELETE')
                                                                @csrf <button type="submit"><i
                                                                        class="fa-solid fa-trash text-lg"
                                                                        style="color: #ff0000;"></i>
                                                                </button>
                                                            </form>
                                                        </div>

                                                </td>
                                            </tr>

                                            {{-- <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td colspan="4"
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    No Movies Yet
                                                </td>
                                            </tr> --}}
                                        @endforeach
                                    </tbody>
                                </table>
                                @endforeach
                                </tbody>
                                </table>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
