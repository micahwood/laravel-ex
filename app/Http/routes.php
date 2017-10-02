<?php

Route::get('/', function()
{
  return View::make('index');
});

Route::get('/admin', function()
{
  return View::make('login');
});

Route::post('/admin', function()
{
  if (Auth::attempt(['name'=>Input::get('name'), 'password'=>Input::get('password')])) {
    return Redirect::to('/dashboard');
  } else {
    return Redirect::to('admin')
      ->with('error', 'Your username/password combination was incorrect')
      ->withInput();
  }
});

Route::get('/logout', function()
{
  Auth::logout();
  return Redirect::to('admin')
    ->with('message', 'You are now logged out!');
});


Route::group(['middleware' => 'auth'], function()
{
  Route::get('/dashboard', function()
  {
    $images = App\Models\Image::first();
    if ($images) {
      $id = $images->id;
      $images = unserialize($images->imageArr);
    }

    return View::make('dashboard')->with(['images' => $images, 'id' => $id]);
  });

  Route::get('/resume-edit', function()
  {
    return View::make('resume-edit')->with('resume', App\Models\Resume::first());
  });

});

Route::resource('image', 'ImagesController', ['only' => ['index', 'store', 'update']]);
Route::resource('resume', 'ResumesController', ['only' => ['index', 'update']]);