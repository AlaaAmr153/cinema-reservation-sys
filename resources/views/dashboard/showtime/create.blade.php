<x-app-layout >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Showtime
        </h2>
    </x-slot>

    <div class="max-w-full mx-auto sm:px-3 lg:px-4 mt-6 ">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex items-start justify-start p-12">
                <div class="w-full max-w-[550px] ">
                    <form method="POST" action="{{ route('showtimes.store') }}">
                        @csrf
                        <div class="mb-5">
                            <x-input-label>Choose Movie</x-input-label>
                            {{-- <div class="relative rounded-md border bg-white border-[#e0e0e0] font-medium text-[#6B7280]">
                                <!-- Selectbox Header -->
                                <div class="selectbox-header cursor-pointer" id="selectboxHeader"
                                    onclick="toggleOptions()">
                                    <img id="selectedImage" src="" alt="Selected Image" class="selectbox-img">
                                    <span id="selectedText">Choose a Movie</span>
                                </div>

                                <!-- Movie Options -->
                                <ul id="optionsList" class="selectbox-options hidden">
                                    @foreach ($movies as $movie)
                                        <li class="selectbox-option cursor-pointer"
                                            onclick="selectMovie('{{ $movie->id }}')">
                                            <img src="{{ asset($movie->poster) }}" alt="{{ $movie->title }}"
                                                class="option-img">
                                            <span>{{ $movie->title }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <input type="hidden" name="movie_id" id="selectedMovieId"> --}}
                            <select id="movie_id" name="movie_id"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md mb-3">
                                <option value="">Select movie</option>
                                @foreach ($movies as $movie)
                                    <option value="{{ $movie->id }}"
                                        {{ old('movie_id') == $movie->id ? 'selected' : '' }}>
                                        {{ $movie->title }}</option>
                                @endforeach
                            </select>

                            <!-- Error Message -->
                            @error('movie_id')
                                <p class="text-red-600 font-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Cinema Options -->
                        <div class="mb-5">
                            <x-input-label>Choose cinema</x-input-label>
                            <select id="cinema_id" name="cinema_id"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md mb-3"
                                onchange="getScreens(this.value)">
                                <option value="">Select cinema</option>
                                @foreach ($cinemas as $cinema)
                                    <option value="{{ $cinema->id }}"
                                        {{ old('cinema_id') == $cinema->id ? 'selected' : '' }}>
                                        {{ $cinema->cinema_name }}</option>
                                @endforeach
                            </select>

                            <!-- Error Message -->
                            @error('cinema_id')
                                <p class="text-red-600 font-bold">{{ $message }}</p>
                            @enderror

                        </div>



                        <!-- Screen Options -->
                        <div class="mb-5">
                            <x-input-label>Choose Screen</x-input-label>
                            <select id="screen_id" name="screen_id"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md mb-3">
                                <option value="">Select Screen</option>

                            </select>

                            <!-- Error Message -->
                            @error('screen_id')
                                <p class="text-red-600 font-bold">{{ $message }}</p>
                            @enderror

                        </div>



                        <div class="w-full">
                            <div class="mb-5">
                                <x-input-label>Date</x-input-label>
                                <input type="date" name="date" id="date" value="{{ old('date') }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md" />

                                <!-- Error Message -->
                                @error('date')
                                    <p class="text-red-600 font-bold">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="w-full">
                            <div class="mb-5">
                                <x-input-label>Time</x-input-label>
                                <input type="time" name="time" id="time" value="{{ old('time') }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md" />

                                <!-- Error Message -->
                                @error('time')
                                    <p class="text-red-600 font-bold">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div>
                            <button
                            class="hover:shadow-form w-full rounded-md bg-black py-3 px-8 text-center text-base font-semibold text-white outline-none">
                            
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
