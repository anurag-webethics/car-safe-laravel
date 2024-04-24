<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public $currentUser;
    public function __construct()
    {
        $this->currentUser = Auth::user();
    }

    public function showAlbum()
    {
        return view('album.album');
    }

    public function album(Request $request)
    {
        $validated = $request->validate([
            'albumName' => 'required',
            'albumImage' => 'required',
        ]);
        
        $albums = new Album();
        $albums->album_name = $request->albumName;
        $albums->user_id = $this->currentUser->id;
        $file = $request->file('albumImage');
        if (!empty($file)) {
            $filePath = $file->store('albumimage', 'public');
            $albums->album_cover = $filePath;
        }
        $albums->save();
        return redirect('album-gallery')->with('message','Album create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //$this->currentUser->id
        $albums = Album::where('user_id', $this->currentUser->id)->get();
        return view('album.album-gallery', compact('albums'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        //
    }
}
