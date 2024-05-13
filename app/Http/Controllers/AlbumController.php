<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */

    public function showAlbum()
    {
        return view('album.album');
    }

    public function album(AlbumRequest $request)
    {
        
        $albums = new Album();
        $albums->album_name = $request->album_name;
        $albums->user_id = Auth::user()->id;
        $file = $request->file('album_image');
        if (!empty($file)) {
            $filePath = $file->store('albumimage', 'public');
            $albums->album_cover = $filePath;
        }
        $albums->save();
        return redirect('album/view')->with('message','Album create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //$this->currentUser->id
        $albums = Album::where('user_id', Auth::user()->id)->get();
        return view('album.album-gallery', compact('albums'));
    }

}
