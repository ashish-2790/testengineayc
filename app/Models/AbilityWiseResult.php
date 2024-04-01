<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AbilityWiseResult extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'ability_wise_results';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'student_test_taken_id',
        'overall_result_id',
        'ability_id',
        'ability_raw_score',
        'ability_sten_score',
        'short_description',
        'report_1',
        'report_2',
        'report_3',
        'report_4',
        'report_5',
        'report_6',
    ];

    public $orderable = [
        'id',
        'student_test_taken.stage',
        'overall_result.overall_sten_score',
        'ability.ability_name',
        'ability_raw_score',
        'ability_sten_score',
        'short_description',
        'report_1',
        'report_2',
        'report_3',
        'report_4',
        'report_5',
        'report_6',
    ];

    public $filterable = [
        'id',
        'student_test_taken.stage',
        'overall_result.overall_sten_score',
        'ability.ability_name',
        'ability_raw_score',
        'ability_sten_score',
        'short_description',
        'report_1',
        'report_2',
        'report_3',
        'report_4',
        'report_5',
        'report_6',
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

    public function ability()
    {
        return $this->belongsTo(AbilityMaster::class);
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
