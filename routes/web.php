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
Route::get('/listeetudiantparmention/{idMention}', [App\Http\Controllers\StudentsController::class, 'listeetudiantparmention'])->name('listeetudiantparmention');
Route::get('/listeetudiantparparcour/{idParcour}', [App\Http\Controllers\StudentsController::class, 'listeetudiantparparcour'])->name('listeetudiantparparcour');
Route::get('/popupetudiant', [App\Http\Controllers\StudentsController::class, 'popupetudiant'])->name('popupetudiant');
Route::get('/resultatrecherche/{key}', [App\Http\Controllers\StudentsController::class, 'resultatrecherche'])->name('resultatrecherche');

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
Route::get('/attribuertarif/{idEtudiant}', [App\Http\Controllers\EcolageController::class, 'attribuertarif'])->name('attribuertarif');
Route::get('/attribuertarifavancer/{idEtudiant}', [App\Http\Controllers\EcolageController::class, 'attribuertarifavancer'])->name('attribuertarifavancer');
Route::post('/attribuertarifconfirmation', [App\Http\Controllers\EcolageController::class, 'attribuertarifconfirmation'])->name('attribuertarifconfirmation');
Route::post('/attribuertarifavancerconfirmation', [App\Http\Controllers\EcolageController::class, 'attribuertarifavancerconfirmation'])->name('attribuertarifavancerconfirmation');
Route::get('/ficheecolageetudiant/{idEcolage}', [App\Http\Controllers\EcolageController::class, 'ficheecolageetudiant'])->name('ficheecolageetudiant');
Route::get('/reglerecolageform/{idEcolage}/{numTranche}', [App\Http\Controllers\EcolageController::class, 'reglerecolageform'])->name('reglerecolageform');
Route::post('/reglerecolage', [App\Http\Controllers\EcolageController::class, 'reglerecolage'])->name('reglerecolage');

Route::get('/history_ecolage', [App\Http\Controllers\EcolageController::class, 'history_ecolage'])->name('history_ecolage');

Route::get('/listeniveaux', [App\Http\Controllers\NiveauController::class, 'listeniveaux'])->name('listeniveaux');
Route::get('/creationniveauform', [App\Http\Controllers\NiveauController::class, 'creationniveauform'])->name('creationniveauform');
Route::post('/creationniveau', [App\Http\Controllers\NiveauController::class, 'creationniveau'])->name('creationniveau');
Route::get('/ficheniveau/{idniveau}', [App\Http\Controllers\NiveauController::class, 'ficheniveau'])->name('ficheniveau');
Route::get('/modifierniveauform/{idniveau}', [App\Http\Controllers\NiveauController::class, 'modifierniveauform'])->name('modifierniveauform');
Route::post('/modifierniveau/{idniveau}', [App\Http\Controllers\NiveauController::class, 'modifierniveau'])->name('modifierniveau');
Route::get('/supprimerniveau/{idniveau}', [App\Http\Controllers\NiveauController::class, 'supprimerniveau'])->name('supprimerniveau');
Route::get('/popupniveau', [App\Http\Controllers\NiveauController::class, 'popupniveau'])->name('popupniveau');

Route::get('/listeanneeuniversitaire', [App\Http\Controllers\AnneeUniversitaireController::class, 'listeanneeuniversitaire'])->name('listeanneeuniversitaire');
Route::get('/creationanneeuniversitaireform', [App\Http\Controllers\AnneeUniversitaireController::class, 'creationanneeuniversitaireform'])->name('creationanneeuniversitaireform');
Route::post('/creationanneeuniversitaire', [App\Http\Controllers\AnneeUniversitaireController::class, 'creationanneeuniversitaire'])->name('creationanneeuniversitaire');
Route::get('/ficheanneeuniversitaire/{idanneeuniversitaire}', [App\Http\Controllers\AnneeUniversitaireController::class, 'ficheanneeuniversitaire'])->name('ficheanneeuniversitaire');
Route::get('/modifieranneeuniversitireform/{idanneeuniversitaire}', [App\Http\Controllers\AnneeUniversitaireController::class, 'modifieranneeuniversitireform'])->name('modifieranneeuniversitireform');
Route::post('/modifieranneeuniversitaire/{idanneeuniversitaire}', [App\Http\Controllers\AnneeUniversitaireController::class, 'modifieranneeuniversitaire'])->name('modifieranneeuniversitaire');
Route::get('/supprimeranneeuniversitaire/{idanneeuniversitaire}', [App\Http\Controllers\AnneeUniversitaireController::class, 'supprimeranneeuniversitaire'])->name('supprimeranneeuniversitaire');
Route::get('/popupanneeuniversitaire', [App\Http\Controllers\AnneeUniversitaireController::class, 'popupanneeuniversitaire'])->name('popupanneeuniversitaire');

