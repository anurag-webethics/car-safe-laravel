<?php
#/ sweetalert
namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */

    public function showImage($id)
    {
        return view('album.image', ['id' => $id]);
    }

    public function image(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);

        $file = count($request->file('image'));
        $fileName = $request->file('image');

        for ($i = 0; $i < $file; $i++) {
            $images = new Images();
            $images->album_id = $request->album_id;
            if (!empty($fileName)) {
                $filePath = $fileName[$i]->store('images', 'public');
                $images->images = $filePath;
            }
            $images->save();
        }
        return redirect('images/' . $request->album_id . '/view')->with('success', 'Image upload successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Images $images, $id)
    {
        $images = $images::where('album_id', $id)->orderBy('id', 'DESC')->paginate(6);
        return view('album.image-gallery', ['id' => $id, 'images' => $images]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Images $images, $id)
    {
        $file_path = Images::findOrFail($id);
        $images = $file_path->images;
        Storage::disk('public')->delete($images);
        $images = $file_path->delete();
        return back()->with('success', 'Image deleted successfully');;
    }
}
