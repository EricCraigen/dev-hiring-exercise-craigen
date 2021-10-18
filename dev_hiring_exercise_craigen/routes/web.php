<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Welcome;
use App\Http\Livewire\Patients;
use App\Http\Livewire\RecordPatientBloodPressure;

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

Route::get('/', Welcome::class)->name('home');

Route::get('/patients', Patients::class)->name('patients');

Route::get('/record-blood-pressure', RecordPatientBloodPressure::class)->name('record-blood-pressure');
