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
                <div class="mb-5">
                    <x-input-label>Choose Movie</x-input-label>
                    <select id="company" name="company"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md mb-4">
                        <option value="">Select Movie</option>
                        <option value="1">Company A</option>
                    </select

                        @error('movie')
                        <p class="text-red-600 font-bold">{{$message}}</p>
                        @enderror

                </div>
            <div class="mb-5">
                <x-input-label>Choose Screen</x-input-label>
                <select id="company" name="company"
                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md mb-3">
                    <option value="">Select Screen</option>
                    {{-- @foreach ( as ) --}}
                    <option value="1">Company A</option>
                    {{-- @endforeach --}}
                </select

                        @error('screen')
                        <p class="text-red-600 font-bold">{{$message}}</p>
                        @enderror

                </div>
                    <div class="w-full">
                        <div class="mb-5">
                            <x-input-label>Date</x-input-label>
                            <input type="date" name="date" id="date" value="{{old('date')}}"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md" />

                                @error('date')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror

                        </div>
                    </div>
                    <div class="w-full">
                        <div class="mb-5">
                            <x-input-label>Time</x-input-label>
                            <input type="time" name="time" id="time" value="{{old('time')}}"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md" />

                                @error('time')
                                <p class="text-red-600 font-bold">{{$message}}</p>
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
