<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Tag;
use App\Product;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        $products = Product::all()->random(1);
        return view('home.index', compact('posts','products'));
    }

     public function cabinet()
    {
        return view('home.cabinet');
    }
}
