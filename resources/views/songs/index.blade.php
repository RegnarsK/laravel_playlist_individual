@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Songs List</h1>
    <a href="{{ route('songs.create') }}" class="btn btn-primary">Add New Song</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Artist</th>  
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($songs as $song)
            <tr>
                <td>{{ $song->title }}</td>
                <td>{{ $song->artist }}</td>
                <td>{{ $song->genre }}</td>
                <td>
                    <a href="{{ route('songs.show', $song) }}" class="btn btn-info">View</a>
                    <a href="{{ route('songs.edit', $song) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('songs.destroy', $song) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
