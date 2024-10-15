<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Screen
        </h2>
    </x-slot>

                    <!-- component -->

                    <section class="bg-white dark:bg-gray-900">
                        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit screen</h2>
                            <form action="{{ route('screens.update',['id' => $screen->id])}}" method="POST">
                            @csrf
                            @method('PATCH')
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                                <div>
                                    <label for="cinema" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cinema</label>
                                        <select name="cinema_id" id="cinema" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required>
                                            <option value="">Select a Cinema</option>
                                            @foreach($cinemas as $cinema)
                                                <option value="{{ $cinema->id }}" {{ $screen->cinema_id == $cinema->id ? 'selected' : '' }}>{{ $cinema->cinema_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('cinema_id')
                                            <div class="p-2 dark:text-red-300  my-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Screen Code</label>
                                        <input type="text" name="screen_code" value="{{old('screen_code') ?? $screen -> screen_code}}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="">
                                    @error('screen_code')
                                        <div class="p-2 dark:text-red-300  my-2">{{$message}}</div>
                                    @enderror
                                    </div>
                                    <div class="w-full">
                                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seat Capacity</label>
                                        <input type="number" name="seat_capacity" value="{{old('seat_capacity') ?? $screen -> seat_capacity}}" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="">
                                    @error('seat_capacity')
                                        <div class="p-2 dark:text-red-300  my-2">{{$message}}</div>
                                    @enderror
                                    </div>
                                    <div class="w-full">
                                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Screen Type</label>
                                        <input type="text" name="screen_type" value="{{old('screen_type') ?? $screen -> screen_type}}" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="">
                                    @error('screen_type')
                                        <div class="p-2 dark:text-red-300  my-2">{{$message}}</div>
                                    @enderror
                                    </div>

                                    <!-- <div>
                                        <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cinema Id</label>
                                        <input type="number" name="cinema_id" value="{{old('cinema_id') ?? $screen -> cinema_id}}" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="">
                                    @error('cinema_id')
                                        <div class="p-2 dark:text-red-300  my-2">{{$message}}</div>
                                    @enderror
                                    </div> -->
                                    <!-- <div>
                                        <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Under Maintainance</label>
                                        <input type="boolean" name="under_maintainance" value="{{old('under_maintainance') ?? $screen -> under_maintainance}}" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                    @error('under_maintainance')
                                        <div class="p-2 dark:text-red-300  my-2">{{$message}}</div>
                                    @enderror
                                    </div> -->




                                </div>

                                <div class="flex items-start mb-5 mt-6">
                                            <div class="flex items-center h-5 ">
                                            <input id="terms" type="checkbox" name="under_maintainance"  class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" value="1"{{ $screen->under_maintainance ? 'checked' : '' }} />
                                            </div>
                                            <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Under Maintainance </label>
                                            @error('under_maintainance')
                                                <div class="p-2 dark:text-red-300  my-2">{{ $message }}</div>
                                            @enderror
                                    </div>

                                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 bg-black dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                    Update
                                </button>
                            </form>
                        </div>
                        </section>

</x-app-layout>
