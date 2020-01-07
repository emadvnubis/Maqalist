<?php

namespace Maqalist\Http\Controllers;


use Illuminate\Http\Request;

use Maqalist\Category;
use Maqalist\Post;
use Maqalist\SubCategory;

class SubCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    //  $categories = Category::paginate(3);
      $sub_categories = SubCategory::with('posts')->get();


          return view('layouts.sub_categories.childs.index-in', ["sub_categories" => $sub_categories]);

      //  return view('layouts.sub_categories.index',compact($sub_cats));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Maqalist\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */

    public function show(SubCategory $subCategory,$id, $slug)
    {

      $posts = Post::where('sub_category_id' , '=' , $id )->paginate(1);

      // $sub_categories = SubCategory::where('id' , '=' , $id )->with('posts')->paginate(1);




          return view('layouts.sub_categories.childs.index-in', ["posts" => $posts, "subCategory" => $subCategory]);

      //dd($posts);
    //  $posts = Post::where('category_id' , '=' , $id )->get();

      //$posts = Post::all();

      //echo var_dump($categories[0]['id']);

      return view('layouts.categories.category-show', ['posts' => $posts]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Maqalist\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Maqalist\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Maqalist\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
