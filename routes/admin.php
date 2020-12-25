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
	
			######################## logout route ##############
			Route::post('/logout', 'LoginController@logout')->name('logout');
			######################### logout ###################

			######################### dashboard home page ########
			Route::get('/', 'DashboardController@index')->name('home');
			######################### home ###################
			
			######################### admins routes #############
			Route::resource('/admins', 'AdminController');
			Route::get('/profile', 'ProfileAdminController@index')->name('profile');
			Route::post('/updateProfile', 'ProfileAdminController@update')->name('profile_update');
			########################## admins ###################

			########################## MainCategory ####
			Route::resource('/mainCategory', 'MainCategoryController');
			########################## MainCategory #######

			########################## SubCategory ####
			Route::resource('/subCategory', 'SubCategoryController');
			########################## SubCategory #######

			########################## brands ####
			Route::resource('/brands', 'BrandController');
			########################## brands #######

			########################## tags ####
			Route::resource('/tags', 'TagController');
			########################## tags #######

			######################### products routes #############
			Route::group(['prefix' => 'products'], function() {
				// products routs
				Route::get('/', 'ProductController@index')->name('products.index');
				Route::post('/uploadImages', 'ProductController@uploadImages')->name('products.uploadImages');
				Route::post('/deleteImages', 'ProductController@deleteImages')->name('products.deleteImages');
				Route::get('/create', 'ProductController@create')->name('products.create');
				Route::post('/store', 'ProductController@store')->name('products.store');
				Route::get('/edit/{id}', 'ProductController@edit')->name('products.edit');
				Route::put('/update/{id}', 'ProductController@update')->name('products.update');
				Route::post('/destroy/{id}', 'ProductController@destroy')->name('products.destroy');
			});
			######################### products routes #############

			######################### settings routes #############
			Route::group(['prefix' => 'settings'], function() {
				// shipping routs
				Route::get('/shipping/{type}', 'ShippingController@editShipping')->name('settings.editShipping');
				Route::post('/update-shipping/{id}', 'ShippingController@updateShipping')->name('settings.updateShipping');
			});
			######################### settings routes #############
		});
	}); 
});


