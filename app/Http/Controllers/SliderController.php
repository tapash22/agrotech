<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all()->toArray();
        return array_reverse($sliders);
    }

    public function add(Request $request)
    {
        $sname = $request->input('sname');
        $simage = $request->file('simage')->store('upload');

        $sliders = new Slider([
            'sname' => $sname,
            'simage' => $simage,
        ]);

        $sliders->save();

        return response()->json('add slider successfully');
    }

    public function delete($id)
    {
        $sliders = Slider::find($id);
        $sliders->delete();

        return response()->json('selected row are delete successfully');
    }
}
