<form wire:submit.prevent="submit" class="pt-3">
    <div class="row m-0 g-5  flex">
        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('questionPaper.related_class_id') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="related_class">{{ trans('cruds.questionPaper.fields.related_class') }}</label>
            <x-select-list class="form-control" id="related_class" name="related_class"
                           :options="$this->listsForFields['related_class']"
                           wire:model="questionPaper.related_class_id"/>
            <div class="validation-message">
                {{ $errors->first('questionPaper.related_class_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionPaper.fields.related_class_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('questionPaper.related_test_id') ? 'invalid' : '' }}">
            <label class="form-label" for="related_test">{{ trans('cruds.questionPaper.fields.related_test') }}</label>
            <x-select-list class="form-control" id="related_test" name="related_test"
                           :options="$this->listsForFields['related_test']" wire:model="questionPaper.related_test_id"/>
            <div class="validation-message">
                {{ $errors->first('questionPaper.related_test_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionPaper.fields.related_test_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('related_ability') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="related_ability">{{ trans('cruds.questionPaper.fields.related_ability') }}</label>
            <x-select-list class="form-control" id="related_ability" name="related_ability" wire:model="related_ability"
                           :options="$this->listsForFields['related_ability']" multiple/>
            <div class="validation-message">
                {{ $errors->first('related_ability') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionPaper.fields.related_ability_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 pt-4  {{ $errors->has('questionPaper.question_paper_name') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="question_paper_name">{{ trans('cruds.questionPaper.fields.question_paper_name') }}</label>
            <input class="form-control" type="text" name="question_paper_name" id="question_paper_name"
                   wire:model.defer="questionPaper.question_paper_name">
            <div class="validation-message">
                {{ $errors->first('questionPaper.question_paper_name') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.questionPaper.fields.question_paper_name_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group {{ $errors->has('questionPaper.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive"
               wire:model.defer="questionPaper.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.questionPaper.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('questionPaper.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.questionPaper.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.question-papers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>