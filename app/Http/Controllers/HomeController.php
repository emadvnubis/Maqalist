<?php

namespace Maqalist\Http\Controllers;

// use Illuminate\Http\Request;
use Maqalist\Post;
use Maqalist\Category;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      // $categories = DB::table('categories')
      //       ->join('posts', 'categories.id', '=', 'posts.category_id')
      //       ->select('categories.*', 'posts.*')
      //       ->whereColumn('categories.id', '=', 'posts.category_id')
      //       ->get();
      //
      //       dd($categories);

            $categories = Category::with('posts')->paginate(3);



              // dd($categories);

              // dd($postsController);



        return view('layouts.home.homepage-child', ['categories' => $categories]);
    }
}
