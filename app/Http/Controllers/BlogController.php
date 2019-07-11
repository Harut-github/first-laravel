<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Tag;
use Auth;
use App\Comment;
use App\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
	{
  		/*$posts = Post::all();*/// sax hanuma aranc paginate
  		$posts = Post::paginate(2);
  		
  	 return view('home.blog.index', compact('posts'));
	}
  	public function show($slug)
    {
    	$posts = Post::where('slug', $slug)->firstOrFail();
    	return view('home.blog.single', compact('posts'));
    }

  	public function cart()
    {
    	return view('home.cart.index');
    }

    public function comment(Request $request)
    {

      $this->validate($request, [
        'commenttext' => 'required',
      ]);

     $comment = new Comment;
     $comment->text = $request->get('commenttext');
     $comment->post_id = $request->get('post_id');
     $comment->user_id = Auth::user()->id;
     $comment->save();

     return redirect()->back(); // heta uxarkum et ej

    }


}
