<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OverallObservation extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'overall_observations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'student_test_taken_id',
        'overall_result_id',
        'overall_sten_score',
        'short_description',
        'observation_1',
        'observation_2',
        'observation_3',
        'observation_4',
        'observation_5',
        'observation_6',
    ];

    public $orderable = [
        'id',
        'student_test_taken.stage',
        'overall_result.overall_raw_score',
        'overall_sten_score',
        'short_description',
        'observation_1',
        'observation_2',
        'observation_3',
        'observation_4',
        'observation_5',
        'observation_6',
    ];

    public $filterable = [
        'id',
        'student_test_taken.stage',
        'overall_result.overall_raw_score',
        'overall_sten_score',
        'short_description',
        'observation_1',
        'observation_2',
        'observation_3',
        'observation_4',
        'observation_5',
        'observation_6',
        'stream_group.stream_group_master',
        'stream.stream_name',
        'college.college_name',
        'courses.course_name',
        'profession.profession_name',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function studentTestTaken()
    {
        return $this->belongsTo(StudentTestTaken::class);
    }

    public function overallResult()
    {
        return $this->belongsTo(OverallResultReport::class);
    }

    public function streamGroup()
    {
        return $this->belongsToMany(StreamGroup::class);
    }

    public function stream()
    {
        return $this->belongsToMany(StreamMaster::class);
    }

    public function college()
    {
        return $this->belongsToMany(CollegeMaster::class);
    }

    public function courses()
    {
        return $this->belongsToMany(CourseMaster::class);
    }

    public function profession()
    {
        return $this->belongsToMany(ProfessionMaster::class);
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
