<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentTestAnswer extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'student_test_answers';

    protected $casts = [
        'inactive' => 'boolean',
        'udf_1' => 'integer',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const ANSWER_STATUS_SELECT = [
        '1' => 'Pending',
        '2' => 'Flag',
        '3' => 'Submit',
        '4' => 'Submitted & Pending Review',
    ];

    protected $fillable = [
        'related_student_id',
        'related_student_test_taken_id',
        'related_question_bank_id',
        'create_test_id',
        'answer_choice',
        'score',
        'answer_status',
        'inactive',
        'udf_1', // defined for question serial no
        'udf_2', // defined for ability id
    ];

    public $filterable = [
        'id',
        'related_student.name',
        'related_student_test_taken.started_at',
        'related_question_bank.question_text',
        'create_test.max_student_join',
        'answer_choice',
        'score',
        'answer_status',
    ];

    public $orderable = [
        'id',
        'related_student.name',
        'related_student_test_taken.started_at',
        'related_question_bank.question_text',
        'create_test.max_student_join',
        'answer_choice',
        'score',
        'answer_status',
        'inactive',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function relatedStudent()
    {
        return $this->belongsTo(User::class);
    }

    public function relatedStudentTestTaken()
    {
        return $this->belongsTo(StudentTestTaken::class);
    }

    public function relatedQuestionBank()
    {
        return $this->belongsTo(QuestionBank::class);
    }

    public function createTest()
    {
        return $this->belongsTo(CreateTest::class);
    }

    public function relatedAbility()
    {
        return $this->belongsTo(AbilityMaster::class,'udf_2','id');
    }

    public function getAnswerStatusLabelAttribute($value)
    {
        return static::ANSWER_STATUS_SELECT[$this->answer_status] ?? null;
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }
}
