<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('api/products', 'ProductsController');