<?php

namespace Maqalist\Http\Controllers;

use Illuminate\Http\Request;

use Maqalist\Http\Requests;
Use Image;
use Maqalist\Post;
use Maqalist\Category;

use Validator,Redirect,Response,File;
use Intervention\Image\Exception\NotReadableException;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


   public function index()
   {

  }


        public function show($id, $slug)
        {

          $posts = Post::where('category_id' , '=' , $id )->paginate(4);


          //dd($posts);
        //  $posts = Post::where('category_id' , '=' , $id )->get();

          //$posts = Post::all();

          //echo var_dump($categories[0]['id']);

          return view('layouts.categories.category-show', ['posts' => $posts]);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
