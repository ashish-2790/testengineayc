<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OverallStudentObservation extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'overall_student_observations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'class_id',
        'student_id',
        'short_description',
        'detailed_observation_1',
        'detailed_observation_2',
        'detailed_observation_3',
        'detailed_observation_4',
        'detailed_observation_5',
    ];

    public $orderable = [
        'id',
        'class.class_name',
        'student.phone_no',
        'short_description',
        'detailed_observation_1',
        'detailed_observation_2',
        'detailed_observation_3',
        'detailed_observation_4',
        'detailed_observation_5',
    ];

    public $filterable = [
        'id',
        'class.class_name',
        'student.phone_no',
        'short_description',
        'detailed_observation_1',
        'detailed_observation_2',
        'detailed_observation_3',
        'detailed_observation_4',
        'detailed_observation_5',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function class()
    {
        return $this->belongsTo(ClassMaster::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
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
