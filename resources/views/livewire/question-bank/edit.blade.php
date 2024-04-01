<form wire:submit.prevent="submit" class="pt-3">

    <div class="row m-0 g-5  flex">
        {{--        <div class="  w-full lg:w-4/12 px-4  pt-4 form-group {{ $errors->has('questionBank.related_class_name_id') ? 'invalid' : '' }}">--}}
        {{--            <label class="form-label" for="related_class_name">{{ trans('cruds.questionBank.fields.related_class_name') }}</label>--}}
        {{--            <x-select-list class="form-control" id="related_class_name" name="related_class_name" :options="$this->listsForFields['related_class_name']" wire:model="questionBank.related_class_name_id" />--}}
        {{--            <div class="validation-message">--}}
        {{--                {{ $errors->first('questionBank.related_class_name_id') }}--}}
        {{--            </div>--}}
        {{--            <div class="help-block">--}}
        {{--                {{ trans('cruds.questionBank.fields.related_class_name_helper') }}--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="  w-full lg:w-4/12 px-4 pt-4  form-group {{ $errors->has('questionBank.related_test_type_id') ? 'invalid' : '' }}">
            <label class="form-label" for="related_test_type">{{ trans('cruds.questionBank.fields.related_test_type') }}</label>
            <x-select-list class="form-control" id="related_test_type" name="related_test_type" :options="$this->listsForFields['related_test_type']" wire:model="questionBank.related_test_type_id" />
            <div class="validation-message">
                {{ $errors->first('questionBank.related_test_type_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.related_test_type_helper') }}
            </div>
        </div>
        <div class="  w-full lg:w-4/12 px-4   form-group {{ $errors->has('questionBank.related_ability_id') ? 'invalid' : '' }}">
            <label class="form-label" for="related_ability">{{ trans('cruds.questionBank.fields.related_ability') }}</label>
            <x-select-list class="form-control" id="related_ability" name="related_ability" :options="$this->listsForFields['related_ability']" wire:model="questionBank.related_ability_id" />
            <div class="validation-message">
                {{ $errors->first('questionBank.related_ability_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.related_ability_helper') }}
            </div>
        </div>
        <div class="  w-full lg:w-4/12 px-4   form-group {{ $errors->has('questionBank.related_question_paper_id') ? 'invalid' : '' }}">
            <label class="form-label" for="related_question_paper">{{ trans('cruds.questionBank.fields.related_question_paper') }}</label>
            <x-select-list class="form-control" id="related_question_paper" name="related_question_paper" :options="$this->listsForFields['related_question_paper']" wire:model="questionBank.related_question_paper_id" />
            <div class="validation-message">
                {{ $errors->first('questionBank.related_question_paper_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.related_question_paper_helper') }}
            </div>
        </div>

    </div>

    <div wire:ignore class="row  m-0 g-5  flex">
        <div class="w-full px-4  pt-4 form-group {{ $errors->has('questionBank.question_text') ? 'invalid' : '' }}">
            <label class="form-label" for="question_text">{{ trans('cruds.questionBank.fields.question_text') }}</label>
            <textarea class="form-control" name="questiontext" id="questiontext" wire:model.defer="questiontext" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('questionBank.question_text') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.question_text_helper') }}
            </div>
        </div>
        <div class=" px-4 form-group {{ $errors->has('mediaCollections.question_bank_question_image') ? 'invalid' : '' }}">
            <label class="form-label" for="question_image">{{ trans('cruds.questionBank.fields.question_image') }}</label>
            <x-dropzone id="question_image" name="question_image" action="{{ route('admin.question-banks.storeMedia') }}" collection-name="question_bank_question_image" max-file-size="5" />
            <div class="validation-message">
                {{ $errors->first('mediaCollections.question_bank_question_image') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.question_image_helper') }}
            </div>
        </div>
    </div>

    <div class="row  m-0 g-5  flex">
        <div class=" w-full lg:w-4/12 px-4  pt-4 form-group {{ $errors->has('questionBank.choice_1') ? 'invalid' : '' }}">
            <label class="form-label" for="choice_1">{{ trans('cruds.questionBank.fields.choice_1') }}</label>
            <input class="form-control" type="text" name="choice_1" id="choice_1" wire:model.defer="questionBank.choice_1">
            <div class="validation-message">
                {{ $errors->first('questionBank.choice_1') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.choice_1_helper') }}
            </div>
        </div>
        <div class="w-full lg:w-4/12 px-4  pt-4 form-group {{ $errors->has('questionBank.choice_1') ? 'invalid' : '' }}">
            <label class="form-label" for="choice_1">{{ 'Correct Answer' }}</label>

            <input class="form-control" type="checkbox" name="correct_answer_1" id="correct_answer_1" wire:model="correct_answer_1">
            <div class="validation-message">
                {{ $errors->first('questionBank.choice_1') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.choice_1_helper') }}
            </div>
        </div>
    </div>
    <div class="row  m-0 g-5  flex">
        <div class=" w-full lg:w-4/12 px-4  pt-4 form-group {{ $errors->has('questionBank.choice_2') ? 'invalid' : '' }}">
            <label class="form-label" for="choice_2">{{ trans('cruds.questionBank.fields.choice_2') }}</label>
            <input class="form-control" type="text" name="choice_2" id="choice_2" wire:model.defer="questionBank.choice_2">
            <div class="validation-message">
                {{ $errors->first('questionBank.choice_2') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.choice_2_helper') }}
            </div>
        </div>
        <div class="w-full lg:w-4/12 px-4  pt-4 form-group {{ $errors->has('questionBank.choice_1') ? 'invalid' : '' }}">
            <input class="form-control" type="checkbox" name="correct_answer_2" id="correct_answer_2" wire:model="correct_answer_2">
            <div class="validation-message">
                {{ $errors->first('questionBank.choice_1') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.choice_1_helper') }}
            </div>
        </div>
    </div>
    <div class="row  m-0 g-5  flex">
        <div class=" w-full lg:w-4/12 px-4  pt-4 form-group {{ $errors->has('questionBank.choice_3') ? 'invalid' : '' }}">
            <label class="form-label" for="choice_3">{{ trans('cruds.questionBank.fields.choice_3') }}</label>
            <input class="form-control" type="text" name="choice_3" id="choice_3" wire:model.defer="questionBank.choice_3">
            <div class="validation-message">
                {{ $errors->first('questionBank.choice_3') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.choice_3_helper') }}
            </div>
        </div>
        <div class="w-full lg:w-4/12 px-4  pt-4 form-group {{ $errors->has('questionBank.choice_1') ? 'invalid' : '' }}">
            <input class="form-control" type="checkbox" name="correct_answer_3" id="correct_answer_3" wire:model="correct_answer_3">
            <div class="validation-message">
                {{ $errors->first('questionBank.choice_1') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.choice_1_helper') }}
            </div>
        </div>
    </div>
    <div class="row  m-0 g-5  flex">
        <div class=" w-full lg:w-4/12 px-4  pt-4 form-group {{ $errors->has('questionBank.choice_4') ? 'invalid' : '' }}">
            <label class="form-label" for="choice_4">{{ trans('cruds.questionBank.fields.choice_4') }}</label>
            <input class="form-control" type="text" name="choice_4" id="choice_4" wire:model.defer="questionBank.choice_4">
            <div class="validation-message">
                {{ $errors->first('questionBank.choice_4') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.choice_4_helper') }}
            </div>
        </div>
        <div class="w-full lg:w-4/12 px-4  pt-4 form-group {{ $errors->has('questionBank.choice_1') ? 'invalid' : '' }}">
            <input class="form-control" type="checkbox" name="correct_answer_4" id="correct_answer_4" wire:model="correct_answer_4">
            <div class="validation-message">
                {{ $errors->first('questionBank.choice_1') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.choice_1_helper') }}
            </div>
        </div>
    </div>
    <div class="row  m-0 g-5  flex">
        <div class="w-full lg:w-4/12 px-4  pt-4 form-group {{ $errors->has('questionBank.choice_5') ? 'invalid' : '' }}">
            <label class="form-label" for="choice_5">{{ trans('cruds.questionBank.fields.choice_5') }}</label>
            <input class="form-control" type="text" name="choice_5" id="choice_5" wire:model.defer="questionBank.choice_5">
            <div class="validation-message">
                {{ $errors->first('questionBank.choice_5') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.choice_5_helper') }}
            </div>
        </div>
        <div class="w-full lg:w-4/12 px-4  pt-4 form-group {{ $errors->has('questionBank.choice_1') ? 'invalid' : '' }}">
            <input class="form-control" type="checkbox" name="correct_answer_5" id="correct_answer_5" wire:model="correct_answer_5">
            <div class="validation-message">
                {{ $errors->first('questionBank.choice_1') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.choice_1_helper') }}
            </div>
        </div>
    </div>

    <div class="row  m-0 g-5  flex">
        <div class="w-full lg:w-4/12 px-4  pt-4 form-group {{ $errors->has('questionBank.right_choice') ? 'invalid' : '' }}">
            <label class="form-label" for="right_choice">{{ trans('cruds.questionBank.fields.right_choice') }}</label>
            <input class="form-control" type="text" name="right_choice" id="right_choice" wire:model.defer="questionBank.right_choice">
            <div class="validation-message">
                {{ $errors->first('questionBank.right_choice') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.right_choice_helper') }}
            </div>
        </div>
        <div class="w-full lg:w-4/12 px-4   form-group {{ $errors->has('questionBank.score_right') ? 'invalid' : '' }}">
            <label class="form-label" for="score_right">{{ trans('cruds.questionBank.fields.score_right') }}</label>
            <input class="form-control" type="text" name="score_right" id="score_right" wire:model.defer="questionBank.score_right">
            <div class="validation-message">
                {{ $errors->first('questionBank.score_right') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.score_right_helper') }}
            </div>
        </div>
        <div class="w-full lg:w-4/12 px-4   form-group {{ $errors->has('questionBank.score_wrong') ? 'invalid' : '' }}">
            <label class="form-label" for="score_wrong">{{ trans('cruds.questionBank.fields.score_wrong') }}</label>
            <input class="form-control" type="text" name="score_wrong" id="score_wrong" wire:model.defer="questionBank.score_wrong">
            <div class="validation-message">
                {{ $errors->first('questionBank.score_wrong') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.score_wrong_helper') }}
            </div>
        </div>
        <div class="w-full lg:w-4/12 px-4   form-group {{ $errors->has('questionBank.order_no') ? 'invalid' : '' }}">
            <label class="form-label" for="order_no">{{ trans('cruds.questionBank.fields.order_no') }}</label>
            <input class="form-control" type="text" name="order_no" id="order_no" wire:model.defer="questionBank.order_no">
            <div class="validation-message">
                {{ $errors->first('questionBank.order_no') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.order_no_helper') }}
            </div>
        </div>
    </div>

    <div class="row  m-0 g-5  flex">
        <div class="w-full lg:w-4/12 px-4 pt-4 form-group {{ $errors->has('questionBank.example_question') ? 'invalid' : '' }}">
            <input class="form-control" type="checkbox" name="example_question" id="example_question" wire:model.defer="questionBank.example_question">
            <label class="form-label inline ml-1" for="example_question">{{ trans('cruds.questionBank.fields.example_question') }}</label>
            <div class="validation-message">
                {{ $errors->first('questionBank.example_question') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.example_question_helper') }}
            </div>
        </div>
        <div class="w-full lg:w-4/12 px-4 form-group {{ $errors->has('questionBank.inactive') ? 'invalid' : '' }}">
            <input class="form-control" type="checkbox" name="inactive" id="inactive" wire:model.defer="questionBank.inactive">
            <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.questionBank.fields.inactive') }}</label>
            <div class="validation-message">
                {{ $errors->first('questionBank.inactive') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionBank.fields.inactive_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.question-banks.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
<script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script>
    document.addEventListener('livewire:load', function () {
        const editorQuestiontext = CKEDITOR.replace('questiontext');
        editorQuestiontext.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('questiontext', event.editor.getData());
        });
    });
</script>