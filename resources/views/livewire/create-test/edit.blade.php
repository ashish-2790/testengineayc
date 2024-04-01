<form wire:submit.prevent="submit" class="pt-3">

    {{--    <div class="form-group {{ $errors->has('createTest.video_url') ? 'invalid' : '' }}">--}}
    {{--        <label class="form-label" for="video_url">{{ trans('cruds.createTest.fields.video_url') }}</label>--}}
    {{--        <input class="form-control" type="text" name="video_url" id="video_url" wire:model.defer="createTest.video_url">--}}
    {{--        <div class="validation-message">--}}
    {{--            {{ $errors->first('createTest.video_url') }}--}}
    {{--        </div>--}}
    {{--        <div class="help-block">--}}
    {{--            {{ trans('cruds.createTest.fields.video_url_helper') }}--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="row m-0 g-5  flex">
        <div class="form-group w-full lg:w-4/12 px-4 pt-4  {{ $errors->has('createTest.related_question_paper_id') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="related_question_paper">{{ trans('cruds.createTest.fields.related_question_paper') }}</label>
            <x-select-list class="form-control" id="related_question_paper" name="related_question_paper"
                           :options="$this->listsForFields['related_question_paper']"
                           wire:model="createTest.related_question_paper_id"/>
            <div class="validation-message">
                {{ $errors->first('createTest.related_question_paper_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.createTest.fields.related_question_paper_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-4/12 px-4   {{ $errors->has('createTest.valid_from') ? 'invalid' : '' }}">
            <label class="form-label" for="valid_from">{{ trans('cruds.createTest.fields.valid_from') }}</label>
            <x-date-picker class="form-control" wire:model="createTest.valid_from" id="valid_from" name="valid_from"/>
            <div class="validation-message">
                {{ $errors->first('createTest.valid_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.createTest.fields.valid_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-4/12 px-4   {{ $errors->has('createTest.valid_to') ? 'invalid' : '' }}">
            <label class="form-label" for="valid_to">{{ trans('cruds.createTest.fields.valid_to') }}</label>
            <x-date-picker class="form-control" wire:model="createTest.valid_to" id="valid_to" name="valid_to"/>
            <div class="validation-message">
                {{ $errors->first('createTest.valid_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.createTest.fields.valid_to_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4  {{ $errors->has('createTest.related_class_id') ? 'invalid' : '' }}">
            <label class="form-label" for="related_class">{{ trans('cruds.createTest.fields.related_class') }}</label>
            <x-select-list class="form-control" id="related_class" name="related_class"
                           :options="$this->listsForFields['related_class']" wire:model="createTest.related_class_id"/>
            <div class="validation-message">
                {{ $errors->first('createTest.related_class_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.createTest.fields.related_class_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4  {{ $errors->has('createTest.related_test_type_id') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="related_test_type">{{ trans('cruds.createTest.fields.related_test_type') }}</label>
            <x-select-list class="form-control" id="related_test_type" name="related_test_type"
                           :options="$this->listsForFields['related_test_type']"
                           wire:model="createTest.related_test_type_id"/>
            <div class="validation-message">
                {{ $errors->first('createTest.related_test_type_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.createTest.fields.related_test_type_helper') }}
            </div>
        </div>
    </div>
    {{--    <div class="form-group {{ $errors->has('createTest.max_student_join') ? 'invalid' : '' }}">--}}
    {{--        <label class="form-label" for="max_student_join">{{ trans('cruds.createTest.fields.max_student_join') }}</label>--}}
    {{--        <input class="form-control" type="text" name="max_student_join" id="max_student_join" wire:model.defer="createTest.max_student_join">--}}
    {{--        <div class="validation-message">--}}
    {{--            {{ $errors->first('createTest.max_student_join') }}--}}
    {{--        </div>--}}
    {{--        <div class="help-block">--}}
    {{--            {{ trans('cruds.createTest.fields.max_student_join_helper') }}--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="row m-0 g-5  flex">
        <div class="form-group w-full lg:w-6/12 px-4 pt-4  {{ $errors->has('createTest.maximum_score') ? 'invalid' : '' }}">
            <label class="form-label" for="maximum_score">{{ trans('cruds.createTest.fields.maximum_score') }}</label>
            <input class="form-control" type="text" name="maximum_score" id="maximum_score"
                   wire:model.defer="createTest.maximum_score">
            <div class="validation-message">
                {{ $errors->first('createTest.maximum_score') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.createTest.fields.maximum_score_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('createTest.minimum_score') ? 'invalid' : '' }}">
            <label class="form-label" for="minimum_score">{{ trans('cruds.createTest.fields.minimum_score') }}</label>
            <input class="form-control" type="text" name="minimum_score" id="minimum_score"
                   wire:model.defer="createTest.minimum_score">
            <div class="validation-message">
                {{ $errors->first('createTest.minimum_score') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.createTest.fields.minimum_score_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4">
            <label class="form-label" for="video_url">Duation : in Minutes</label>
            <input class="form-control" type="text" name="udf_1" id="udf_1" wire:model.defer="createTest.udf_1">
            <div class="validation-message">
            </div>
            <div class="help-block">
            </div>
        </div>

    </div>

    <div wire:ignore class="form-group {{ $errors->has('createTest.instruction') ? 'invalid' : '' }}">
        <label class="form-label" for="instruction">{{ trans('cruds.createTest.fields.instruction') }}</label>
        <textarea class="form-control" name="instruction" id="instruction" wire:model.defer="createTest.instruction"
                  rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('createTest.instruction') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.createTest.fields.instruction_helper') }}
        </div>
    </div>

    <div class="form-group {{ $errors->has('createTest.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive"
               wire:model.defer="createTest.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.createTest.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('createTest.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.createTest.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.create-tests.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
<script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script>
    document.addEventListener('livewire:load', function () {

        const editorInstruction = CKEDITOR.replace('instruction');
        editorInstruction.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('instruction', event.editor.getData());
        });
    });
</script>