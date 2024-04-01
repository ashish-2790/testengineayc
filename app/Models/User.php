<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Hash;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements HasLocalePreference
{
    use HasFactory, HasAdvancedFilter, Notifiable, SoftDeletes;

    public $table = 'users';

    protected $hidden = [
        'remember_token',
        'password',
    ];

    public const DISABILITY_STATUS_RADIO = [
        'fit'   => 'Fit',
        'unfit' => 'Unfit',
    ];

    public const GENDER_RADIO = [
        '1' => 'Male',
        '2' => 'Female',
        '3' => 'Other',
    ];

    public const QUALIFICATION_STATUS_RADIO = [
        'appearing' => 'Appearing',
        'passed'    => 'Passed',
    ];

    protected $dates = [
        'email_verified_at',
        'date_of_birth',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'related_school_name_id',
        'name',
        'email',
        'password',
        'related_class_name_id',
        'locale',
        'phone_no',
        'age',
        'gender',
        'occupation',
        'address',
        'date_of_birth',
        'disability_status',
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
        'related_school_name.name',
        'name',
        'email',
        'email_verified_at',
        'related_class_name.class_name',
        'locale',
        'phone_no',
        'age',
        'gender',
        'occupation',
        'address',
        'date_of_birth',
        'disability_status',
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
        'related_school_name.name',
        'name',
        'email',
        'email_verified_at',
        'related_class_name.class_name',
        'related_test_type.test_name',
        'roles.title',
        'locale',
        'phone_no',
        'age',
        'gender',
        'occupation',
        'address',
        'date_of_birth',
        'disability_status',
        'qualification_status',
        'stream_group.stream_group_master',
        'stream.stream_name',
        'percent_10',
        'percent_11',
        'percent_12',
        'percent_graduation',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('title', 'Admin')->exists();
    }

    public function getIsSchoolAttribute()
    {
        return $this->roles()->where('title', 'School')->exists();
    }

    public function getIsStudentAttribute()
    {
        return $this->roles()->where('title', 'Student')->exists();
    }

    public function scopeAdmins()
    {
        return $this->whereHas('roles', fn ($q) => $q->where('title', 'Admin'));
    }

    public function preferredLocale()
    {
        return $this->locale;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function relatedSchoolName()
    {
        return $this->belongsTo(School::class);
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function relatedClassName()
    {
        return $this->belongsTo(ClassMaster::class);
    }

    public function relatedTestType()
    {
        return $this->belongsToMany(Test::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getGenderLabelAttribute($value)
    {
        return static::GENDER_RADIO[$this->gender] ?? null;
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDisabilityStatusLabelAttribute($value)
    {
        return static::DISABILITY_STATUS_RADIO[$this->disability_status] ?? null;
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