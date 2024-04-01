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

class QuestionBank extends Model implements HasMedia
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, InteractsWithMedia;

    public $table = 'question_banks';

    protected $casts = [
        'inactive'         => 'boolean',
        'example_question' => 'boolean',
        'order_no'         => 'integer',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'question_image',
        'choice_1_image',
        'choice_2_image',
        'choice_3_image',
        'choice_4_image',
        'choice_5_image',
        'choice_6_image',
        'right_choice_image',
    ];

    protected $fillable = [
        'related_question_paper_id',
        'related_class_name_id',
        'related_test_type_id',
        'related_ability_id',
        'question_text',
        'question_url',
        'choice_1',
        'choice_2',
        'choice_3',
        'choice_4',
        'choice_5',
        'choice_6',
        'right_choice',
        'score_right',
        'score_wrong',
        'order_no',
        'inactive',
        'example_question',
        'answer_response_1',
        'answer_response_2',
        'answer_response_3',
        'answer_response_4',
        'answer_response_5',
        'answer_response_6',
        'udf_1', //check question type
    ];

    public $filterable = [
        'id',
        'related_question_paper.question_paper_name',
        'related_class_name.class_name',
        'related_test_type.test_name',
        'related_ability.ability_name',
        'question_text',
        'question_url',
        'choice_1',
        'choice_2',
        'choice_3',
        'choice_4',
        'choice_5',
        'choice_6',
        'right_choice',
        'score_right',
        'score_wrong',
        'order_no',
    ];

    public $orderable = [
        'id',
        'related_question_paper.question_paper_name',
        'related_class_name.class_name',
        'related_test_type.test_name',
        'related_ability.ability_name',
        'question_text',
        'question_url',
        'choice_1',
        'choice_2',
        'choice_3',
        'choice_4',
        'choice_5',
        'choice_6',
        'right_choice',
        'score_right',
        'score_wrong',
        'order_no',
        'inactive',
        'example_question',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function relatedQuestionPaper()
    {
        return $this->belongsTo(QuestionPaper::class);
    }

    public function relatedClassName()
    {
        return $this->belongsTo(ClassMaster::class);
    }

    public function relatedTestType()
    {
        return $this->belongsTo(Test::class);
    }

    public function relatedAbility()
    {
        return $this->belongsTo(AbilityMaster::class);
    }

    public function getQuestionImageAttribute()
    {
        return $this->getMedia('question_bank_question_image')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getChoice1ImageAttribute()
    {
        return $this->getMedia('question_bank_choice_1_image')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getChoice2ImageAttribute()
    {
        return $this->getMedia('question_bank_choice_2_image')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getChoice3ImageAttribute()
    {
        return $this->getMedia('question_bank_choice_3_image')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getChoice4ImageAttribute()
    {
        return $this->getMedia('question_bank_choice_4_image')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getChoice5ImageAttribute()
    {
        return $this->getMedia('question_bank_choice_5_image')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getChoice6ImageAttribute()
    {
        return $this->getMedia('question_bank_choice_6_image')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getRightChoiceImageAttribute()
    {
        return $this->getMedia('question_bank_right_choice_image')->map(function ($item) {
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
