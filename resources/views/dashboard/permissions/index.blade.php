<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Permissions
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session()->has('message'))
                        <div
                            class="flex justify-left items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-100 bg-green-800 border border-green-700 ">
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

                <form class="sm:px-6 lg:px-8" method="get" action="{{ route('permissions.index') }}">
                    <div>
                        <x-input-label>Search</x-input-label>
                        <x-text-input name="search"></x-text-input>
                    </div>
                </form>


                <div class="flex justify-end m-3">
                    <x-button-link>
                        Add New Permission
                        <x-slot name="href">{{ route('permissions.create') }}</x-slot>
                    </x-button-link>
                </div>

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
                                                #
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Permission Name
                                            </th>

                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($permissions as $key=> $permission)
                                            <tr
                                                class="bg-white border-b text-center transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                                    {{ $permissions->firstItem() + $key }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    {{ $permission->name}}

                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    <div class="flex justify-evenly">
                                                        <div>
                                                            <a href="{{ route('permissions.edit', $permission->id) }}">
                                                                <i class="fa-solid fa-pen-to-square text-lg"></i></a>
                                                        </div>
                                                        <div>
                                                            <form method="post"
                                                                action="{{ route('permissions.destroy', $permission->id) }}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit"><i
                                                                        class="fa-solid fa-trash text-lg"
                                                                        style="color: #ff0000;"></i>
                                                                </button>
                                                            </form>
                                                        </div>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr
                                                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td colspan="4"
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    No Permissions Yet
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="mt-2">{{ $permissions->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
