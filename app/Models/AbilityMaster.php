<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AbilityMaster extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'ability_masters';

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
        'related_test_id',
        'ability_name',
        'ability_instruction',
    ];

    public $orderable = [
        'id',
        'related_class_name.class_name',
        'related_test.test_name',
        'ability_name',
        'ability_instruction',
    ];

    public $filterable = [
        'id',
        'related_class_name.class_name',
        'related_test.test_name',
        'ability_name',
        'ability_instruction',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function relatedClassName()
    {
        return $this->belongsTo(ClassMaster::class);
    }

    public function relatedTest()
    {
        return $this->belongsTo(Test::class);
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
