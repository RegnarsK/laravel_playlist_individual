<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Playlist;
use Illuminate\Http\Request;

class SongController extends Controller
{
    
    public function index()
    {
        $playlists = Playlist::all();
        return view('songs.create', compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $playlists = Playlist::all();
        return view('songs.create', compact('playlists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'genre' => 'required',
            'playlist_id' => 'required|exists:playlists,id'
        ]);

        Song::create([
            'title' => $request->input('title'),
            'artist' => $request->input('artist'),
            'genre' => $request->input('genre'),
            'playlist_id' => $request->input('playlist_id')
        ]);

        return redirect()->route('playlist.show', $request->input('playlist_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $song = Song::findOrFail($id);
        $playlist = $song->playlist; // Assuming a 'playlist' relationship is defined on the Song model
        
        return view('songs.show', compact('song', 'playlist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $song = Song::findOrFail($id);
        $playlists = Playlist::all(); // Retrieve all playlists for the dropdown or selection

        return view('songs.edit', compact('song', 'playlists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'genre' => 'required',
            'playlist_id' => 'required|exists:playlists,id'
        ]);
    
        // Fetch the song from the database
        $song = Song::findOrFail($id);
    
        // Check if the user has the right to update this song (optional, based on your logic)
        if ($request->user()->id == auth()->user()->id) {
            // Update the song
            $song->update([
                'title' => $request->input('title'),
                'artist' => $request->input('artist'),
                'genre' => $request->input('genre'),
                'playlist_id' => $request->input('playlist_id')
            ]);
        }
    
        // Redirect to the playlist show page
        return redirect()->route('playlist.show', $song->playlist_id)->with('success', 'Song updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $song = Song::where('id', $id);

        $song->delete();

        return redirect('/playlist')->with('success', 'Song deleted successfully!');
    }
}
