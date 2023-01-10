<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;
use App\Category;

use App\FavouriteProperty;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::where('active', 1)->paginate(15);
        $categories=Category::where('active',1)->get();
        return view('frontendPages.listings', compact('properties','categories'));
    
}
}