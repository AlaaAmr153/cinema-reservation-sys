<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Showtime
        </h2>
    </x-slot>
<div class="max-w-full mx-auto sm:px-3 lg:px-4 mt-6 ">
  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="flex items-start justify-start p-12">
        <div class="w-full max-w-[550px] ">
            <form method="POST" action="{{route('showtimes.store')}}">
                @csrf
                <input type="hidden" name="movie_id" id="movie_id" value="{{ old('movie_id') }}">
                <div class="mb-5">
                    <x-input-label>Choose Movie</x-input-label>
                    <div class="relative rounded-md border border-[#e0e0e0] font-medium text-[#6B7280]">
                        <div class="selectbox-header" id="selectboxHeader">
                            <img id="selectedImage" src="" alt="Selected Image"
                                class="selectbox-img">
                            <span id="selectedText">Choose a Movie</span>
                        </div>
                        <ul id="optionsList" class="selectbox-options">
                            @foreach ($movies as $movie )
                            <li class="selectbox-option" name="movie_id" data-value="{{old($movie->id)}}" data-image="{{ asset($movie->poster) }}" data-text="{{$movie->title}}">
                                <img src="{{ asset($movie->poster) }}" alt="Option 1" class="option-img">
                                <span>{{$movie->title}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                        @error('movie')
                        <p class="text-red-600 font-bold">{{$message}}</p>
                        @enderror

                </div>

                        <div class="mb-5">
                    <x-input-label>Choose cinema</x-input-label>
                    <select id="cinema_id" name="cinema_id"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md mb-3">
                        <option value="{{old('screen_id')}}">Select Screen</option>
                        @foreach ($cinemas as $cinema)
                        <option value="{{$cinema->id}}" {{ old('cinema_id') == $cinema->id ? 'selected' : '' }}>{{$cinema->cinema_name}}</option>
                        @endforeach
                </select>

                            @error('screen')
                            <p class="text-red-600 font-bold">{{$message}}</p>
                            @enderror

                    </div>

            <div class="mb-5">
                <x-input-label>Choose Screen</x-input-label>
                <select id="screen_id" name="screen_id"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md mb-3">
                    <option value="">Select Screen</option>
                    @foreach ($screens as $screen )
                    <option value="{{$screen->id}}">{{$screen->screen_code}}</option>
                    @endforeach
            </select>

                        @error('screen')
                        <p class="text-red-600 font-bold">{{$message}}</p>
                        @enderror

                </div>
                    <div class="w-full">
                        <div class="mb-5">
                            <x-input-label>Choose Movie</x-input-label>
                            <select id="movie" name="movie_id"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md mb-4">
                                <option value="">Select Movie</option>
                                @foreach ($movies as $id => $poster)
                                    <option value="{{ $id }}">{{ $poster }}</option>
                                @endforeach
                            </select @error('movie') <p class="text-red-600 font-bold">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="mb-5">
                            <x-input-label>Choose Screen</x-input-label>
                            <select id="screen" name="screen_id"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md mb-3">
                                <option value="">Select Screen</option>
                                @foreach ($screens as $id => $screen_code)
                                    <option value="{{ $id }}">{{ $screen_code }}</option>
                                @endforeach
                            </select
                            @error('screen')
                            <p class="text-red-600 font-bold">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="w-full">
                            <div class="mb-5">
                                <x-input-label>Date</x-input-label>
                                <input type="date" name="date" id="date" value="{{ old('date') }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md" />

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
