<?php

namespace App\Http\Controllers;
use App\Product; //kochvuma name space modelna kopit asac kpnuma stex
use Illuminate\Http\Request;

class ShopController extends Controller
{


    public function index()
    {

    	$products = Product::all();
  		
  	    return view('home.shop.index', compact('products'));
    }

    public function show($slug)
    {
    	$products = Product::where('slug', $slug)->firstOrFail();
    	return view('home.shop.single', compact('products'));
    }

}
