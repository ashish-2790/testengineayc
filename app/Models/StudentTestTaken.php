<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentTestTaken extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'student_test_takens';

    protected $casts = [
        'inactive' => 'boolean',
    ];

    public const STAGE_SELECT = [
        '1' => 'Pending',
        '2' => 'In Progress',
        '3' => 'Completed',
        '4' => 'Time-exhausted',
    ];

    protected $dates = [
        'started_at',
        'ended_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'related_class_name_id',
        'related_student_id',
        'related_create_test_id',
        'started_at',
        'ended_at',
        'stage',
        'inactive',
        'udf_1', //Timeleft
        'udf_5', //Report Generated
    ];

    public $filterable = [
        'id',
        'related_class_name.class_name',
        'related_student.name',
        'related_create_test.instruction',
        'started_at',
        'ended_at',
        'stage',
    ];

    public $orderable = [
        'id',
        'related_class_name.class_name',
        'related_student.name',
        'related_create_test.instruction',
        'started_at',
        'ended_at',
        'stage',
        'inactive',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function relatedClassName()
    {
        return $this->belongsTo(ClassMaster::class);
    }

    public function relatedStudent()
    {
        return $this->belongsTo(User::class);
    }

    public function relatedCreateTest()
    {
        return $this->belongsTo(CreateTest::class);
    }

    public function getStartedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setStartedAtAttribute($value)
    {
        $this->attributes['started_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setEndedAtAttribute($value)
    {
        $this->attributes['ended_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getStageLabelAttribute($value)
    {
        return static::STAGE_SELECT[$this->stage] ?? null;
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
