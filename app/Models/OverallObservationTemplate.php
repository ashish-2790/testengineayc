<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OverallObservationTemplate extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'overall_observation_templates';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'test_type_id',
        'overall_stenscore_from',
        'overall_stenscore_to',
        'short_description',
        'detailed_observation_1',
        'detailed_observation_2',
        'detailed_observation_3',
        'detailed_observation_4',
        'detailed_observation_5',
        'detailed_observation_6',
        'ability_1_from',
        'ability_1_to',
        'ability_2_from',
        'ability_2_to',
        'ability_3_from',
        'ability_3_to',
        'ability_4_from',
        'ability_4_to',
        'ability_5_from',
        'ability_5_to',
        'ability_6_from',
        'ability_6_to',
        'ability_7_from',
        'ability_7_to',
        'ability_8_from',
        'ability_8_to',
        'ability_9_from',
        'ability_9_to',
        'ability_10_from',
        'ability_10_to',
        'ability_11_from',
        'ability_11_to',
        'ability_12_from',
        'ability_12_to',
        'ability_13_from',
        'ability_13_to',
        'ability_14_from',
        'ability_14_to',
        'ability_15_from',
        'ability_15_to',
        'ability_16_from',
        'ability_16_to',
        'ability_17_from',
        'ability_17_to',
        'ability_18_from',
        'ability_18_to',
        'ability_19_from',
        'ability_19_to',
        'ability_20_from',
        'ability_20_to',
        'ability_21_from',
        'ability_21_to',
        'ability_22_from',
        'ability_22_to',
        'ability_23_from',
        'ability_23_to',
        'ability_24_from',
        'ability_24_to',
        'ability_25_from',
        'ability_25_to',
    ];

    public $orderable = [
        'id',
        'test_type.test_name',
        'overall_stenscore_from',
        'overall_stenscore_to',
        'short_description',
        'detailed_observation_1',
        'detailed_observation_2',
        'detailed_observation_3',
        'detailed_observation_4',
        'detailed_observation_5',
        'detailed_observation_6',
        'ability_1_from',
        'ability_1_to',
        'ability_2_from',
        'ability_2_to',
        'ability_3_from',
        'ability_3_to',
        'ability_4_from',
        'ability_4_to',
        'ability_5_from',
        'ability_5_to',
        'ability_6_from',
        'ability_6_to',
        'ability_7_from',
        'ability_7_to',
        'ability_8_from',
        'ability_8_to',
        'ability_9_from',
        'ability_9_to',
        'ability_10_from',
        'ability_10_to',
        'ability_11_from',
        'ability_11_to',
        'ability_12_from',
        'ability_12_to',
        'ability_13_from',
        'ability_13_to',
        'ability_14_from',
        'ability_14_to',
        'ability_15_from',
        'ability_15_to',
        'ability_16_from',
        'ability_16_to',
        'ability_17_from',
        'ability_17_to',
        'ability_18_from',
        'ability_18_to',
        'ability_19_from',
        'ability_19_to',
        'ability_20_from',
        'ability_20_to',
        'ability_21_from',
        'ability_21_to',
        'ability_22_from',
        'ability_22_to',
        'ability_23_from',
        'ability_23_to',
        'ability_24_from',
        'ability_24_to',
        'ability_25_from',
        'ability_25_to',
    ];

    public $filterable = [
        'id',
        'class.class_name',
        'test_type.test_name',
        'overall_stenscore_from',
        'overall_stenscore_to',
        'short_description',
        'detailed_observation_1',
        'detailed_observation_2',
        'detailed_observation_3',
        'detailed_observation_4',
        'detailed_observation_5',
        'detailed_observation_6',
        'stream_group.stream_group_master',
        'stream.stream_name',
        'course.course_name',
        'college.college_name',
        'profession.profession_name',
        'ability_1_from',
        'ability_1_to',
        'ability_2_from',
        'ability_2_to',
        'ability_3_from',
        'ability_3_to',
        'ability_4_from',
        'ability_4_to',
        'ability_5_from',
        'ability_5_to',
        'ability_6_from',
        'ability_6_to',
        'ability_7_from',
        'ability_7_to',
        'ability_8_from',
        'ability_8_to',
        'ability_9_from',
        'ability_9_to',
        'ability_10_from',
        'ability_10_to',
        'ability_11_from',
        'ability_11_to',
        'ability_12_from',
        'ability_12_to',
        'ability_13_from',
        'ability_13_to',
        'ability_14_from',
        'ability_14_to',
        'ability_15_from',
        'ability_15_to',
        'ability_16_from',
        'ability_16_to',
        'ability_17_from',
        'ability_17_to',
        'ability_18_from',
        'ability_18_to',
        'ability_19_from',
        'ability_19_to',
        'ability_20_from',
        'ability_20_to',
        'ability_21_from',
        'ability_21_to',
        'ability_22_from',
        'ability_22_to',
        'ability_23_from',
        'ability_23_to',
        'ability_24_from',
        'ability_24_to',
        'ability_25_from',
        'ability_25_to',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function class()
    {
        return $this->belongsToMany(ClassMaster::class);
    }

    public function testType()
    {
        return $this->belongsTo(Test::class);
    }

    public function streamGroup()
    {
        return $this->belongsToMany(StreamGroup::class);
    }

    public function stream()
    {
        return $this->belongsToMany(StreamMaster::class);
    }

    public function course()
    {
        return $this->belongsToMany(CourseMaster::class);
    }

    public function college()
    {
        return $this->belongsToMany(CollegeMaster::class);
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
