<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class School extends Model implements HasMedia
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, InteractsWithMedia;

    public $table = 'schools';

    protected $casts = [
        'inactive' => 'boolean',
    ];

    protected $appends = [
        'logo_square',
        'logo_wide',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'address',
        'email',
        'website',
        'phone_no',
        'school_code',
        'affiliation',
        'inactive',
    ];

    public $orderable = [
        'id',
        'name',
        'address',
        'email',
        'website',
        'phone_no',
        'school_code',
        'affiliation',
        'inactive',
    ];

    public $filterable = [
        'id',
        'class_name.class_name',
        'name',
        'address',
        'email',
        'website',
        'phone_no',
        'school_code',
        'affiliation',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function className()
    {
        return $this->belongsToMany(ClassMaster::class);
    }

    public function getLogoSquareAttribute()
    {
        return $this->getMedia('school_logo_square')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getLogoWideAttribute()
    {
        return $this->getMedia('school_logo_wide')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
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
