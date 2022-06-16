<?php

namespace App\Http\Controllers;

use App\Models\Testimonials as ModelsTestimonials;
use Illuminate\Http\Request;

class testimonials extends Controller
{
    public function index(Request $request)
    {
        ///testimonials
        $Product = ModelsTestimonials::orderBy('created_at', 'desc')->paginate(5);

        //  dd($Product);
        if ($request->ajax()) {
            return view('home', compact('Product'));
        }
        return view('home', compact('Product'));
    }
}
