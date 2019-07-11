<?php

namespace App\Http\Controllers\Admin;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage; // deleyti hmara vor jnji storejic
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact(
            'categories',
            'tags'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //sranov uxaki validacayes stugum  
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
        ]);
        /*$image = $request->file('image')->store('uploadsimg', 'public');*/

        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/uploadsimg', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        
        // stugumenq tag u sarqumenq tox
        $tagsArray = $request->tags;
        if ($tagsArray) {
            $tagsArray = implode(", ",$tagsArray);
        }else{
            $tagsArray = NULL;
        }
        
        
            /* $tagsArray = implode(", ",$tagsArray); */
        $post = Post::create([
            'title' => $request->title,
            'content' =>  $request->content,
            'category_id' =>  $request->category_id,
            'date' =>  $request->date,
            'tags' =>  $tagsArray,
            'image' =>  $fileNameToStore,
        ]);
        $post->toggleStatus($request->get('status'));
        $post->toggleFeatured($request->get('is_featured'));

        /*$post = new Post;
        $post->title = $request->title;
        $post->save();*/
     /*   dd($request->all());*/

        return redirect('/admin/posts');

  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('categories','tags','post'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
        ]);
        
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/uploadsimg', $fileNameToStore);
        }

         // stugumenq tag u sarqumenq tox
        $tagsArray = $request->tags;
        if ($tagsArray) {
            $tagsArray = implode(", ",$tagsArray);
        }else{
            $tagsArray = NULL;
        }

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->date = $request->date;
        $post->tags = $tagsArray;
        $post->toggleStatus($request->get('status'));
        $post->toggleFeatured($request->get('is_featured'));

        if ($request->hasFile('image')) {
          if ($post->image != 'noimage.jpg') {
            Storage::delete('public/uploadsimg/'.$post->image);
          }
          $post->image = $fileNameToStore;
        }
        
        $post->save();
         return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

         if($post->image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/uploadsimg/'.$post->image);
        }
        $post->delete();
        return redirect('/admin/posts');
    }
}
