<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Category;
use Session;

class CategoryController extends Controller
{    
	public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
    	// display a view of all our categories
    	//it will also have a form to create a new category 

    	$categories=Category::all();
    	return view('categories.index')-> withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Save a new category and then redirect back to Index
        $this->validate($request, array(
            'name'=>'required|max:255',
            ));

        //store in the database
        $category=new Category;

        $category->name=$request->name;
        $category->save();

        Session::flash('success', 'New Category has been created');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show')->withCategory($category);
    }


}    