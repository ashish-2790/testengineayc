<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateTest extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'create_tests';

    protected $casts = [
        'inactive' => 'boolean',
    ];

    protected $dates = [
        'valid_from',
        'valid_to',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'instruction',
        'video_url',
        'related_question_paper_id',
        'valid_from',
        'valid_to',
        'related_class_id',
        'related_test_type_id',
        'max_student_join',
        'maximum_score',
        'minimum_score',
        'inactive',
        'udf_1',// defined for test duration
    ];

    public $filterable = [
        'id',
        'instruction',
        'video_url',
        'related_question_paper.question_paper_name',
        'valid_from',
        'valid_to',
        'related_class.class_name',
        'related_test_type.test_name',
        'max_student_join',
        'maximum_score',
        'minimum_score',
    ];

    public $orderable = [
        'id',
        'instruction',
        'video_url',
        'related_question_paper.question_paper_name',
        'valid_from',
        'valid_to',
        'related_class.class_name',
        'related_test_type.test_name',
        'max_student_join',
        'maximum_score',
        'minimum_score',
        'inactive',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function relatedQuestionPaper()
    {
        return $this->belongsTo(QuestionPaper::class);
    }

    public function getValidFromAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setValidFromAttribute($value)
    {
        $this->attributes['valid_from'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getValidToAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setValidToAttribute($value)
    {
        $this->attributes['valid_to'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function relatedClass()
    {
        return $this->belongsTo(ClassMaster::class);
    }

    public function relatedTestType()
    {
        return $this->belongsTo(Test::class);
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
