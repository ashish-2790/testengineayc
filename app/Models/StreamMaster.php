<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StreamMaster extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'stream_masters';

    protected $casts = [
        'inactive' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'group_master_id',
        'stream_name',
        'stream_description',
        'icon_url',
        'inactive',
    ];

    public $filterable = [
        'id',
        'group_master.stream_group_master',
        'stream_name',
        'stream_description',
        'icon_url',
    ];

    public $orderable = [
        'id',
        'group_master.stream_group_master',
        'stream_name',
        'stream_description',
        'icon_url',
        'inactive',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function groupMaster()
    {
        return $this->belongsTo(StreamGroup::class);
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