Route::get('/listemention', [App\Http\Controllers\MentionsController::class, 'listemention'])->name('listemention');
Route::get('/creationmentionform', [App\Http\Controllers\MentionsController::class, 'creationmentionform'])->name('creationmentionform');
Route::post('/creationmention', [App\Http\Controllers\MentionsController::class, 'creationmention'])->name('creationmention');
Route::get('/fichemention/{idmention}', [App\Http\Controllers\MentionsController::class, 'fichemention'])->name('fichemention');
Route::get('/modifiermentionform/{idmention}', [App\Http\Controllers\MentionsController::class, 'modifiermentionform'])->name('modifiermentionform');
Route::post('/modifiermention/{idmention}', [App\Http\Controllers\MentionsController::class, 'modifiermention'])->name('modifiermention');
Route::get('/supprimermention/{idmention}', [App\Http\Controllers\MentionsController::class, 'supprimermention'])->name('supprimermention');
Route::get('/popupmention', [App\Http\Controllers\MentionsController::class, 'popupmention'])->name('popupmention');

Route::get('/listeparcour', [App\Http\Controllers\ParcoursController::class, 'listeparcour'])->name('listeparcour');
Route::get('/creationparcourform', [App\Http\Controllers\ParcoursController::class, 'creationparcourform'])->name('creationparcourform');
Route::post('/creationparcour', [App\Http\Controllers\ParcoursController::class, 'creationparcour'])->name('creationparcour');
Route::get('/ficheparcour/{idparcour}', [App\Http\Controllers\ParcoursController::class, 'ficheparcour'])->name('ficheparcour');
Route::get('/modifierparcourform/{idparcour}', [App\Http\Controllers\ParcoursController::class, 'modifierparcourform'])->name('modifierparcourform');
Route::post('/modifierparcour/{idparcour}', [App\Http\Controllers\ParcoursController::class, 'modifierparcour'])->name('modifierparcour');
Route::get('/supprimerparcour/{idparcour}', [App\Http\Controllers\ParcoursController::class, 'supprimerparcour'])->name('supprimerparcour');
Route::get('/popupparcour', [App\Http\Controllers\ParcoursController::class, 'popupparcour'])->name('popupparcour');

Route::get('/listetarif', [App\Http\Controllers\TarifsController::class, 'listetarif'])->name('listetarif');
Route::get('/creationtarifform', [App\Http\Controllers\TarifsController::class, 'creationtarifform'])->name('creationtarifform');
Route::post('/creationtarif', [App\Http\Controllers\TarifsController::class, 'creationtarif'])->name('creationtarif');
Route::get('/fichetarif/{idtarif}', [App\Http\Controllers\TarifsController::class, 'fichetarif'])->name('fichetarif');
Route::get('/modifiertarifform/{idtarif}', [App\Http\Controllers\TarifsController::class, 'modifiertarifform'])->name('modifiertarifform');
Route::post('/modifiertarif/{idtarif}', [App\Http\Controllers\TarifsController::class, 'modifiertarif'])->name('modifiertarif');
Route::get('/supprimertarif/{idtarif}', [App\Http\Controllers\TarifsController::class, 'supprimertarif'])->name('supprimertarif');
Route::get('/popuptarif', [App\Http\Controllers\TarifsController::class, 'popuptarif'])->name('popuptarif');

//Route::get('/ecolage_details/{id_students}', [App\Http\Controllers\EcolageController::class, 'ecolage_details'])->name('ecolage_details');
//Route::get('/ecolage_non_payer', [App\Http\Controllers\EcolageController::class, 'ecolage_non_payer'])->name('ecolage_non_payer');

//Route::get('/add_new_classroom', 'ClassroomController@add_new_classroom')->name('add_new_classroom');
