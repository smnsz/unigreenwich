<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

// Glide Image Processing routes...
get('img/{path}', function(League\Glide\Server $server, Illuminate\Http\Request $request) {
    $server->outputImage($request);
})->where('path', '.*');



Route::get('/messages', ['as' => 'messages', 'uses' => 'MessagesController@index']);
Route::get('/messages/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
Route::post('/messages', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);

Route::get('/messages/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
Route::put('/messages/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);

Route::get('/messages/sendmessage/{user}', ['as' => 'messages.sendmessage', 'uses' => 'MessagesController@sendmessage']);
Route::get('/messages/sendmessageshow/{id}', ['as' => 'messages.sendmessageshow', 'uses' => 'MessagesController@sendmessageshow']);



// Static Pages Routes...

Route::get('/', ['as' => 'root_path', 'uses' => 'PagesController@home']);
Route::get('about', ['as' => 'about_path', 'uses' => 'PagesController@about']);
Route::get('mapping', ['as' => 'mapping_path', 'uses' => 'PagesController@mapping']);
Route::get('contact', ['as' => 'contact_path', 'uses' => 'PagesController@contact']);
Route::post('contact', ['as' => 'contact_path', 'uses' => 'PagesController@postContact']);
Route::get('information', ['as' => 'info_path', 'uses' => 'PagesController@info']);
Route::get('students', ['as' => 'students_path', 'uses' => 'UsersController@index']);
Route::get('@{username}', ['as' => 'profile_path', 'uses' => 'UsersController@profile']);

Route::get('articles', ['as' => 'home', 'uses' => 'PostsController@getPage']);
Route::get('post/show/{id}', ['as' => 'getPostShow', 'uses' => 'PostsController@getShow']);
Route::get('post/user/{id}', ['as' => 'getUserPost', 'uses' => 'PostsController@getUserPost']);
Route::get('post/category/{id}', ['as' => 'getCategoryPost', 'uses' => 'PostsController@getCategoryPost']);
Route::get('post/tag/{id}', ['as' => 'getTagPost', 'uses' => 'PostsController@getTagPost']);

// PostsController
Route::get('post', ['as' => 'getPostPage', 'uses' => 'PostsController@getPage']);
Route::get('post/show/{id}', ['as' => 'getPostShow', 'uses' => 'PostsController@getShow']);
Route::get('post/user/{id}', ['as' => 'getUserPost', 'uses' => 'PostsController@getUserPost']);
Route::get('post/category/{id}', ['as' => 'getCategoryPost', 'uses' => 'PostsController@getCategoryPost']);
Route::get('post/tag/{id}', ['as' => 'getTagPost', 'uses' => 'PostsController@getTagPost']);

Route::group(['middleware' => 'auth'], function() {

    get('/edit', [
        'as' => 'edit_account_path',
        'uses' => 'UsersController@edit_account'
    ]);

    patch('/', [
        'as' => 'account_path',
        'uses' => 'UsersController@update_account'
    ]);

    get('/set_password', [
        'as' => 'new_password_path',
        'uses' => 'UsersController@new_password'
    ]);

    patch('/set_password', [
        'as' => 'new_password_path',
        'uses' => 'UsersController@update_password'
    ]);

    Route::get('/events', function () {
        return view('events.index');
    });
    Route::get('/eventsTypes', function () {
        return view('event-types.index');
    });
    // Bookings
    Route::get('/events/{id}/bookings', function () {
        return view('bookings.index');
    });
    // Events
    Route::get('events/create/{id?}', 'EventsController@create');
    Route::get('events/show/{id}', ['as' => 'getEventShow', 'uses' => 'EventsController@show']);
    Route::get('events/edit/{id}', 'EventsController@edit');
    // Event types
    Route::get('eventsTypes/create', 'EventTypesController@create');
    Route::get('eventsTypes/show/{id}', 'EventTypesController@show');
    Route::get('eventsTypes/edit/{id}', 'EventTypesController@edit');

    // Friends

    Route::get('/friends', [
        'uses' => 'FriendController@getIndex',
        'as' => 'friends.index',
    ]);
    Route::get('/friends/add/{username}', [
        'uses' => 'FriendController@getAdd',
        'as' => 'friends.add',
    ]);
    Route::get('/friends/accept/{username}', [
        'uses' => 'FriendController@getAccept',
        'as' => 'friends.accept',
    ]);

    // Specific routes for posting
    Route::group(array('prefix' => 'api'), function() {
        // Events
        Route::get('events', 'EventsController@index');
        Route::post('events/store', 'EventsController@store');
        Route::post('events/update/{id}', 'EventsController@update');
        Route::post('events/delete/{id}', 'EventsController@destroy');
        // Booking
        Route::get('events/{id}/bookings', 'BookingsController@index');
        Route::post('events/book/{id}', 'BookingsController@store');
        Route::post('events/unbook/{id}', 'BookingsController@destroy');
        Route::post('bookings/kick/{id}', 'BookingsController@kick');
        // Event types
        Route::get('eventTypes', 'EventTypesController@index');
        Route::post('eventTypes/store', 'EventTypesController@store');
        Route::post('eventTypes/delete/{id}', 'EventTypesController@destroy');
        Route::post('eventTypes/update/{id}', 'EventTypesController@update');
    });

    Route::get('post/create', ['as' => 'getPostCreate', 'uses' => 'PostsController@getCreate']);
    Route::post('post/create', ['as' => 'postPostCreate', 'uses' => 'PostsController@postCreate']);
    Route::get('post/mine', ['as' => 'getPostMine', 'uses' => 'PostsController@getMine']);
    Route::get('post/update/{id}', ['as' => 'getPostUpdate', 'uses' => 'PostsController@getUpdate']);
    Route::post('post/update', ['as' => 'postPostUpdate', 'uses' => 'PostsController@postUpdate']);
    Route::get('post/delete/{id}', ['as' => 'getPostDelete', 'uses' => 'PostsController@getDelete']);
    Route::post('post/upload', ['as' => 'uploadPostImage', 'uses' => 'PostsController@uploadPostImage']);
    Route::post('post/comment', ['as' => 'postPostComment', 'uses' => 'PostsController@postComment']);
    Route::post('event/comment', ['as' => 'eventPostComment', 'uses' => 'EventsController@postComment']);

    // CategoriesController

    Route::get('category', ['as' => 'category', 'uses' => 'CategoriesController@getAllCategory']);

    Route::group(['middleware' => 'auth'], function () {
        Route::get('category/create', ['as' => 'getCategoryCreate', 'uses' => 'CategoriesController@getCreate']);
        Route::post('category/create', ['as' => 'postCategoryCreate', 'uses' => 'CategoriesController@postCreate']);
    });

// TagsController
    Route::get('tag', ['as' => 'tag', 'uses' => 'TagsController@getAllTag']);


// UsersController
    Route::get('user', ['as' => 'user', 'uses' => 'UsersController@getAllUser']);
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', [
    'as' => 'register_path',
    'uses' => 'Auth\AuthController@getRegister'
]);
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
