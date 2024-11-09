<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreatePostController;


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

Route::post('/createpost', [CreatePostController::class, 'create']);
Route::get('viewpost', [CreatePostController::class, 'view']);
Route::get('/getpost/{id}', [CreatePostController::class, 'edit_by_id']);
Route::put('/updatepost/{id}', [CreatePostController::class, 'update']);
Route::put('/deletepost/{id}', [CreatePostController::class, 'softdelete']);