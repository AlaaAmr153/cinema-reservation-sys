<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ $movie->title }} Images
        </h2>
    </x-slot>
    <div class="flex justify-center mb-4">
        <form action="{{ route('movie_images.store', $movie->id) }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col items-center w-full max-w-lg">
            @csrf
            <div class="mb-3 w-full">
                <input type="file" id="image" name="image[]" multiple class="form-input w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-600">Add
                Image</button>
        </form>
    </div>
    <div class="grid grid-cols-5 gap-4 py-4">
        @foreach ($movie->movie_image as $image)
            <div class="relative w-48 h-48 cursor-pointer" onclick="openModal('{{ asset($image->img) }}')">
                @if (Storage::disk('public')->exists($image->img))
                    <img src="{{ asset('storage/' . $image->img) }}" class="w-full h-full object-fill rounded-lg shadow-lg">
                @else
                    <img src="{{ asset($image->img) }}" class="w-full h-full object-fill rounded-lg shadow-lg">
                @endif
                <form action="{{ route('movie_images.destroy', $image->id) }}" method="POST"
                    class="absolute top-2 right-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.stopPropagation()">
                        <i class="fa-solid fa-trash text-lg" style="color: #ff0000;"></i>
                    </button>
                </form>
            </div>
        @endforeach
    </div>
    </div>
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden"
        onclick="closeModal(event)">
        <div class="relative" onclick="event.stopPropagation()">
            <img id="modalImage" src="" alt="Enlarged Image" class="max-w-full max-h-screen">
            <button onclick="closeModal()" class="absolute top-4 right-4 text-white text-2xl z-10">&times;</button>
        </div>
    </div>

    <script>
        function openModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function closeModal(event) {
            if (event.target.id === 'imageModal') {
                document.getElementById('imageModal').classList.add('hidden');
            }
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
