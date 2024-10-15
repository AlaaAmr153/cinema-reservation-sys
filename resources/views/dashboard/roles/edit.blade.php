<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Roles
        </h2>
    </x-slot>
    <div class="max-w-full mx-auto sm:px-3 lg:px-4 mt-6 ">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex items-start justify-start p-12">
                <div class="w-full max-w-[550px] ">
                    <form method="POST" action="{{ route('roles.update', $role->id) }}">

                        @method('PATCH')
                        @csrf



                        <div class="w-full">
                            <div class="mb-5">
                                <x-input-label>Role Name</x-input-label>
                                <input type="text" name="role" id="role" value="{{ old('role') }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md" />

                                <!-- Error Message -->
                                @error('role')
                                    <p class="text-red-600 font-bold">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>


                        <div>
                            <button
                                class="hover:shadow-form w-full mt-5 rounded-md bg-yellow-400 py-3 px-8 text-center text-base font-semibold text-black outline-none">
                                update Role
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
