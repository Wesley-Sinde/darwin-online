<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class admin extends Controller
{
    public function index(Request $request)
    {

        return view('admin');

        // return view('home'); ProductNo Description Price Category Colour Size
    }

    public function store(Request $request)
    {
        // Quantity PurchaseNo ProductNo
        $request->validate([
            'Price' => 'required',
            'Category' => 'required',
            'Description' => 'required',
            'Colour' => 'required',
            'Size' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif,webp,|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->Category . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        Product::create([
            'Price' => $request->input('Price'),
            'Category' => $request->input('Category'),
            'Description' => $request->input('Description'),
            'Colour' => $request->input('Colour'),
            'Size' => $request->input('Size'),
            'image' => $newImageName,
        ]);
        return redirect('/home')->with('message', 'Your art Is Now Live!');
    }
}
