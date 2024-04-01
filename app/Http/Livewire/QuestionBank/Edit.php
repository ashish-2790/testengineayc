<?php

namespace App\Http\Livewire\QuestionBank;

use App\Models\AbilityMaster;
use App\Models\ClassMaster;
use App\Models\QuestionBank;
use App\Models\QuestionPaper;
use App\Models\Test;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public $correct_answer_1;
    public $correct_answer_2;
    public $correct_answer_3;
    public $correct_answer_4;
    public $correct_answer_5;
    public $question_input_type;
    public $show_drop_zone = 0;
    public $questiontext;
    public $questionpaper;

    public QuestionBank $questionBank;

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function updated()
    {

        if($this->question_input_type == 1){
            $this->show_drop_zone = 1;
        }

        if($this->correct_answer_1 == 1){
            $this->questionBank->right_choice = $this->questionBank->choice_1;
            $this->correct_answer_2 = 0;
            $this->correct_answer_3 = 0;
            $this->correct_answer_4 = 0;
            $this->correct_answer_5 = 0;

        }
        elseif($this->correct_answer_2 == 1){
            $this->questionBank->right_choice = $this->questionBank->choice_2;
            $this->correct_answer_1 = 0;
            $this->correct_answer_3 = 0;
            $this->correct_answer_4 = 0;
            $this->correct_answer_5 = 0;
        }
        elseif($this->correct_answer_3 == 1){
            $this->questionBank->right_choice = $this->questionBank->choice_3;
            $this->correct_answer_1 = 0;
            $this->correct_answer_2 = 0;
            $this->correct_answer_4 = 0;
            $this->correct_answer_5 = 0;
        }
        elseif($this->correct_answer_4 == 1){
            $this->questionBank->right_choice = $this->questionBank->choice_4;
            $this->correct_answer_1 = 0;
            $this->correct_answer_2 = 0;
            $this->correct_answer_3 = 0;
            $this->correct_answer_5 = 0;
        }
        elseif($this->correct_answer_5 == 1){
            $this->questionBank->right_choice = $this->questionBank->choice_5;
            $this->correct_answer_1 = 0;
            $this->correct_answer_2 = 0;
            $this->correct_answer_3 = 0;
            $this->correct_answer_4 = 0;
        }

    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->questionBank->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(QuestionBank $questionBank)
    {
        $this->questionBank = $questionBank;
        $this->questiontext = $questionBank->question_text;
        $this->initListsForFields();

        $this->mediaCollections = [

            'question_bank_question_image'     => $questionBank->question_image,
            'question_bank_choice_1_image'     => $questionBank->choice_1_image,
            'question_bank_choice_2_image'     => $questionBank->choice_2_image,
            'question_bank_choice_3_image'     => $questionBank->choice_3_image,
            'question_bank_choice_4_image'     => $questionBank->choice_4_image,
            'question_bank_choice_5_image'     => $questionBank->choice_5_image,
            'question_bank_choice_6_image'     => $questionBank->choice_6_image,
            'question_bank_right_choice_image' => $questionBank->right_choice_image,

        ];
    }

    public function render()
    {
        return view('livewire.question-bank.edit');
    }

    public function submit()
    {
        $this->validate();
        $this->questionBank->question_text = $this->questiontext;

        $this->questionBank->save();
        $this->syncMedia();

        return redirect()->route('admin.question-banks.index');
    }

    protected function rules(): array
    {
        return [
            'questionBank.related_class_name_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'questionBank.related_test_type_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'questionBank.related_ability_id' => [
                'integer',
                'exists:ability_masters,id',
                'nullable',
            ],
            'questionBank.related_question_paper_id' => [
                'integer',
                'exists:question_papers,id',
                'nullable',
            ],
            'questionBank.question_text' => [
                'string',
                'nullable',
            ],
            'questionBank.question_url' => [
                'string',
                'nullable',
            ],
            'questionBank.choice_1' => [
                'string',
                'nullable',
            ],
            'questionBank.choice_2' => [
                'string',
                'nullable',
            ],
            'questionBank.choice_3' => [
                'string',
                'nullable',
            ],
            'questionBank.choice_4' => [
                'string',
                'nullable',
            ],
            'questionBank.choice_5' => [
                'string',
                'nullable',
            ],
            'questionBank.choice_6' => [
                'string',
                'nullable',
            ],
            'questionBank.answer_response_1' => [
                'string',
                'nullable',
            ],
            'questionBank.answer_response_2' => [
                'string',
                'nullable',
            ],
            'questionBank.answer_response_3' => [
                'string',
                'nullable',
            ],
            'questionBank.answer_response_4' => [
                'string',
                'nullable',
            ],
            'questionBank.answer_response_5' => [
                'string',
                'nullable',
            ],
            'questionBank.answer_response_6' => [
                'string',
                'nullable',
            ],
            'questionBank.right_choice' => [
                'string',
                'nullable',
            ],
            'questionBank.score_right' => [
                'string',
                'nullable',
            ],
            'questionBank.score_wrong' => [
                'string',
                'nullable',
            ],
            'questionBank.order_no' => [
                'string',
                'nullable',
            ],
            'mediaCollections.question_bank_question_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.question_bank_question_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.question_bank_choice_1_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.question_bank_choice_1_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.question_bank_choice_2_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.question_bank_choice_2_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.question_bank_choice_3_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.question_bank_choice_3_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.question_bank_choice_4_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.question_bank_choice_4_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.question_bank_choice_5_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.question_bank_choice_5_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.question_bank_choice_6_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.question_bank_choice_6_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.question_bank_right_choice_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.question_bank_right_choice_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'questionBank.example_question' => [
                'boolean',
            ],
            'questionBank.inactive' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['related_class_name']     = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['related_test_type']      = Test::pluck('test_name', 'id')->toArray();
        $this->listsForFields['related_ability']        = AbilityMaster::pluck('ability_name', 'id')->toArray();
        $this->listsForFields['related_question_paper'] = QuestionPaper::pluck('question_paper_name', 'id')->toArray();
    }
}
