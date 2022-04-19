<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;

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
    return view('welcome');
});

Route::get('/candidates', [CandidateController::class,'getAllCandidate'])->name('candidate.getAll');
Route::get('/add-candidate', [CandidateController::class,'addCandidate'])->name('candidate.create');
Route::post('/save-candidate', [CandidateController::class,'saveCandidate'])->name('candidate.save');
Route::post('/update/{id}', [CandidateController::class,'updateCandidate'])->name('candidate.update');
Route::get('/edit/{id}', [CandidateController::class,'editCandidate'])->name('candidate.edit');
Route::get('/delete/{id}', [CandidateController::class,'deleteCandidate'])->name('candidate.delete');


