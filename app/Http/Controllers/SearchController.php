<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  	public function index(Request $request)
  	{
  		$search = $request->input('search'); // inputi meji arjeq@ @ntunecinq

   		$posts = Post::where ( 'title', 'LIKE', '%' . $search . '%' )->orWhere ( 'title', 'LIKE', '%' . $search . '%' )->get (); // sranov mtanq et axyuxsaki mech qtanq et titl@
   		
   		return view('home.search.index', compact('posts'));
  	}
}



