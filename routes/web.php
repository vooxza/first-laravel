<?php

use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminClassroomController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\Admin\AdminGuardianController;
use App\Http\Controllers\Admin\AdminSubjectController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

//  ROUTE UNTUK USER / PUBLIC
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
    Route::get('/student', [StudentController::class, 'index'])->name('student');
    Route::get('/guardian', [GuardianController::class, 'index'])->name('guardian');
    Route::get('/classroom', [ClassroomController::class, 'index'])->name('classroom');
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher');
    Route::get('/subject', [SubjectController::class, 'index'])->name('subject');
});

//  ROUTE UNTUK ADMIN PANEL
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('dashboard');

    // Profil Admin
    Route::get('/profil', [AdminProfileController::class, 'adminIndex'])->name('profil');

    // Student Admin
    Route::get('/student', [AdminStudentController::class, 'index'])->name('student.index');
    Route::post('/student', [AdminStudentController::class, 'store'])->name('student.store');
    Route::put('/student/{id}', [AdminStudentController::class, 'update'])->name('student.update');
    Route::delete('/student/{id}', [AdminStudentController::class, 'destroy'])->name('student.destroy');


    // Teacher Admin
    Route::get('/teacher', [AdminTeacherController::class, 'index'])->name('teacher.index');
    Route::post('/teacher', [AdminTeacherController::class, 'store'])->name('teacher.store');
    Route::put('/teacher/{id}', [AdminTeacherController::class, 'update'])->name('teacher.update');
    Route::delete('/teacher/{id}', [AdminTeacherController::class, 'destroy'])->name('teacher.destroy');
    Route::get('/teacher/component', [AdminTeacherController::class, 'adminIndex'])->name('teacher.component');


    // Guardian Admin
    Route::get('/guardian', [AdminGuardianController::class, 'index'])->name('guardian.index');
    Route::post('/guardian', [AdminGuardianController::class, 'store'])->name('guardian.store');
    Route::put('/guardian/{id}', [AdminGuardianController::class, 'update'])->name('guardian.update');
    Route::delete('/guardian/{id}', [AdminGuardianController::class, 'destroy'])->name('guardian.destroy'); 


    // Subject Admin
    Route::get('/subject', [AdminSubjectController::class, 'adminIndex'])->name('subject.index');
    Route::post('/subject/store', [AdminSubjectController::class, 'store'])->name('subject.store');


    // Classroom Admin
    Route::get('/classroom', [AdminClassroomController::class, 'adminIndex'])->name('classroom.index');
    Route::post('/classroom/store', [AdminClassroomController::class, 'store'])->name('classroom.store');


    // Kontak Admin
    Route::get('/kontak', [AdminContactController::class, 'adminIndex'])->name('kontak');
});
