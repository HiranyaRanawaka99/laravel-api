<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Guest\PageController as GuestPageController;
use App\Models\Project;

use App\Http\Controllers\Admin\ProjectController;

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

Route::get('/', [GuestPageController::class, 'index'])->name('guest.home');
// Route::get('/projects/detail', [GuestPageController::class, 'index'])->name('guest.detail');


Route::middleware(['auth', 'verified'])
  ->prefix('admin')
  ->name('admin.')
  ->group(function () {

    Route::get('/', [AdminPageController::class, 'index'])->name('home');

    
    Route::get('projects/trash' , [ProjectController::class, 'trash'])->name('projects.trash.index');
    Route::patch('projects/trash/{project}/restore' , [ProjectController::class, 'restore'])->name('projects.trash.restore');
    Route::delete('projects/trash/{project}/force-destroy' , [ProjectController::class, 'forceDestroy'])->name('projects.trash.force-destroy');
    
    Route::resource('projects', ProjectController::class);

  });

require __DIR__ . '/auth.php';