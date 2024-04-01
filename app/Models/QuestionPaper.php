<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionPaper extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'question_papers';

    protected $casts = [
        'inactive' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'related_class_id',
        'related_test_id',
        'question_paper_name',
        'inactive',
    ];

    public $orderable = [
        'id',
        'related_class.class_name',
        'related_test.test_name',
        'question_paper_name',
        'inactive',
    ];

    public $filterable = [
        'id',
        'related_class.class_name',
        'related_test.test_name',
        'related_ability.ability_name',
        'question_paper_name',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function relatedClass()
    {
        return $this->belongsTo(ClassMaster::class);
    }

    public function relatedTest()
    {
        return $this->belongsTo(Test::class);
    }

    public function relatedAbility()
    {
        return $this->belongsToMany(AbilityMaster::class);
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
