<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

// todos -- all listings
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        // estou passando esse heading (heading é uma variável) como parâmetro
        'listings' => Listing::all()
    ]);
});

// single listing
// TODO
// look
Route::get('/listings/{listing}', function(Listing $listing) {
    return view('listing', [
        'listing' => $listing
    ]);
});




// Route::get('/hello', function () {
//     return response('<h1>Hello World</h1>', 200)
//     ->header('Content-Type', 'text/plain')
//     ->header('foo', 'bar');
// });

// Route::get('/posts/{id}', function ($id) {
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function(Request $request) {
//     dd($request);
// });
