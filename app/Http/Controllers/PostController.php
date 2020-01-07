<?php

namespace Maqalist\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Maqalist\Http\Requests;
Use Image;
use Maqalist\Category;
use Maqalist\Post;
use Maqalist\User;

use Validator,Redirect,Response,File;
use Intervention\Image\Exception\NotReadableException;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     public function store(Request $request) {
       if ($request->isMethod('post')) {

         request()->validate([
             'title' => 'required',
             'slug' => 'required',
             'body' => 'required',
             'category_id' => 'required',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
          ]);

          $img = $request->image;

          $img_nn = time().$img->getClientOriginalName();

          $img->move('uploads/posts', $img_nn);

         $add = Post::create([
           'title' => $request->title,
           'slug' => $request->slug,
           'body' => $request->body,
           'category_id' => $request->category_id,
           'image' =>  '/uploads/posts/'.$img_nn
         ]);

           $add->save();


          //
          // if ($files = $request->file('Thumbnail')) {
          //
          //    // for save original image
          //    $ImageUpload = Image::make($files);
          //    $originalPath = public_path('uploads');
          //    $ImageUpload->save($originalPath.time().$files->getClientOriginalName());
          //
          //    // for save thumnail image
          //    $thumbnailPath = public_path('thumbnail');
          //    $ImageUpload->resize(400,400);
          //    $ImageUpload = $ImageUpload->save($thumbnailPath.time().$files->getClientOriginalName());
          //
          //  $add->Thumbnail = time().$files->getClientOriginalName();
          //  $add->save();
          //  }

           // $image = Post::latest()->first(['Thumbnail']);
           // return Response()->json($image);
         return view('layouts.posts.add-child')->with('categories', Category::all());
         }
     }
    /**
     * Display the specified resource.
     *
     * @param  \Maqalist\posts  $posts
     * @return \Illuminate\Http\Response
     */
     public function show($id,$slug) {

     $posts = Post::where('posts.slug' , $slug )->with('comments')->get();

      return view('layouts.posts.post-show-child', ['posts' => $posts]);
     }

     public function add() {
       return view('layouts.posts.add-child')->with('categories', Category::all());
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Maqalist\posts  $posts
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request, $id) {
       if ($request->isMethod('post')) {
         $post = Post::find($id);
         $post->title = $request->input('title');
         $post->save();
         return redirect('posts');
       }elseif ($request->isMethod('get')) {
       $post = Post::find($id);
       $arr = array('post' => $post);
       return view('layouts.posts.edit-child', $arr);
     }
     return view('layouts.posts.edit-child');
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Maqalist\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Maqalist\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(posts $posts)
    {
        //
    }
}
