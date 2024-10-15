<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Permission
        </h2>
    </x-slot>

    <div class="max-w-full mx-auto sm:px-3 lg:px-4 mt-6 ">
        <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex items-start justify-start p-12">
                <div class="w-full max-w-[550px] ">
                    <form method="POST" action="{{ route('permissions.store') }}">
                        @csrf
                        <div class="w-full">
                            <div class="mb-5">
                                <x-input-label>Permission Name</x-input-label>
                                <input type="text" name="permission" id="permission" value="{{ old('permission') }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-black focus:shadow-md" />

                                <!-- Error Message -->
                                @error('permission')
                                    <p class="text-red-600 font-bold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <button
                                class="hover:shadow-form w-full mt-5 rounded-md bg-yellow-400 py-3 px-8 text-center text-base font-semibold text-black outline-none">
                                Save Permission
                            </button>
                        </div>

                        <div>
                            <button
                                class="hover:shadow-form w-full mt-5 rounded-md bg-yellow-400 py-3 px-8 text-center text-base font-semibold text-black outline-none">
                                Save Permission
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
