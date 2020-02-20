<?php
Auth::routes();
/* ----------------------------------------------------------------- get
*/
Route::get('/dashboard', 'HomepageController@dashboard');

Route::get('/admin/sitemanage', 'Admin\AdminController@sitemanage');
Route::get('/admin/users', 'Admin\AdminController@users');
Route::get('/admin/edit', 'Admin\AdminController@editSite');
Route::get('/admin/delete', 'Admin\AdminController@deleteSite');
Route::get('/admin/tasks', 'Admin\AdminController@taskManage');
Route::get('/admin/taskmanagement', 'Admin\AdminController@taskManagement');

/* ----------------------------------------------------------------- post 
*/
Route::post('/admin/edit', 'Admin\AdminController@editSite');
Route::post('/admin/delete', 'Admin\AdminController@deleteSite');
Route::post('/edituser', 'Admin\AdminController@editUser');
Route::post('/saveuser', 'Admin\AdminController@saveUser');
Route::post('/deleteuser', 'Admin\AdminController@deleteUser');
Route::post('/admin/sitemanage', 'Admin\AdminController@sitemanage');
Route::post('/admin/users', 'Admin\AdminController@users');
/* --------------------------------------------------------------------Ajax file upload
*/
Route::post('/ajax_gallery_upload', 'Admin\AdminController@uploadGallery');
Route::post('/ajax_saveTask', 'Admin\AdminController@ajax_saveTask');
Route::post('/ajax_deleteTask', 'Admin\AdminController@ajax_deleteTask');
Route::get('/showGraph', 'HomepageController@showGraph');
/* ------------------------------------------------------------------
---------------------------------------------------------------------Api for ajax
---------------------------------------------------------------------*/
Route::post('/admin.siteproperties.save/{edit}/{id}', 'Admin\AdminController@saveSiteProperties');
Route::post('/admin.file.upload', 'Admin\AdminController@fileUpload');
/* ------------------------------------------------------------------
---------------------------------------------------------------------Api for ajax end
---------------------------------------------------------------------*/
Route::resource('/', 'HomepageController');
Route::resource('/admin', 'Admin\AdminController');























































//---------------------------------------------------------------------------admin ajax..
Route::get('cli/admin-password-change', 'Admin\AdminController@adminpassword');

