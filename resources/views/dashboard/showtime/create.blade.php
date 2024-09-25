<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Showtime
        </h2>
    </x-slot>
    <div class="flex items-start justify-start p-12">
        <div class="w-full max-w-[550px] ">
            <form method="POST" action="{{route('showtimes.store')}}">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-3 block text-base font-medium text-black">
                        Choose Movie
                    </label>
                    <input type="text" name="movie" id="name" placeholder="Full Name"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md" />

                        @error('movie')
                        <p class="text-red-600 font-bold">{{$message}}</p>
                        @enderror

                </div>
                <div class="mb-5">
                    <label for="" class="mb-3 block text-base font-medium text-black">
                        Choose Screen
                    </label>
                    <input type="text" name="screen" id="phone" placeholder="Enter your phone number"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md" />

                        @error('screen')
                        <p class="text-red-600 font-bold">{{$message}}</p>
                        @enderror

                </div>
                    <div class="w-full">
                        <div class="mb-5">
                            <label for="date" class="mb-3 block text-base font-medium text-black">
                                Date
                            </label>
                            <input type="date" name="date" id="date"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md" />

                                @error('date')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror

                        </div>
                    </div>
                    <div class="w-full">
                        <div class="mb-5">
                            <label for="time" class="mb-3 block text-base font-medium text-black">
                                Time
                            </label>
                            <input type="time" name="time" id="time"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md" />

                                @error('time')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror

                        </div>
                    </div>
                <div>
                    <button
                        class="hover:shadow-form w-full rounded-md bg-black py-3 px-8 text-center text-base font-semibold text-white outline-none">
                        Creat Showtime
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
