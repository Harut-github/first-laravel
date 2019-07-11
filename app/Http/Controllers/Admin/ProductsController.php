<?php

namespace App\Http\Controllers\Admin;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage; // deleyti hmara vor jnji storejic
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	   	 $products = Product::all();
	     return view('admin.products.create', compact('products'));
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
            'price' => 'required',
        ]);


        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/uploadsimg', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        

        $product = Product::create([
            'title' => $request->title,
            'price' =>  $request->price,
            'description' =>  $request->description,
            'content' =>  $request->content,
            'image' =>  $fileNameToStore,
        ]);


        return redirect('/admin/products');

  
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
        $product = Product::find($id);
   

        return view('admin.products.edit', compact('product'));
       
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
            'price' => 'required',
        ]);
        
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/uploadsimg', $fileNameToStore);
        }

      

        $product = Product::find($id);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->content = $request->content;
        if ($request->hasFile('image')) {
          if ($product->image != 'noimage.jpg') {
            Storage::delete('public/uploadsimg/'.$product->image);
          }
          $product->image = $fileNameToStore;
        }
        
        $product->save();
         return redirect('/admin/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Post::find($id);

         if($product->image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/uploadsimg/'.$product->image);
        }
        $product->delete();
        return redirect('/admin/products');
    }
}
