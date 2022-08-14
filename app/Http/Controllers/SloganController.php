<?php

namespace App\Http\Controllers;

use App\Models\Slogan;
use Illuminate\Http\Request;

class SloganController extends Controller
{
    public function index()
    {
        $slogans = Slogan::all()->toArray();
        return array_reverse($slogans);
    }

    public function add(Request $request)
    {
        $slogan = $request->input('slogan');

        $slogans = new Slogan([
            'slogan' => $slogan,
        ]);

        $slogans->save();

        return response()->json('add slogan successfully');
    }

    public function delete($id)
    {
        $slogans = Slogan::find($id);
        $slogans->delete();

        return response()->json('selected row are delete successfully');
    }
}
