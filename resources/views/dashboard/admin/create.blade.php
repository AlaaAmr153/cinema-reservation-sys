<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Admin
        </h2>
    </x-slot>

    <div class="max-w-full mx-auto sm:px-3 lg:px-4 mt-6 ">
        <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex items-start justify-start p-12">
                <div class="w-full max-w-[550px] ">
                    <form method="POST" action="{{ route('admins.store') }}">
                        @csrf

                        <div class="w-full">
                            <div class="mb-5">
                                <x-input-label>Name</x-input-label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md" />

                                <!-- Error Message -->
                                @error('name')
                                    <p class="text-red-600 font-bold">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="w-full">
                            <div class="mb-5">
                                <x-input-label>Email</x-input-label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md" />

                                <!-- Error Message -->
                                @error('email')
                                    <p class="text-red-600 font-bold">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="w-full">
                            <div class="mb-5">
                                <x-input-label>Password</x-input-label>
                                <input type="password" name="password" id="password" value="{{ old('password') }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md" />

                                <!-- Error Message -->
                                @error('password')
                                    <p class="text-red-600 font-bold">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>

                        <div class="mb-5 ">
                            <x-input-label>Choose Role</x-input-label>
                            <div class="flex space-x-4">
                                @foreach ($roles as $role)
                                    <div
                                        class="flex items-center bg-white ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="bordered-radio-1" type="radio" value="{{ $role->name }}"
                                            name="role"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="bordered-radio-1"
                                            class=" py-4 pr-6 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Error Message -->
                            @error('role')
                                <p class="text-red-600 font-bold">{{ $message }}</p>
                            @enderror

                        </div>


                        <div class="w-full">
                            <div class="mb-5">


                                <h3 class="mb-4 font-semibold text-white dark:text-white">Permissions</h3>
                                <ul
                                    class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @foreach ($permissions as $permission )
                                    <li
                                        class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="vue-checkbox-list" type="checkbox" value="{{$permission->name}}" name="permission"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="vue-checkbox-list"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$permission->name}}</label>
                                        </div>
                                    </li>
                                    @endforeach
                                    <li
                                        class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="react-checkbox-list" type="checkbox" value=""
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="react-checkbox-list"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Update</label>
                                        </div>
                                    </li>
                                    <li
                                        class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="angular-checkbox-list" type="checkbox" value=""
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="angular-checkbox-list"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Delete</label>
                                        </div>
                                    </li>
                                </ul>


                                <!-- Error Message -->
                                @error('permission')
                                    <p class="text-red-600 font-bold">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>

                        <div>
                            <button
                                class="hover:shadow-form w-full mt-5 rounded-md bg-yellow-400 py-3 px-8 text-center text-base font-semibold text-black outline-none">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
