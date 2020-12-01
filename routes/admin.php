<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    
	Route::name('admin.')->prefix('admin')->group(function(){

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
			Route::get('/', 'DashboardController@index')->name('home');

			
			// admins routes
			Route::get('/profile', 'ProfileAdminController@index')->name('profile');
			Route::post('/updateProfile', 'ProfileAdminController@update')->name('profile_update');

			// settings routes
			Route::group(['prefix' => 'settings'], function() {
				// shipping routs
				Route::get('/shipping/{type}', 'ShippingController@editShipping')->name('settings.editShipping');
				Route::post('/update-shipping/{id}', 'ShippingController@updateShipping')->name('settings.updateShipping');
			});
		});
		
	
	}); 
});


