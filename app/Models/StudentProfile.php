<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentProfile extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'student_profiles';

    public const DISABILITY_RADIO = [
        'fit'   => 'Fit',
        'unfit' => 'unFit',
    ];

    protected $dates = [
        'date_of_birth',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const QUALIFICATION_STATUS_RADIO = [
        'appearing' => 'Appearing',
        'passed'    => 'Passed',
    ];

    protected $fillable = [
        'user_id',
        'date_of_birth',
        'disability',
        'qualification_status',
        'stream_group_id',
        'stream_id',
        'percent_10',
        'percent_11',
        'percent_12',
        'percent_graduation',
    ];

    public $orderable = [
        'id',
        'user.name',
        'date_of_birth',
        'disability',
        'qualification_status',
        'stream_group.stream_group_master',
        'stream.stream_name',
        'percent_10',
        'percent_11',
        'percent_12',
        'percent_graduation',
    ];

    public $filterable = [
        'id',
        'user.name',
        'date_of_birth',
        'disability',
        'qualification_status',
        'stream_group.stream_group_master',
        'stream.stream_name',
        'percent_10',
        'percent_11',
        'percent_12',
        'percent_graduation',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDisabilityLabelAttribute($value)
    {
        return static::DISABILITY_RADIO[$this->disability] ?? null;
    }

    public function getQualificationStatusLabelAttribute($value)
    {
        return static::QUALIFICATION_STATUS_RADIO[$this->qualification_status] ?? null;
    }

    public function streamGroup()
    {
        return $this->belongsTo(StreamGroup::class);
    }

    public function stream()
    {
        return $this->belongsTo(StreamMaster::class);
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
