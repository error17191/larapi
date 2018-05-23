<?php


Route::resource('buyers','Buyer\\BuyerController')->only(['index','view']);

Route::resource('sellers','Seller\\SellerController')->only(['index','view']);

Route::resource('users','User\\UserController')->except(['create','edit']);

Route::resource('categories','Category\\CategoryController')->except(['create','edit']);

Route::resource('products','Product\\ProductController')->only(['index','view']);

Route::resource('transactions','Transaction\\TransactionController')->only(['index','view']);

