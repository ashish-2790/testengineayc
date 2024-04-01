<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportTemplate extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'report_templates';

    protected $casts = [
        'inactive' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'related_class_name_id',
        'related_test_name_id',
        'related_ability_name_id',
        'test_sten_score_from',
        'test_sten_score_to',
        'short_review',
        'report_1',
        'report_2',
        'report_3',
        'report_4',
        'report_5',
        'report_6',
    ];

    public $orderable = [
        'id',
        'related_class_name.class_name',
        'related_test_name.test_name',
        'related_ability_name.ability_name',
        'test_sten_score_from',
        'test_sten_score_to',
        'short_review',
        'report_1',
        'report_2',
        'report_3',
        'report_4',
        'report_5',
        'report_6',
    ];

    public $filterable = [
        'id',
        'related_class_name.class_name',
        'related_test_name.test_name',
        'related_ability_name.ability_name',
        'test_sten_score_from',
        'test_sten_score_to',
        'short_review',
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
