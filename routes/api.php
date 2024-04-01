<?php

use App\Http\Controllers\Api\V1\Admin\AbilityMasterApiController;
use App\Http\Controllers\Api\V1\Admin\AbilityWiseObservationApiController;
use App\Http\Controllers\Api\V1\Admin\AbilityWiseResultApiController;
use App\Http\Controllers\Api\V1\Admin\ClassMasterApiController;
use App\Http\Controllers\Api\V1\Admin\CollegeMasterApiController;
use App\Http\Controllers\Api\V1\Admin\CourseMasterApiController;
use App\Http\Controllers\Api\V1\Admin\CreateTestApiController;
use App\Http\Controllers\Api\V1\Admin\ObservationTemplateApiController;
use App\Http\Controllers\Api\V1\Admin\OverallObservationApiController;
use App\Http\Controllers\Api\V1\Admin\OverallObservationTemplateApiController;
use App\Http\Controllers\Api\V1\Admin\OverallReportTemplateApiController;
use App\Http\Controllers\Api\V1\Admin\OverallResultReportApiController;
use App\Http\Controllers\Api\V1\Admin\ProfessionMasterApiController;
use App\Http\Controllers\Api\V1\Admin\QuestionBankApiController;
use App\Http\Controllers\Api\V1\Admin\QuestionPaperApiController;
use App\Http\Controllers\Api\V1\Admin\ReportTemplateApiController;
use App\Http\Controllers\Api\V1\Admin\SchoolApiController;
use App\Http\Controllers\Api\V1\Admin\SchoolLicenceApiController;
use App\Http\Controllers\Api\V1\Admin\StenChartApiController;
use App\Http\Controllers\Api\V1\Admin\StreamGroupApiController;
use App\Http\Controllers\Api\V1\Admin\StreamMasterApiController;
use App\Http\Controllers\Api\V1\Admin\StudentTestAnswerApiController;
use App\Http\Controllers\Api\V1\Admin\StudentTestTakenApiController;
use App\Http\Controllers\Api\V1\Admin\SystemOptionApiController;
use App\Http\Controllers\Api\V1\Admin\TestApiController;
use App\Http\Controllers\Api\V1\Admin\UploadMasterApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // School
    Route::post('schools/media', [SchoolApiController::class, 'storeMedia'])->name('schools.store_media');
    Route::apiResource('schools', SchoolApiController::class);

    // School Licence
    Route::apiResource('school-licences', SchoolLicenceApiController::class);

    // Test
    Route::apiResource('tests', TestApiController::class);

    // Class Master
    Route::apiResource('class-masters', ClassMasterApiController::class);

    // Question Paper
    Route::apiResource('question-papers', QuestionPaperApiController::class);

    // Ability Master
    Route::apiResource('ability-masters', AbilityMasterApiController::class);

    // Question Bank
    Route::post('question-banks/media', [QuestionBankApiController::class, 'storeMedia'])->name('question_banks.store_media');
    Route::apiResource('question-banks', QuestionBankApiController::class);

    // Create Test
    Route::apiResource('create-tests', CreateTestApiController::class);

    // Student Test Taken
    Route::apiResource('student-test-takens', StudentTestTakenApiController::class);

    // Student Test Answer
    Route::apiResource('student-test-answers', StudentTestAnswerApiController::class);

    // Observation Template
    Route::apiResource('observation-templates', ObservationTemplateApiController::class);

    // Stream Master
    Route::apiResource('stream-masters', StreamMasterApiController::class);

    // College Master
    Route::apiResource('college-masters', CollegeMasterApiController::class);

    // Profession Master
    Route::apiResource('profession-masters', ProfessionMasterApiController::class);

    // Report Template
    Route::apiResource('report-templates', ReportTemplateApiController::class);

    // Sten Chart
    Route::apiResource('sten-charts', StenChartApiController::class);

    // Course Master
    Route::post('course-masters/media', [CourseMasterApiController::class, 'storeMedia'])->name('course_masters.store_media');
    Route::apiResource('course-masters', CourseMasterApiController::class);

    // System Option
    Route::apiResource('system-options', SystemOptionApiController::class);

    // Upload Master
    Route::post('upload-masters/media', [UploadMasterApiController::class, 'storeMedia'])->name('upload_masters.store_media');
    Route::apiResource('upload-masters', UploadMasterApiController::class);

    // Overall Report Template
    Route::apiResource('overall-report-templates', OverallReportTemplateApiController::class);

    // Overall Observation Template
    Route::apiResource('overall-observation-templates', OverallObservationTemplateApiController::class);

    // Stream Group
    Route::apiResource('stream-groups', StreamGroupApiController::class);

    // Overall Result Report
    Route::apiResource('overall-result-reports', OverallResultReportApiController::class);

    // Ability Wise Result
    Route::apiResource('ability-wise-results', AbilityWiseResultApiController::class);

    // Overall Observation
    Route::apiResource('overall-observations', OverallObservationApiController::class);

    // Ability Wise Observation
    Route::apiResource('ability-wise-observations', AbilityWiseObservationApiController::class);
});
