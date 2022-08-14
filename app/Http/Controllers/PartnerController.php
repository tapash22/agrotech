<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all()->toArray();
        return array_reverse($partners);
    }

    public function add(Request $request)
    {
        $ptname = $request->input('ptname');
        $ptlink = $request->input('ptlink');
        $ptdescription = $request->input('ptdescription');
        $ptimage = $request->file('ptimage')->store('upload');

        $partners = new Partner([
            'ptname' => $ptname,
            'ptlink' => $ptlink,
            'ptdescription' => $ptdescription,
            'ptimage' => $ptimage,
        ]);

        $partners->save();

        return response()->json('add Partner successfully');
    }

    public function delete($id)
    {
        $partners = Partner::find($id);
        $partners->delete();

        return response()->json('selected row are delete successfully');
    }
}
