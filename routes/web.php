<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Web\Main\Main_cont;
use App\Http\Controllers\Web\Services\Service_cont;
use App\Http\Controllers\Web\Projects\Project_cont;
use App\Http\Controllers\Auth\Profile_cont;
use App\Http\Controllers\Admin\MsgController;
use App\Http\Controllers\Web\Msg\Msg_cont;


use App\Http\Controllers\Admin\RelatedProjectsController;
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
//
Route::prefix('Admin')->middleware('AdminRole')->group(function (){
    Route::prefix('services')->group(function () {
        Route::get('/', [ServicesController::class, 'index'])->name('services.index');
        Route::get('/add', [ServicesController::class, 'add'])->name('services.add');
        Route::post('/add', [ServicesController::class, 'add'])->name('services.add');
        Route::get('/update/{id}', [ServicesController::class, 'update'])->name('services.update');
        Route::post('/update/{id}', [ServicesController::class, 'update'])->name('services.update');
        Route::get('/delete/{id}', [ServicesController::class, 'delete'])->name('services.delete');
        Route::post('/delete/{id}', [ServicesController::class, 'delete'])->name('services.delete');
    });
    Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectsController::class, 'index'])->name('projects.index');
        Route::get('/add', [ProjectsController::class, 'add'])->name('projects.add');
        Route::post('/add', [ProjectsController::class, 'add'])->name('projects.add');
        Route::get('/update/{id}', [ProjectsController::class, 'update'])->name('projects.update');
        Route::post('/update/{id}', [ProjectsController::class, 'update'])->name('projects.update');
        Route::get('/delete/{id}', [ProjectsController::class, 'delete'])->name('projects.delete');
        Route::post('/delete/{id}', [ProjectsController::class, 'delete'])->name('projects.delete');
    });
    Route::prefix('Msg')->group(function (){
        Route::get('/{type}',[MsgController::class, 'index'])->name('Msg.Index');
        Route::get('/Delete/{id}',[MsgController::class, 'delete'])->name('Msg.Delete');
        Route::post('/Delete/{id}',[MsgController::class, 'delete'])->name('Msg.Delete');
        Route::get('/Read/{id}',[MsgController::class, 'read'])->name('Msg.Read');


    });

});

Route::prefix('/')->group(function () {

    Route::get('/Main', [Main_cont::class, 'index'])->name('Web.Main');
    Route::get('/', [Main_cont::class, 'index'])->name('Web.Main');

    Route::get('/ContactUs',[Msg_cont::class, 'send'])->name('Web.Msg');
    Route::post('/ContactUs',[Msg_cont::class, 'send'])->name('Web.Msg');


    Route::get('/Profile',[Profile_cont::class, 'update'])->name('Web.Profile');
    Route::post('/Profile',[Profile_cont::class, 'update'])->name('Web.Profile');

    Route::prefix('/services')->group(function () {
        Route::get('/{id}', [Service_cont::class, 'index'])->name('Web.Services.Main');
    });
    Route::prefix('/Project')->group(function () {
        Route::get('/{id}', [Project_cont::class, 'index'])->name('Web.Project.Index');
        Route::post('/{id}', [Project_cont::class, 'index'])->name('Web.Project.Index');
    });

});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//
//});

require __DIR__.'/auth.php';
