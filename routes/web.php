<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

// common resource routes:
// index - show alll listings
// show - show single listing
// create - show form to create new listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destroy - delete listing

// todos -- all listings
Route::get('/', [ListingController::class, 'index']);

// show create form
Route::get('/listings/create', [ListingController::class, 'create']);

// store listings data
Route::post('/listings', [ListingController::class, 'store']);

// single listing
// TODO
// look
Route::get('/listings/{listing}', [ListingController::class, 'show']);


// create new route -> new controller method-> new view
// workflow


