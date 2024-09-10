<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Song Details</h1>
        <div class="bg-white p-4 rounded shadow-md">
            <h2 class="text-xl font-semibold">{{ $song->title }}</h2>
                <p><strong>Title:</strong> {{ $song->title }}</p>
            <p><strong>Artist:</strong> {{ $song->artist }}</p>
            <p><strong>Genre:</strong> {{ $song->genre }}</p>
 
            <h3 class="text-lg font-semibold mt-4">Playlist</h3>
            <p><strong>Name:</strong> {{ $playlist->name }}</p>
            <p><strong>Tag:</strong> {{ $playlist->tag }}</p>

            <a href="{{ route('playlist.show', $playlist->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                Back to Playlist
            </a>
        </div>
    </div>
</x-app-layout>
