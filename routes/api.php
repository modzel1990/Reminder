<?php

use Illuminate\Http\Request;
use App\Events\TestEvent;
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

// Route::get('/order', function (Request $request)
// {
//     $id = $request->input('id');
//     event(new TestEvent($id)); // trigger event
//     return Response::make('Test Event Ordered!');
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
