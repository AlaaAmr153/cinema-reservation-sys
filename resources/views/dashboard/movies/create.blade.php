<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Add New Movie
        </h2>
    </x-slot>
    <div class="container p-7 w-full ">
        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data"
            class="p-6 rounded-lg shadow-md ">
            @csrf
            <div class="grid grid-rows-4 grid-flow-col gap-4">
                <div class="mb-4">
                    <label for="title" class="block text-white text-sm font-bold mb-2 capitalize">Title:</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                        class="form-input mt-1 block w-full rounded-md shadow-sm focus:outline-none border border-black/15 p-2">
                    @error('title')
                        <div class="p-2 bg-red-300 rounded my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-white text-sm font-bold mb-2">Description:</label>
                    <textarea id="description" name="description" value="{{ old('description') }}"
                        class="form-textarea mt-1 block w-full rounded-md shadow-sm border border-black/15 p-2"></textarea>
                    @error('description')
                        <div class="p-2 bg-red-300 rounded my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="cast" class="block text-white text-sm font-bold mb-2">Cast:</label>
                    <textarea id="cast" name="cast" value="{{ old('cast') }}"
                        class="form-textarea mt-1 block w-full rounded-md shadow-sm border border-black/15 p-2"></textarea>
                    @error('cast')
                        <div class="p-2 bg-red-300 rounded my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="genre_id" class="block text-white text-sm font-bold mb-2">Genre:</label>
                    <select name="genre_id[]" multiple
                        class="form-input mt-1 block w-full rounded-md shadow-sm focus:outline-none border border-black/15 p-2">
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                        @endforeach
                    </select>
                    @error('genre_id')
                        <div class="p-2 bg-red-300 rounded my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="director" class="block text-white text-sm font-bold mb-2">Director:</label>
                    <input id="director" name="director" value="{{ old('director') }}"
                        class="form-input mt-1 block w-full rounded-md shadow-sm focus:outline-none border border-black/15 p-2">
                    @error('director')
                        <div class="p-2 bg-red-300 rounded my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="duration" class="block text-white text-sm font-bold mb-2">Duration:</label>
                    <input id="duration" name="duration" value="{{ old('duration') }}"
                        class="form-input mt-1 block w-full rounded-md shadow-sm focus:outline-none border border-black/15 p-2">
                    @error('duration')
                        <div class="p-2 bg-red-300 rounded my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="release_date" class="block text-white text-sm font-bold mb-2">Release Date:</label>
                    <input id="release_date" name="release_date" type="date" value="{{ old('release_date') }}"
                        class="form-input mt-1 block w-full rounded-md shadow-sm focus:outline-none border border-black/15 p-2">
                    @error('release_date')
                        <div class="p-2 bg-red-300 rounded my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="rating" class="block text-white text-sm font-bold mb-2">Rating:</label>
                    <input id="rating" name="rating" value="{{ old('rating') }}"
                        class="form-input mt-1 block w-full rounded-md shadow-sm focus:outline-none border border-black/15 p-2">
                    @error('rating')
                        <div class="p-2 bg-red-300 rounded my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="country_id" class="block text-white text-sm font-bold mb-2">Country:</label>
                    <select name="country_id"
                        class="form-input mt-1 block w-full rounded-md shadow-sm focus:outline-none border border-black/15 p-2">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                    @error('country_id')
                        <div class="p-2 bg-red-300 rounded my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="poster" class="block text-white text-sm font-bold mb-2">Movie Poster:</label>
                    <input type="file" id="poster" name="poster"
                        class="form-input mt-1 block w-full rounded-md shadow-sm focus:outline-none border border-black/15 p-2">
                    @error('poster')
                        <div class="p-2 bg-red-300 rounded my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-white text-sm font-bold mb-2">Movie Images:</label>
                    <input type="file" id="image" name="image[]" multiple
                        class="form-input mt-1 block w-full rounded-md shadow-sm focus:outline-none border border-black/15 p-2">
                    @error('image')
                        <div class="p-2 bg-red-300 rounded my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="trailer" class="block text-white text-sm font-bold mb-2">Trailer:</label>
                    <input id="trailer" name="trailer" type="url" value="{{ old('trailer') }}"
                        class="form-input mt-1 block w-full rounded-md shadow-sm focus:outline-none border border-black/15 p-2">
                    @error('trailer')
                        <div class="p-2 bg-red-300 rounded my-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-600">Add
                Movie</button>
        </form>
    </div>
</x-app-layout>
