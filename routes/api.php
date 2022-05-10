<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\API\V1\SurveyController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// 'middleware'=>'auth:sanctum'
Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\API\V1','middleware'=>'auth:sanctum'],function(){
    Route::apiResource('surveys',SurveyController::class);
    Route::apiResource('questions',QuestionController::class);
    Route::post('surveys/response/post/','SurveyController@postResponse');
});

// Route::prefix('v1')->group(function(){
//     Route::apiResource('surveys',SurveyController::class);
//     Route::get('image',[SurveyController::class,'index']);
//     Route::get('image/by_album/{album}',[SurveyController::class,'index2']);
//     Route::get('image/{image}',[SurveyController::class,'show']);
//     Route::post('image/resize',[SurveyController::class,'resize']);
//     Route::delete('image/{image}',[SurveyController::class,'destroy']);


// });

Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\API\V1','middleware'=>'auth:sanctum'],function(){
 
Route::get('surveys/all', 'SurveyController@index');
Route::get('surveys/{id}/fetch', 'SurveyController@show');
Route::get('responses/{id}/fetch', 'SurveyResponsesController@show');
Route::post('articles', 'SurveyController@store');
Route::put('articles/{article}', 'SurveyController@update');
Route::delete('articles/{article}', 'SurveyController@delete');

});

// Route::fallback(function(){
//     return response()->json([
//         'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
// });

// Route::get('/{any}', function () {
//     $data = [
//         'error' => [
//             'message' => 'Unknown endpoint',
//             'statusCode' => 404
//         ]
//     ];
//     return Response::json($data, 404);
// })->where('any', '.*');