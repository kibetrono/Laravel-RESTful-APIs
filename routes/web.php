<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyResponsesController;
use App\Http\Controllers\RegisteredUsersController;
;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/profile', function () {
    return view('Registered_Users.profile');
});
Route::get('unauthorized_user', function () {
    $errors = [];
    array_push($errors, ['code' => '500', 'message' => 'Authentication Failed. Please Generate Token.']);
    return response()->json([
        'errors' => $errors,
    ], 500);
})->name('unauthorized_user');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('survey', SurveyController::class)->middleware('auth');

Route::resource('question',QuestionController::class)->middleware('auth');

Route::resource('response',SurveyResponsesController::class)->middleware('auth');

Route::resource('user_list',RegisteredUsersController::class)->middleware('auth');


Route::get('/setup', function () {
    $credentials=[
'email'=>'admin@admin.com',
'password'=>'password'

    ];
    if(!Auth::attempt($credentials)){
        $user=new \App\Models\User();
        $user->name ="Admin";
        $user->email =$credentials['email'];
        $user->password =Hash::make($credentials['password']);

        $user->save();

        if(Auth::attempt($credentials)){

            $user=Auth::user();

            $adminToken=$user->createToken('admin-token',['create','update','delete']);
            $updateToken=$user->createToken('update-token',['create','update']);
            $basicToken=$user->createToken('basic-token');

            return [
                'admin'=>$adminToken->plainTextToken,
                'update'=>$updateToken->plainTextToken,
                'basic'=>$basicToken->plainTextToken,
            ];
        }

    }
});

Route::get('/{any}', function () {
    $data = [
        'error' => [
            'message' => 'Unknown endpoint',
            'statusCode' => 404
        ]
    ];
    return Response::json($data, 404);
})->where('any', '.*');