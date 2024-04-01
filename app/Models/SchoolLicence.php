<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolLicence extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'school_licences';

    protected $casts = [
        'inactive' => 'boolean',
    ];

    protected $dates = [
        'valid_from',
        'valid_to',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'school_name_id',
        'related_class_name_id',
        'related_test_type_id',
        'student_count',
        'valid_from',
        'valid_to',
        'inactive',
    ];

    public $filterable = [
        'id',
        'school_name.name',
        'related_class_name.class_name',
        'related_test_type.test_name',
        'student_count',
        'valid_from',
        'valid_to',
    ];

    public $orderable = [
        'id',
        'school_name.name',
        'related_class_name.class_name',
        'related_test_type.test_name',
        'student_count',
        'valid_from',
        'valid_to',
        'inactive',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function schoolName()
    {
        return $this->belongsTo(School::class);
    }

    public function relatedClassName()
    {
        return $this->belongsTo(ClassMaster::class);
    }

    public function relatedTestType()
    {
        return $this->belongsTo(Test::class);
    }

    public function getValidFromAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setValidFromAttribute($value)
    {
        $this->attributes['valid_from'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getValidToAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setValidToAttribute($value)
    {
        $this->attributes['valid_to'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
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
