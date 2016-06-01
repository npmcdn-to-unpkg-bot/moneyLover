<?php

Route::get('/landing-page', function() {
    return view('landingPage');
});

Route::get('/forgot',['as' => 'forgot', function () {
    return view('auth.forgot');
}]);

Route::post('/forgot-password', 'mailController@sendMail');

Route::group(['middleware' => ['web']], function () {

    Route::auth();

    Route::get('/', 'PageController@homeIndex');

    // Last step page route
    Route::group(['prefix' => 'currency'], function() {
    	Route::get('/','HomeController@currencyIndex');
    	Route::post('/', 'HomeController@postCurrency');
    });
    
    //Categories route
    Route::group(['prefix' => 'categories'], function() {
    	Route::get('/', 'categoriesController@Index');
	    Route::post('/add-new-category', 'categoriesController@createNew');
	    Route::get('/reset', 'categoriesController@reset');
	    Route::get('/{id}', 'categoriesController@showCategory');
	    Route::post('/update/{id}', [
	    	'as' => 'categoires.update',
	    	'uses' => 'categoriesController@update'
	    ]);
	    Route::get('/delete/{id}', [
	    	'as' => 'categories.destroy',
	    	'uses' => 'categoriesController@deleteItem'
	    ]);
    });

    //Bill route
    Route::group(['prefix' => 'bills'], function() {
    	Route::get('/', [
    		'as' => 'bill.index',
    		'uses' => 'billController@index'
    	]);
        Route::post('/', [
            'as' => 'bill.newBill',
            'uses' => 'billController@createItem'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'bill.destroy',
            'uses' => 'billController@deleteItem'
        ]);
        Route::post('/{id}', [
            'as' => 'bill.update',
            'uses' => 'billController@updateItem'
        ]);
    });

    //Wallet route
    Route::group(['prefix' => 'wallets'], function(){
        Route::get('/', [
            'as' => 'wallets.index',
            'uses' => 'walletsController@index'
        ]);
        Route::get('/{wallet_id}', [
            'as' => 'wallets.show',
            'uses' => 'walletsController@showWallet'
        ]);
        Route::get('/destroy/{wallet_id}', [
            'as' => 'wallets.destroy',
            'uses' => 'walletsController@deleteWallet'
        ]);
        Route::post('/create', [
            'as' => 'wallets.createItem',
            'uses' => 'walletsController@createWallet'
        ]);
        Route::post('/{wallet_id}/transaction/create', [
            'as' => 'transaction.create',
            'uses' => 'walletsController@createTransaction'
        ]);
    });

    //User route
    Route::group(['prefix' => 'user'], function() {
        Route::get('/', [
            'as' => 'user.index',
            'uses' => 'userController@index'
        ]);
    });
});