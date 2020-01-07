<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Translation Path
Route::get('lang/{locale}', 'LocalizationController@index');



/* posts path
  Define Crud Paths For Posts
*/


Route::get('/posts/{id}/{slug}', 'PostController@show');


Route::group(['middleware' => 'auth'], function () {
  // Add Post
  Route::get('/add-post', 'PostController@add')->name('add-post');
  Route::post('/add-post', 'PostController@store');
  // Edit Post
  Route::get('/edit-post/{id}', 'PostController@edit');
  Route::post('/edit-post/{id}', 'PostController@edit');
  // Delete Posts
  Route::get('/delete-post/{id}', function ($id) {
    $prod = Post::find($id);
    $prod != null ? $prod->delete() : "";
    return redirect('posts');
  });

});


Route::get('/encyclopedia', 'EncyclopediaController@index')->name('Encyclopedia.index');


Route::get('/sub-categories/{id}/{slug}', 'SubCategoryController@show')->name('sub_categories.index');

Route::get('/categories/posts/{id}/{slug}', 'CategoryController@show');



// Profile Paths
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');



// comments routes
Route::post('comments/{comment_post_id}', ['uses' => 'CommentsController@store','as' => 'comments.store']);

// Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('body');



Auth::routes();
Route::group(['middleware' => ['web']], function() {

// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});
Route::get('/', 'HomeController@index')->name('homepage');


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function (){

  Route::resource('/', 'DashboardController', ['except' => ['show', 'create', 'store']]);

  Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);

});


Route::get('/authors/{id}/{name}', 'AuthorsController@show')->name('authors.show');


// Route::resource('/authors', 'AuthorsController', ['except' => ['index', 'create', 'store']]);
