<?php

use App\Http\Controllers\Admin\AbilityMasterController;
use App\Http\Controllers\Admin\AbilityWiseObservationController;
use App\Http\Controllers\Admin\AbilityWiseResultController;
use App\Http\Controllers\Admin\ClassMasterController;
use App\Http\Controllers\Admin\CollegeMasterController;
use App\Http\Controllers\Admin\CourseMasterController;
use App\Http\Controllers\Admin\CreateTestController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ObservationTemplateController;
use App\Http\Controllers\Admin\OverallObservationController;
use App\Http\Controllers\Admin\OverallObservationTemplateController;
use App\Http\Controllers\Admin\OverallReportTemplateController;
use App\Http\Controllers\Admin\OverallResultReportController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProfessionMasterController;
use App\Http\Controllers\Admin\QuestionBankController;
use App\Http\Controllers\Admin\QuestionPaperController;
use App\Http\Controllers\Admin\ReportTemplateController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\SchoolLicenceController;
use App\Http\Controllers\Admin\StenChartController;
use App\Http\Controllers\Admin\StreamGroupController;
use App\Http\Controllers\Admin\StreamMasterController;
use App\Http\Controllers\Admin\StudentTestAnswerController;
use App\Http\Controllers\Admin\StudentTestTakenController;
use App\Http\Controllers\Admin\SystemOptionController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\UploadMasterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::redirect('/login', '/login');

Auth::routes(['register' => true]);

Route::get('/', [HomeController::class, 'home'])->name('home');


Route::group(['middleware' => ['auth']], function () {

    Route::get('/testscreen', [HomeController::class, 'testScreen'])->name('testscreen');
    Route::get('/exam-list', [HomeController::class, 'examList'])->name('exam-list');
    Route::get('/testing', [HomeController::class, 'testing'])->name('testing');
    Route::get('/student-detail', [HomeController::class, 'studentDetail'])->name('student-detail');

});


Route::group(['prefix' => 'school', 'as' => 'school.', 'middleware' => ['auth']], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Users
    Route::get('/student-list', [HomeController::class, 'studentList'])->name('student-list');


});


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('student-report', [HomeController::class, 'studentReport'])->name('student-report');
    Route::get('student-exam-list', [HomeController::class, 'studentExamlist'])->name('student-exam-list');
    Route::get('studentlist', [HomeController::class, 'studentList'])->name('studentlist');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // School
    Route::post('schools/media', [SchoolController::class, 'storeMedia'])->name('schools.storeMedia');
    Route::resource('schools', SchoolController::class, ['except' => ['store', 'update', 'destroy']]);

    // School Licence
    Route::resource('school-licences', SchoolLicenceController::class, ['except' => ['store', 'update', 'destroy']]);

    // Test
    Route::resource('tests', TestController::class, ['except' => ['store', 'update', 'destroy']]);

    // Class Master
    Route::resource('class-masters', ClassMasterController::class, ['except' => ['store', 'update', 'destroy']]);

    // Question Paper
    Route::resource('question-papers', QuestionPaperController::class, ['except' => ['store', 'update', 'destroy']]);

    // Ability Master
    Route::resource('ability-masters', AbilityMasterController::class, ['except' => ['store', 'update', 'destroy']]);

    // Question Bank
    Route::post('question-banks/media', [QuestionBankController::class, 'storeMedia'])->name('question-banks.storeMedia');
    Route::resource('question-banks', QuestionBankController::class, ['except' => ['store', 'update', 'destroy']]);

    // Create Test
    Route::resource('create-tests', CreateTestController::class, ['except' => ['store', 'update', 'destroy']]);

    // Student Test Taken
    Route::resource('student-test-takens', StudentTestTakenController::class, ['except' => ['store', 'update', 'destroy']]);

    // Student Test Answer
    Route::resource('student-test-answers', StudentTestAnswerController::class, ['except' => ['store', 'update', 'destroy']]);

    // Observation Template
    Route::resource('observation-templates', ObservationTemplateController::class, ['except' => ['store', 'update', 'destroy']]);

    // Stream Master
    Route::resource('stream-masters', StreamMasterController::class, ['except' => ['store', 'update', 'destroy']]);

    // College Master
    Route::resource('college-masters', CollegeMasterController::class, ['except' => ['store', 'update', 'destroy']]);

    // Profession Master
    Route::resource('profession-masters', ProfessionMasterController::class, ['except' => ['store', 'update', 'destroy']]);

    // Report Template
    Route::resource('report-templates', ReportTemplateController::class, ['except' => ['store', 'update', 'destroy']]);

    // Sten Chart
    Route::resource('sten-charts', StenChartController::class, ['except' => ['store', 'update', 'destroy']]);

    // Course Master
    Route::post('course-masters/media', [CourseMasterController::class, 'storeMedia'])->name('course-masters.storeMedia');
    Route::resource('course-masters', CourseMasterController::class, ['except' => ['store', 'update', 'destroy']]);

    // System Option
    Route::resource('system-options', SystemOptionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Upload Master
    Route::post('upload-masters/media', [UploadMasterController::class, 'storeMedia'])->name('upload-masters.storeMedia');
    Route::resource('upload-masters', UploadMasterController::class, ['except' => ['store', 'update', 'destroy']]);

    // Overall Report Template
    Route::resource('overall-report-templates', OverallReportTemplateController::class, ['except' => ['store', 'update', 'destroy']]);

    // Overall Observation Template
    Route::resource('overall-observation-templates', OverallObservationTemplateController::class, ['except' => ['store', 'update', 'destroy']]);

    // Stream Group
    Route::resource('stream-groups', StreamGroupController::class, ['except' => ['store', 'update', 'destroy']]);

    // Overall Result Report
    Route::resource('overall-result-reports', OverallResultReportController::class, ['except' => ['store', 'update', 'destroy']]);

    // Ability Wise Result
    Route::resource('ability-wise-results', AbilityWiseResultController::class, ['except' => ['store', 'update', 'destroy']]);

    // Overall Observation
    Route::resource('overall-observations', OverallObservationController::class, ['except' => ['store', 'update', 'destroy']]);

    // Ability Wise Observation
    Route::resource('ability-wise-observations', AbilityWiseObservationController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
