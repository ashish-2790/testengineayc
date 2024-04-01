<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StenChart extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'sten_charts';

    protected $casts = [
        'inactive' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'related_test_name_id',
        'related_ability_name_id',
        'related_class_id',
        'max_score_raw',
        'score_raw_from',
        'score_raw_to',
        'sten_score',
        'udf_1', // defined for gender 1- Boy ,2-Girl
        'inactive',
    ];

    public $filterable = [
        'id',
        'related_test_name.test_name',
        'related_ability_name.ability_name',
        'related_class.class_name',
        'max_score_raw',
        'score_raw_from',
        'score_raw_to',
        'sten_score',
    ];

    public $orderable = [
        'id',
        'related_test_name.test_name',
        'related_ability_name.ability_name',
        'related_class.class_name',
        'max_score_raw',
        'score_raw_from',
        'score_raw_to',
        'sten_score',
        'inactive',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function relatedTestName()
    {
        return $this->belongsTo(Test::class);
    }

    public function relatedAbilityName()
    {
        return $this->belongsTo(AbilityMaster::class);
    }

    public function relatedClass()
    {
        return $this->belongsTo(ClassMaster::class);
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
