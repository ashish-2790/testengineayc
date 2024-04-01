<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentEvaluationReport extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'student_evaluation_reports';

    protected $casts = [
        'inactive' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'related_student_id',
        'related_class_name_id',
        'related_test_id',
        'related_ability_id',
        'create_test_id',
        'related_observation_template_id',
        'sten_score',
        'observation_1',
        'observation_2',
        'observation_3',
        'observation_4',
        'observation_5',
        'observation_6',
        'inactive',
    ];

    public $orderable = [
        'id',
        'related_student.name',
        'related_class_name.class_name',
        'related_test.test_name',
        'related_ability.ability_name',
        'create_test.max_student_join',
        'related_observation_template.sten_score_from',
        'sten_score',
        'observation_1',
        'observation_2',
        'observation_3',
        'observation_4',
        'observation_5',
        'observation_6',
        'inactive',
    ];

    public $filterable = [
        'id',
        'related_student.name',
        'related_class_name.class_name',
        'related_test.test_name',
        'related_ability.ability_name',
        'create_test.max_student_join',
        'related_observation_template.sten_score_from',
        'sten_score',
        'observation_1',
        'observation_2',
        'observation_3',
        'observation_4',
        'observation_5',
        'observation_6',
        'related_college.college_name',
        'related_stream.stream_name',
        'related_profession.profession_name',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function relatedStudent()
    {
        return $this->belongsTo(User::class);
    }

    public function relatedClassName()
    {
        return $this->belongsTo(ClassMaster::class);
    }

    public function relatedTest()
    {
        return $this->belongsTo(Test::class);
    }

    public function relatedAbility()
    {
        return $this->belongsTo(AbilityMaster::class);
    }

    public function createTest()
    {
        return $this->belongsTo(CreateTest::class);
    }

    public function relatedObservationTemplate()
    {
        return $this->belongsTo(ObservationTemplate::class);
    }

    public function relatedCollege()
    {
        return $this->belongsToMany(CollegeMaster::class);
    }

    public function relatedStream()
    {
        return $this->belongsToMany(StreamMaster::class);
    }

    public function relatedProfession()
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
