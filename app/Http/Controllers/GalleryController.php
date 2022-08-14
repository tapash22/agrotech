<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $gallerys = Gallery::all()->toArray();
        return array_reverse($gallerys);
    }

    public function add(Request $request)
    {
        $gname = $request->input('gname');
        $gimage = $request->file('gimage')->store('upload');

        $gallerys = new Gallery([
            'gname' => $gname,
            'gimage' => $gimage,
        ]);

        $gallerys->save();

        return response()->json('add gallery successfully');
    }

    public function delete($id)
    {
        $gallerys = Gallery::find($id);
        $gallerys->delete();

        return response()->json('selected row are delete successfully');
    }
}
