<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Cinema
        </h2>
    </x-slot>
    <div class="max-w-full mx-auto sm:px-3 lg:px-4 mt-6 ">
        <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex items-start justify-start p-12">
                <div class="w-full max-w-[550px] ">
                    {{-- {{route('cinemas.update',$cinema->id)}} --}}
                    <form method="POST" action="{{route('cinemas.update',$cinema->id)}}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="mb-5">
                            <x-input-label>Cinema Name</x-input-label>
                            <input id="new_cinema" name="new_cinema"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md mb-4 @error('new_cinema') border-red-600 border-2 @enderror"
                                placeholder="Create New Cinema"
                                {{-- old('new_cinema') ?? --}}
                            value="{{ $cinema->cinema_name}}">
                            @error('new_cinema')
                                <p class="text-red-600 font-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <x-input-label>Cinema Image</x-input-label>
                            <input id="cinema_img" name="cinema_img"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md mb-4 @error('new_cinema') border-red-600 border-2 @enderror"
                                placeholder="Cinema image"
                                type="file"
                                value="{{ old('cinema_img') }}">
                            @error('cinema_img')
                                <p class="text-red-600 font-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <x-input-label>Location</x-input-label>
                            <input id="location" name="location"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md mb-3 @error('location') border-red-600 border-2 @enderror"
                                placeholder="Cinema Location"
                                value="{{ old('location') ?? $cinema->location}}">
                            @error('location')
                                <p class="text-red-600 font-bold">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <div class="mb-5">
                                <x-input-label>Total Screens</x-input-label>
                                <input type="number" name="num_screen" id="num_screen"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md @error('num_screen') border-red-600 border-2 @enderror"
                                    value="{{ old('num_screen') ?? $cinema->total_screens}}">
                                @error('num_screen')
                                    <p class="text-red-600 font-bold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="mb-5">
                                <x-input-label>Contact Number</x-input-label>
                                <input type="number" name="phone" id="phone""
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md @error('phone') border-red-600 border-2 @enderror"
                                    value="{{ old('phone') ?? $cinema->contact_number }}">
                                @error('phone')
                                    <p class="text-red-600 font-bold">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div>
                            <button type="submit"
                                class="hover:shadow-form w-full rounded-md bg-yellow-400 py-3 px-8 text-center text-base font-semibold text-black outline-none">
                                Update Cinema
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
