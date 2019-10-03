<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'namespace' => 'Api\\V1'], function () {
    Route::get('users', 'UsersController@index');
    Route::get('users/{user}', 'UsersController@show');
    Route::delete('users/{user}/trash', 'UsersController@trash');
    Route::delete('users/{user}', 'UsersController@destroy');
    Route::get('users/{user}/messages', 'UsersController@shares');
    Route::post('users', 'UsersController@store');
    Route::post('profiles', 'ProfilesController@store');
    Route::post('avatars', 'AvatarsController@store');
    Route::put('users', 'UsersController@update');
    Route::put('profiles', 'ProfilesController@update');
    Route::put('avatars', 'AvatarsController@update');
    Route::post('comments', 'CommentsController@store');
    Route::post('messages', 'MessagesController@store');
    Route::post('views', 'ViewsController@store');
    Route::post('favorites', 'FavoritesController@store');
    Route::group(['namespace' => 'Auth'], function () {
        Route::post('signup', 'SignupController@store');
        Route::post('signin', 'SigninController@store');
        Route::get('verification/{verifyToken}', 'VerificationController@show');
        Route::get('passwords/forgot', 'PasswordsController@forgot');
        Route::get('passwords/new', 'PasswordsController@store');
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/upload', function () {
    $video = collect(request()->file('video'))->map(function($file) {
        return $file->store('public/videos');
    });
    $photo = collect(request()->file('photo'))->map(function($file) {
        return $file->store('public/photos');
    });

    return response()->json([
        'message' => 'video uploaded succesfuly',
        'video path' => $video,
        'photo path' => $photo,
    ], 201);
});

Route::get('/uploads', function() {
    $storage = '\Illuminate\Support\Facades\Storage';
    $videos = collect($storage::files('public/videos'))->map(function($file) use ($storage) {
        return $storage::url($file);
    });
    $photos = collect($storage::files('public/photos'))->map(function($file) use ($storage) {
        return $storage::url($file);
    });

    return response()->json([
        'video paths' => $videos,
        'photo paths' => $photos,
    ], 200);
});
