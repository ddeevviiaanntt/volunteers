<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Basic pages
Route::get('/', 'PageController@home');
Route::get('/about', 'PageController@view');


// User authentication routes
Route::get('/register', 'PageController@view');
Route::get('/login', 'PageController@view');
Route::get('/logout', 'UserController@logout');

Route::post('/register', 'UserController@create');
Route::post('/login', 'UserController@login');

Route::get('/forgot', 'PageController@view');
Route::post('/forgot', 'UserController@forgotPassword');
Route::get('/forgot/{token}', 'UserController@verifyToken');
Route::post('/forgot/{token}', 'UserController@changePassword');



// Event routes
Route::get('/event', 'EventController@createForm');
Route::post('/event', 'EventController@create');

Route::get('/event/{event}/edit', 'EventController@editForm');
Route::post('/event/{event}/edit', 'EventController@edit');

Route::get('/event/{event}/delete', 'EventController@deleteForm');
Route::post('/event/{event}/delete', 'EventController@delete');

Route::get('/event/{event}/clone', 'EventController@cloneForm');
Route::post('/event/{event}/clone', 'EventController@cloneEvent');

Route::get('/event/{event}', 'EventController@view');


// Department routes
Route::get('/event/{event}/departments', 'DepartmentController@listDepartments');
Route::get('/event/{event}/department/create', 'DepartmentController@createForm');
Route::post('/department', 'DepartmentController@create');

Route::get('/department/{department}/edit', 'DepartmentController@editForm');
Route::post('/department/{department}/edit', 'DepartmentController@edit');

Route::get('/department/{department}/delete', 'DepartmentController@deleteForm');
Route::post('/department/{department}/delete', 'DepartmentController@delete');


// Shift routes
Route::get('/event/{event}/shifts', 'ShiftController@listShifts');
Route::get('/event/{event}/shift/create', 'ShiftController@createForm');
Route::post('/shift', 'ShiftController@create');

Route::get('/shift/{shift}/edit', 'ShiftController@editForm');
Route::post('/shift/{shift}/edit', 'ShiftController@edit');

Route::get('/shift/{shift}/delete', 'ShiftController@deleteForm');
Route::post('/shift/{shift}/delete', 'ShiftController@delete');


// Schedule routes
Route::get('/event/{event}/schedule/create', 'ScheduleController@createForm');
Route::post('/schedule', 'ScheduleController@create');

Route::get('/schedule/{schedule}/edit', 'ScheduleController@editForm');
Route::post('/schedule/{schedule}/edit', 'ScheduleController@edit');

Route::get('/schedule/{schedule}/delete', 'ScheduleController@deleteForm');
Route::post('/schedule/{schedule}/delete', 'ScheduleController@delete');


// Slot routes
Route::get('/slot/{slot}/take', 'SlotController@takeForm');
Route::post('/slot/{slot}/take', 'SlotController@take');

Route::get('/slot/{slot}/release', 'SlotController@releaseForm');
Route::post('/slot/{slot}/release', 'SlotController@release');


// User profile routes
Route::get('/profile', 'ProfileController@view');
Route::get('/profile/shifts', 'ProfileController@shifts');

Route::get('/profile/edit', 'ProfileController@editForm');
Route::post('/profile/edit', 'ProfileController@edit');

Route::get('/profile/upload', 'ProfileController@uploadForm');
Route::post('/profile/upload', 'ProfileController@upload');


// Admin routes
Route::get('/users', 'AdminController@userList');
Route::get('/user/{user}', 'AdminController@userProfile');
Route::post('/user/{user}/edit', 'AdminController@userEdit');

Route::get('/uploads', 'AdminController@uploadList');
Route::post('/upload/{upload}/edit', 'AdminController@uploadEdit'); 

Route::get('/reports', 'ReportController@reportList');
Route::post('/report/users', 'ReportController@searchUsers');
Route::post('/report/departments', 'ReportController@getDepartments');
Route::post('/report/days', 'ReportController@getDays');
Route::post('/report/generate', 'ReportController@generateReport');

// Test routes
Route::get('/test/{event}', 'TimegridController@view');