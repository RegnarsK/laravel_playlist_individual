<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Song</h1>

        <!-- Display success message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('songs.update', $song->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $song->title) }}" class="form-input mt-1 block w-full" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="artist" class="block text-gray-700">Artist</label>
                <input type="text" id="artist" name="artist" value="{{ old('artist', $song->artist) }}" class="form-input mt-1 block w-full" required>
                @error('artist')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="genre" class="block text-gray-700">Genre</label>
                <input type="text" id="genre" name="genre" value="{{ old('genre', $song->genre) }}" class="form-input mt-1 block w-full">
                @error('genre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="playlist_id" class="block text-gray-700">Playlist</label>
                <select id="playlist_id" name="playlist_id" class="form-select mt-1 block w-full" required>
                    @foreach ($playlists as $playlist)
                        <option value="{{ $playlist->id }}" {{ $playlist->id == $song->playlist_id ? 'selected' : '' }}>
                            {{ $playlist->name }}
                        </option>
                    @endforeach
                </select>
                @error('playlist_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Update Song
            </button>
        </form>
    </div>
</x-app-layout>
