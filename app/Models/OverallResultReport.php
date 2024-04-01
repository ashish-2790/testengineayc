<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OverallResultReport extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'overall_result_reports';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'student_test_taken_id',
        'overall_raw_score',
        'overall_sten_score',
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
        'overall_raw_score',
        'overall_sten_score',
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
        'overall_raw_score',
        'overall_sten_score',
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
