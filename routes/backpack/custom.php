<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::delete('order/delivered', 'OrderController@deleteDelivered');
    Route::delete('order/all', 'OrderController@deleteAll');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('meal', 'MealCrudController');
    Route::crud('order', 'OrderCrudController');
    Route::post('order/{order}/deliver', 'OrderController@deliver');
    Route::post('order/{order}/pay', 'OrderController@pay');
}); // this should be the absolute last line of this file