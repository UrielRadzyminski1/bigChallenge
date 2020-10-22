<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\Category as CategoryResource;
use App\Models\Category;
use App\Http\Resources\Meal as MealResource;
use App\Models\Meal;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories/{category}', function (Category $category) {
    return MealResource::collection($category->meals);
});

Route::get('categories', function () {
    return CategoryResource::collection(Category::all());
});