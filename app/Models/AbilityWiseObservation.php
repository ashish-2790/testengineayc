<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AbilityWiseObservation extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'ability_wise_observations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'student_test_taken_id',
        'overall_observation_id',
        'ability_result_id',
        'ability_id',
        'short_description',
        'ability_sten_score',
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
        'overall_observation.overall_sten_score',
        'ability_result.ability_sten_score',
        'ability.ability_name',
        'short_description',
        'ability_sten_score',
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
        'overall_observation.overall_sten_score',
        'ability_result.ability_sten_score',
        'ability.ability_name',
        'short_description',
        'ability_sten_score',
        'observation_1',
        'observation_2',
        'observation_3',
        'observation_4',
        'observation_5',
        'observation_6',
        'stream_group.stream_group_master',
        'stream_master.stream_name',
        'college.college_name',
        'course.course_name',
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

    public function overallObservation()
    {
        return $this->belongsTo(OverallObservation::class);
    }

    public function abilityResult()
    {
        return $this->belongsTo(AbilityWiseResult::class);
    }

    public function ability()
    {
        return $this->belongsTo(AbilityMaster::class);
    }

    public function streamGroup()
    {
        return $this->belongsToMany(StreamGroup::class);
    }

    public function streamMaster()
    {
        return $this->belongsToMany(StreamMaster::class);
    }

    public function college()
    {
        return $this->belongsToMany(CollegeMaster::class);
    }

    public function course()
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
