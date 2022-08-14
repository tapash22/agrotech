<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();
        return array_reverse($products);
    }

    public function add(Request $request)
    {
        $pname = $request->input('pname');
        $pcategory = $request->input('pcategory');
        $pscategory = $request->input('pscategory');
        $pdescription = $request->input('pdescription');
        $ppdf = $request->file('ppdf')->store('pdf');
        $pimage = $request->file('pimage')->store('upload');


        $products = new Product([
            'pname' => $pname,
            'pcategory' => $pcategory,
            'pscategory' => $pscategory,
            'pdescription' => $pdescription,
            'ppdf' => $ppdf,
            'pimage' => $pimage,
        ]);

        $products->save();

        return response()->json('add Product successfully');
    }

    public function download(Request $request,$file)
    {
        return response()->download(public_path('/pdf'.$file));
    }

    public function delete($id)
    {
        $products = Product::find($id);
        $products->delete();

        return response()->json('selected row are delete successfully');
    }

    public function poultry(){
        $products = Product::where(['pcategory' => 'poultry',])->get();
        // return array_reverse($products);
        return response()->json($products, 200);
    }

    public function ruminent(){
        $products = Product::where(['pcategory' => 'ruminent',])->get();
        // return array_reverse($products);
        return response()->json($products, 200);
    }

    public function aqua(){
        $products = Product::where(['pcategory' => 'aqua',])->get();
        // return array_reverse($products);
        return response()->json($products, 200);
    }
}
