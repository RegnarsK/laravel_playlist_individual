<x-app-layout>
    <div class="w-full rounded overflow-hidden shadow-lg p-4 bg-white mb-4">
        <div class="flex justify-between">
            <div>       
                <a class="font-bold text-xl mb-2" href="{{ route('playlist.show', $playlist->id) }}">
                    {{ $playlist->name }}
                </a>
                <div class="px-6 pt-4 pb-2">
                    <span class="inline-block shadow-lg bg-gray-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $playlist->tag }}</span>
                </div>
            </div>
            <div>
                <a href="{{ route('playlist.edit', $playlist->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Edit
                </a>
                <a href="{{ route('songs.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Add Song
                </a>
                <form action="{{ route('playlist.destroy', $playlist->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        <div class="px-20 pt-5 pb-5">
            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Artist</th>
                        
                        <th>Genre</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach($playlist->songs as $song)
                        <tr>
                            <td>{{ $song->title }}</td>
                            <td>{{ $song->artist }}</td>
                        
                            <td>{{ $song->genre }}</td>
                            <td>
                                <a href="{{ route('songs.show', $song->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                    View
                                </a>
                                <a href="{{ route('songs.edit', $song->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('songs.destroy', $song->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
