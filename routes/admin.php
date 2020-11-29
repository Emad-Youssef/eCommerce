<?php

use Illuminate\Support\Facades\Route;


// Route::group(['prefix' => LaravelLocalization::setLocale()], function()
// {
// 	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    
    
// });

Route::name('admin.')->group(function(){

	// guest
	Route::group(['middleware' => 'guest:admin'], function() {
		// login routs
		Route::get('/login', 'LoginController@login')->name('login');
		Route::post('/login', 'LoginController@login_admin')->name('loginPost');
	});

	// routs Authenticate admin
	Route::group(['middleware' => 'auth:admin'], function() {

		 ###### logout route
		 Route::post('/logout', 'LoginController@logout')->name('logout');

		// dashboard home page
		Route::get('/home', 'DashboardController@index')->name('home');
	});
	

});
