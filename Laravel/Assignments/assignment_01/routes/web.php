<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\StudentAPIController;

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
    //return view('welcome');
    return redirect()->route('students.index');
});

Route::resource('students', 'Student\StudentController');
//Route::get('students', [StudentController::class,'index'])->name('students.index');
//Route::get('students/create',[StudentController::class,'create'])->name('students.create');
//Route::post('students/store', [StudentController::class,'store'])->name('students.store');
//Route::get('student/{id}',[StudentController::class,'show'])->name('student.show');
//Route::get('student/edit/{id}',[StudentController::class,'edit'])->name('students.edit');
//Route::put('student/update/{id}',[StudentController::class,'update'])->name('students.update');
//Route::delete('student/delete/{id}',[StudentController::class,'destroy'])->name('student.destroy');
//
Route::get('export', [StudentController::class,'export'])->name('export');
Route::get('importExportView',[StudentController::class,'importExportView'] );
Route::post('import', [StudentController::class,'import'])->name('import');

//api route
Route::get('/ajax/students/' , [StudentAPIController::class, 'showList']);
Route::get('/ajax/students/create' , [StudentAPIController::class, 'showCreate']);
Route::get('/ajax/students/{student}/edit' , [StudentAPIController::class, 'showEdit']);

//mail
//Route::get('send-mail', function () {
//   
//    $details = [
//        'title' => 'Mail from ItSolutionStuff.com',
//        'body' => 'This is for testing email using smtp'
//    ];
//   
//    Mail::to('thureinhtun2499@gmail.com')->send(new \App\Mail\CreateMail($details));
//   
//    dd("Email is Sent.");
//});