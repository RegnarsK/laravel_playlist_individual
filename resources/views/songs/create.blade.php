<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add New Song</h1>
        <form action="{{ route('songs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="artist" class="block text-sm font-medium text-gray-700">Artist</label>
                <input type="text" id="artist" name="artist" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

           

            

            <div class="mb-4">
                <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                <input type="text" id="genre" name="genre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

           

            <div class="mb-4">
                <label for="playlist_id" class="block text-sm font-medium text-gray-700">Playlist</label>
                <select id="playlist_id" name="playlist_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @foreach($playlists as $playlist)
                        <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add Song
            </button>
        </form>
    </div>
</x-app-layout>
