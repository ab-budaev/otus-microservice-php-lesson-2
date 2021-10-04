<?php

use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;

Route::get('/api/v1/comments', [CommentsController::class, 'actionGetComments']);
Route::post('/api/v1/comments', [CommentsController::class, 'actionCreateNewComment']);
