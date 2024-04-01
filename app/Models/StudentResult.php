<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentResult extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'student_results';

    protected $casts = [
        'inactive' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'related_student_name_id',
        'related_class_name_id',
        'related_test_name_id',
        'related_ability_name_id',
        'create_test_id',
        'result_score_total',
        'sten_score',
        'inactive',
    ];

    public $filterable = [
        'id',
        'related_student_name.name',
        'related_class_name.class_name',
        'related_test_name.test_name',
        'related_ability_name.ability_name',
        'create_test.max_student_join',
        'result_score_total',
        'sten_score',
    ];

    public $orderable = [
        'id',
        'related_student_name.name',
        'related_class_name.class_name',
        'related_test_name.test_name',
        'related_ability_name.ability_name',
        'create_test.max_student_join',
        'result_score_total',
        'sten_score',
        'inactive',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function relatedStudentName()
    {
        return $this->belongsTo(User::class);
    }

    public function relatedClassName()
    {
        return $this->belongsTo(ClassMaster::class);
    }

    public function relatedTestName()
    {
        return $this->belongsTo(Test::class);
    }

    public function relatedAbilityName()
    {
        return $this->belongsTo(AbilityMaster::class);
    }

    public function createTest()
    {
        return $this->belongsTo(CreateTest::class);
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
