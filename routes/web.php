<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Auth;

// The user must log in
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Auth::routes();

// Route to display the dashboard index page
Route::get('/dashboard', [Dashboard::class, 'index'])->name('index');

// Route to handle the school creation form submission
Route::post('/dashboard/create-school', [Dashboard::class, 'store'])->name('schools.store');

// Duplicate route for creating a school, potentially an error
Route::post('/dashboard/create-school', [Dashboard::class, 'createSchool'])->name('create-school');

// Route to fetch the list of schools
Route::get('/dashboard/schools', [Dashboard::class, 'getSchools'])->name('get-schools');

// Route to fetch all schools
Route::get('/dashboard/all-schools', [Dashboard::class, 'allSchools'])->name('all-schools');

// Route to show the edit form for a specific school
Route::get('/dashboard/edit-school/{id}', [Dashboard::class, 'showEditSchoolForm'])->name('show-edit-school-form');

// Route to handle the school edit form submission
Route::post('/dashboard/editschool/{id}', [Dashboard::class, 'editSchool'])->name('edit-school');

// Route to delete a specific school
Route::delete('/dashboard/delete-school/{id}', [Dashboard::class, 'deleteSchool'])->name('delete-school');

// Route to get the details of a school
Route::get('/dashboard/school-details', [Dashboard::class, 'getSchoolDetails'])->name('school-details');

// Route to handle the submission of school details creation form
Route::post('/dashboard/create-school-details', [Dashboard::class, 'createSchoolDetails'])->name('create-school-details');

// Route to show the edit form for school details
Route::get('/dashboard/edit-school-details/{id}', [Dashboard::class, 'showEditSchoolDetailsForm'])->name('edit-school-details-form');

// Route to handle the school details edit form submission
//Route::post('/dashboard/editschooldetails/{id}', [Dashboard::class, 'editSchoolDetails'])->name('edit-school-details');
Route::put('/dashboard/editschooldetails/{id}', [Dashboard::class, 'editSchoolDetails'])->name('edit-school-details');


// Route for a test endpoint
Route::get('/test', [Dashboard::class, 'test'])->name('test');

// Route to handle logging out
Route::get('/logout', [Dashboard::class, 'logout'])->name('logout');

// Resource route for schools, providing typical CRUD routes
Route::resource('schools', Dashboard::class);

Route::get('/school-details', [Dashboard::class, 'showSchoolDetails'])->name('school-details');
Route::post('/create-school-details', [Dashboard::class, 'createSchoolDetails'])->name('create-school-details');