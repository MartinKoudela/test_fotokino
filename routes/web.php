<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/photo-print', function () {
    return view('photo-print');
})->name('photo-print');

Route::get('/canvas-print', function () {
    return view('canvas-print');
})->name('canvas-print');

Route::get('/bigformat-print', function () {
    return view('bigformat-print');
})->name('bigformat-print');

Route::get('/others-print', function () {
    return view('others-print');
})->name('others-print');

Route::get('/films-negatives', function () {
    return view('films-negatives');
})->name('films-negatives');

Route::get('/goods', function () {
    return view('goods');
})->name('goods');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
