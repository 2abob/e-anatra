<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::any('/show_all_students', [App\Http\Controllers\StudentsController::class, 'show_all_students'])->name('show_all_students');
Route::get('/student_details/{id_students}', [App\Http\Controllers\StudentsController::class, 'show_student_details'])->name('show_student_details');
Route::get('/add_new_students', [App\Http\Controllers\StudentsController::class, 'add_new_students'])->name('add_new_students');
Route::post('/add_new_students', [App\Http\Controllers\StudentsController::class, 'add_new_studentsForm'])->name('add_new_students.store');
Route::any('/delete_student/{id_students}', [App\Http\Controllers\StudentsController::class, 'delete_student'])->name('delete_student');
Route::get('/update_student/{id_students}', [App\Http\Controllers\StudentsController::class, 'update_student'])->name('update_student');
Route::post('/update_student/{id_students}', [App\Http\Controllers\StudentsController::class, 'update_studentForm'])->name('update_student.store');

Route::get('/show_all_classroom', [App\Http\Controllers\ClassroomController::class, 'show_all_classroom'])->name('show_all_classroom');
Route::get('/add_new_classroom', [App\Http\Controllers\ClassroomController::class, 'add_new_classroom'])->name('add_new_classroom');
Route::any('/classroom_delete/{id_classroom}', [App\Http\Controllers\ClassroomController::class, 'classroom_delete'])->name('classroom_delete');
Route::get('/classroom_update/{id_classroom}', [App\Http\Controllers\ClassroomController::class, 'classroom_update'])->name('classroom_update');
Route::post('/classroom_update/{id_classroom}', [App\Http\Controllers\ClassroomController::class, 'classroom_updateForm'])->name('classroom_update.store');
Route::post('/add_new_classroom', [App\Http\Controllers\ClassroomController::class, 'add_new_classroomForm'])->name('add_new_classroom.store');
Route::get('/show_student/{id_classroom}', [App\Http\Controllers\ClassroomController::class, 'show_student_order_classroom'])->name('show_student_order_classroom');


Route::any('/delete_type_cours/{id_students}', [App\Http\Controllers\TypeclasseController::class, 'delete_type_cours'])->name('delete_type_cours');
Route::get('/update_type_cours/{type_cours_id}', [App\Http\Controllers\TypeclasseController::class, 'update_type_cours'])->name('update_type_cours');
Route::post('/update_type_cours/{type_cours_id}', [App\Http\Controllers\TypeclasseController::class, 'update_type_coursForm'])->name('update_type_cours.store');
Route::any('/show_all_type_cours', [App\Http\Controllers\TypeclasseController::class, 'show_all_type_cours'])->name('show_all_type_cours');
Route::get('/add_new_type_cours', [App\Http\Controllers\TypeclasseController::class, 'add_new_type_cours'])->name('add_new_type_cours');
Route::post('/add_new_type_cours', [App\Http\Controllers\TypeclasseController::class, 'add_new_type_coursForm'])->name('add_new_type_cours.store');
Route::get('/show_student_order_type_cours/{id_type_cours}', [App\Http\Controllers\TypeclasseController::class, 'show_student_order_type_cours'])->name('show_student_order_type_cours');


Route::get('/ecolage_student_detail/', [App\Http\Controllers\EcolageController::class, 'ecolage_student_detail'])->name('ecolage_student_detail');
Route::get('/details_ecolage/{id_students}', [App\Http\Controllers\EcolageController::class, 'details_ecolage'])->name('details_ecolage');
Route::post('/details_ecolage/{id_students}', [App\Http\Controllers\EcolageController::class, 'new_ecolageForm'])->name('new_ecolage.store');

Route::get('/history_ecolage', [App\Http\Controllers\EcolageController::class, 'history_ecolage'])->name('history_ecolage');

Route::get('/listeparcours', [App\Http\Controllers\ParcoursController::class, 'listeparcours'])->name('listeparcours');
Route::get('/creationparcours', [App\Http\Controllers\ParcoursController::class, 'creationparcours'])->name('creationparcours');

Route::get('/listementions', [App\Http\Controllers\MentionsController::class, 'listementions'])->name('listementions');
Route::get('/creationmention', [App\Http\Controllers\MentionsController::class, 'creationmention'])->name('creationmention');

//Route::get('/ecolage_details/{id_students}', [App\Http\Controllers\EcolageController::class, 'ecolage_details'])->name('ecolage_details');
//Route::get('/ecolage_non_payer', [App\Http\Controllers\EcolageController::class, 'ecolage_non_payer'])->name('ecolage_non_payer');




//Route::get('/add_new_classroom', 'ClassroomController@add_new_classroom')->name('add_new_classroom');
