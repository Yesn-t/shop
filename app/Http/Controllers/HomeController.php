<?php

namespace App\Http\Controllers;

use App\File;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('home', 'collection');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function home()
    {
        return view('home');
    }

    public function collection()
    {
        $products = Product::with(['files' => function ($query) {
        }])
        ->has('files')
        ->with('category')
        ->get();

        // $products = Product::with('files:id,hash')->get();

        // dd($products);

        return view('collection', compact('products'));
    }

    public function index()
    {
        return view('home');
    }
}
