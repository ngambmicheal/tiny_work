<?php

	
	Route::group(['prefix'=>'/store/', 'namespace'=>'Store', 'middleware'=>['auth']], function($route){
		$route->get('/', "IndexController@index");
		$route->get('/settings/{view?}', "IndexController@settings");
		$route->get('/profile/{view?}', "IndexController@profile");

		$route->group(['prefix'=>'/scripts'], function($route){
			$route->post('/add_post', "IndexController@add_post");
			$route->post('/del_post', "IndexController@del_post");
			$route->post('/store_store', "IndexController@store_store");
			$route->post('/store_details', "IndexController@store_details");
			$route->post('/logo_up', "IndexController@upload_logo");
			$route->post('/emp_set', "IndexController@emp_set");
			$route->post('/add_pol', "IndexController@add_pol");
			$route->post('/up_style', "IndexController@up_style");
		});

	});