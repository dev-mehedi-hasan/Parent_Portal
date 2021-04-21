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
// Basic Routing

Route::get('/', function () {
    return view('parent.parent_login');
});

Route::get('/teacher', function () {
    return view('teacher.teacher_login');
});
Route::get('/admin', function () {
    return view('admin.admin_login');
});






// Admin Routing

Route::post('/admin_login', 'AdminController@login');
Route::get('/admin_dashboard', function () {
    return view('admin.admin_dashboard');
});
Route::get('/admin_logout', 'AdminController@logout');
Route::get('/admin_profile', 'AdminController@profile');
Route::get('/admin_profile_edit', 'AdminController@profile_edit');
Route::post('/admin_profile_update', 'AdminController@profile_update');
Route::get('/admin_notice_board', 'AdminController@admin_notice_board');
Route::get('/add_notice', 'AdminController@add_notice');
Route::post('/post_notice', 'AdminController@post_notice');
Route::get('/notice_detail/{Notice_id}','AdminController@view_noticeboard');
Route::get('/department_notice/{Department_id}','AdminController@department_notice');
Route::get('/add_user', 'AdminController@add_user');
Route::post('/add_teacher', 'AdminController@add_teacher');
Route::post('/add_parent', 'AdminController@add_parent');
Route::get('/add_student', 'AdminController@add_student');
Route::post('/create_student', 'AdminController@create_student');
Route::get('/admin_payment_ledger', 'AdminController@admin_payment');
Route::get('/admin_payment/search', 'AdminController@admin_payment_search')->name('admin_payment.search');
Route::get('/payment_ledger_detail/{Payment_ledger_id}', 'AdminController@payment_ledger_detail');
Route::get('/add_semester', 'AdminController@add_semester');
Route::post('/add_new_semester', 'AdminController@add_new_semester');
Route::get('/add_section', 'AdminController@add_section');
Route::post('/create_section', 'AdminController@create_section');
Route::get('/enroll_course', 'AdminController@enroll_course');
// Parent Routing

Route::post('/parent_login', 'ParentController@login');
Route::get('/parent_logout', 'ParentController@logout');
Route::get('/parent_profile', 'ParentController@parent_profile');


Route::get('/parent_dashboard', function () {
    return view('parent.parent_dashboard');
});
Route::get('/progress_report', function () {
    return view('parent.progress_report');
});
Route::get('/payment_scheme', function () {
    return view('parent.payment_scheme');
});


Route::get('/payment_ledger', 'ParentController@payment_ledger');
Route::get('/parent_notice_board', 'ParentController@parent_notice_board');
Route::get('/parent_notice_detail/{Notice_id}','ParentController@parent_notice_detail');
Route::get('/parent_department_notice/{Department_id}','ParentController@parent_department_notice');
Route::get('/parent_profile_edit', 'ParentController@parent_profile_edit');
Route::post('/parent_profile_update', 'ParentController@parent_profile_update');
Route::get('/parent_academic_result', 'ParentController@parent_academic_result');
Route::post('/parent_academic_result_show', 'ParentController@parent_academic_result_show');
Route::get('/view_progress_report/{Behavioural_assesment_id}','ParentController@view_progress_report');
Route::get('/parent_class_diary', 'ParentController@parent_class_diary');
Route::get('/parent_class_diary_detail/{Class_diary_id}','ParentController@parent_class_diary_detail');
Route::get('/parent_chat', 'ParentController@parent_chat');
Route::get('/parent_chat_with/{Teacher_id}','ParentController@parent_chat_with');
Route::post('/message_sending_to/','ParentController@message_sending_to');





//Teacher Routing
Route::post('/teacher_login', 'TeacherController@login');
Route::get('/teacher_logout', 'TeacherController@logout');
Route::get('/teacher_profile', 'TeacherController@teacher_profile');
Route::get('/teacher_profile_edit', 'TeacherController@teacher_profile_edit');
Route::post('/teacher_profile_update', 'TeacherController@teacher_profile_update');
Route::get('/behavioral_assessment', 'TeacherController@behavioral_assessment');
Route::post('/post_behavioral_assessment', 'TeacherController@post_behavioral_assessment');
Route::post('/teacher_class_diary_post', 'TeacherController@teacher_class_diary_post');
Route::get('/teacher_chat', 'TeacherController@teacher_chat');
Route::get('/teacher_chat_with/{Parent_id}','TeacherController@teacher_chat_with');
Route::post('/teacher_message_sending_to/','TeacherController@teacher_message_sending_to');


Route::get('/teacher_dashboard', function () {
    return view('teacher.teacher_dashboard');
});

Route::get('/teacher_class_diary', function () {
    return view('teacher.class_diary');
});
