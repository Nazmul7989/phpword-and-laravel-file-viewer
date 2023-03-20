<?php

use App\Http\Controllers\DocFileController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

//Get Variable from docx file
Route::get('/document',[DocumentController::class,'index'])->name('document.index');

//View different file
Route::get('/file',[DocumentController::class,'create'])->name('document.create');
Route::get('/file-preview/{filename}',[DocumentController::class,'file_preview'])->name('document.file_preview');

//store file in google drive
Route::get('/doc-file',[DocFileController::class,'index'])->name('file.index');
Route::post('/doc-file/store',[DocFileController::class,'store'])->name('file.store');
