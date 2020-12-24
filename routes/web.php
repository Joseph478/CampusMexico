<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/certificate', 'User\CertificateController@index')->name('users.certificate');
Route::get('/certificate/{inscription}', 'User\CertificateController@create')->name('users.certificate.inscriptions');

Auth::routes();
Route::post('/register/company', 'Contractor\RegisterController@store')->name('register.company');

Route::resource('participants','ParticipantController');
Route::get('participants/{user}/modify', 'ParticipantController@modify')->name('participants.modify');
Route::get('participants/{user}/profile', 'ParticipantController@profile')->name('participants.profile');
Route::put('participant/{user}', 'ParticipantController@actualize')->name('participants.actualize');
Route::post('participants/import-excel','ParticipantController@import')->name('participants.import');


Route::resource('facilitators','FacilitadorController');
Route::get('facilitators/{user}/modify', 'FacilitadorController@modify')->name('facilitators.modify');
Route::put('facilitator/{user}', 'FacilitadorController@actualize')->name('facilitators.actualize');
Route::resource('companies','CompanyController');


Route::resource('categories','CategoryController');

Route::get('courses/u', 'Courses\ParticipantsController@list')->name('courses.participant.list');
Route::get('courses/{classroom}/u/{user}', 'Courses\ParticipantsController@detail')->name('courses.participant.detail');
Route::get('courses/{classroom}/types/{type}/u', 'Courses\ParticipantsController@list_type')->name('courses.participant.type');
Route::get('courses/{classroom}/types/{type}/contents/{content}/u/play', 'Courses\ParticipantsController@play')->name('courses.participant.play');
Route::resource('courses.contents','Courses\CourseContentController');
Route::get('courses/{course}/types/{type}/contents/{content}/u/play', 'Courses\ParticipantsController@play')->name('courses.participant.play');

Route::resource('courses.types','Courses\CourseTypeController');
Route::resource('courses.types.contents','Courses\CourseTypeContentController');
Route::get('courses/contents/{media}/download','Courses\CourseTypeContentController@download_content')->name('contents.download');

//Route::get('courses/contents/{course}', 'Courses\ContentController@index')->name('courses.contents.index');
Route::resource('courses','CourseController');
Route::resource('courses.certificates','Courses\CourseCertificateController');


Route::get('classrooms/{classroom}/test/{key?}','Classroom\TestController@list')->name('classrooms.list');
Route::resource('classrooms.tests','Classroom\TestController');
Route::resource('classrooms','ClassroomController');
Route::get('classrooms/{classroom}/consolidated', 'Classroom\ClassroomConsolidatedController@consolidated')
    ->name('classrooms.Consolidated');
Route::resource('classrooms.meetings','Classroom\MeetingController');
Route::resource('classrooms.assistances','Classroom\ClassroomAssistanceController');

Route::post('classrooms/{classroom}/assistances/{assistance}/register',
    'Classroom\ClassroomAssistanceController@register')
    ->name('classrooms.assistances.register');

Route::get('bank/{course}','BankController@save')->name('banks.save');
Route::get('banks/{course?}/module{module?}','BankController@list')->name('banks.list');
Route::resource('banks','BankController');
Route::post('banks/import-excel','BankController@import')->name('banks.import');



Route::resource('roles','RoleController');
Route::resource('types','TypeController');
Route::resource('certificates','CertificateController');
Route::resource('users','UserController');
Route::get('courses/{classroom}/test/{test}','Course\CourseTestController@test')->name('courses.test');
Route::get('courses/{classroom}/encuesta/{test_user}','Course\CourseTestController@encuesta')->name('tests.encuesta');
Route::post('courses/{classroom}/test/{test}/register','Course\CourseTestController@register')->name('courses.test.register');
Route::get('courses/{classroom}/test/{test_user}/result','Course\CourseTestController@result')->name('courses.test.result');
Route::get('courses/{classroom}/test/{test_user}/detail','Course\CourseTestController@detail')->name('courses.test.detail');
Route::resource('users.testusers','User\TestUserController');


Route::resource('inscriptions','InscriptionController');
Route::post('inscriptions/import-excel','InscriptionController@import')->name('inscriptions.import');
Route::get('inscriptions/{classroom}/register','InscriptionController@register')->name('inscriptions.register');
Route::post('inscriptions/{classroom}','InscriptionController@save')->name('inscriptions.save');
Route::get('inscriptions/{classroom}/detail','InscriptionController@detail')->name('inscriptions.detail');

Route::resource('classrooms.tests','Classroom\TestController');
Route::get('classrooms.tests/{classroom}/list','Classroom\TestController@list')->name('tests.list');
Route::resource('courses.certificates','Courses\CourseCertificateController');

Route::get('modules/{course}','ModuleController@index')->name('modules.index');
route::get('modules/{course}/create','ModuleController@create')->name('modules.create');
Route::get('module/{module?}/courses/{course?}','ModuleController@show')->name('modules.show');
route::get('modules/{module}/edit','ModuleController@edit')->name('modules.edit');
route::post('modules/{course}','ModuleController@store')->name('modules.store');
route::put('modules/{module}','ModuleController@update')->name('modules.update');
Route::delete('modules/{module}','ModuleController@destroy')->name('modules.destroy');

// REPORTS
route::get('report','ReportController@index')->name('report');
route::post('exportExcel','ReportController@exportExcel')->name('exportExcel');
route::get('exportExcel/Grade','ReportController@exportDetailGrade')->name('exportDetailGrade');

//Question
Route::resource('forums','ForumController');

