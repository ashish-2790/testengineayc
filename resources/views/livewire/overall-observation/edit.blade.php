<form wire:submit.prevent="submit" class="pt-3">
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('overallObservation.student_test_taken_id') ? 'invalid' : '' }}">
            <label class="form-label" for="student_test_taken">{{ trans('cruds.overallObservation.fields.student_test_taken') }}</label>
            <x-select-list class="form-control" id="student_test_taken" name="student_test_taken" :options="$this->listsForFields['student_test_taken']" wire:model="overallObservation.student_test_taken_id" />
            <div class="validation-message">
                {{ $errors->first('overallObservation.student_test_taken_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservation.fields.student_test_taken_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservation.overall_result_id') ? 'invalid' : '' }}">
            <label class="form-label" for="overall_result">{{ trans('cruds.overallObservation.fields.overall_result') }}</label>
            <x-select-list class="form-control" id="overall_result" name="overall_result" :options="$this->listsForFields['overall_result']" wire:model="overallObservation.overall_result_id" />
            <div class="validation-message">
                {{ $errors->first('overallObservation.overall_result_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservation.fields.overall_result_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservation.overall_sten_score') ? 'invalid' : '' }}">
            <label class="form-label" for="overall_sten_score">{{ trans('cruds.overallObservation.fields.overall_sten_score') }}</label>
            <input class="form-control" type="text" name="overall_sten_score" id="overall_sten_score" wire:model.defer="overallObservation.overall_sten_score">
            <div class="validation-message">
                {{ $errors->first('overallObservation.overall_sten_score') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservation.fields.overall_sten_score_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group {{ $errors->has('overallObservation.short_description') ? 'invalid' : '' }}">
        <label class="form-label" for="short_description">{{ trans('cruds.overallObservation.fields.short_description') }}</label>
        <input class="form-control" type="text" name="short_description" id="short_description" wire:model.defer="overallObservation.short_description">
        <div class="validation-message">
            {{ $errors->first('overallObservation.short_description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.overallObservation.fields.short_description_helper') }}
        </div>
    </div>
    <div wire:ignore>
        <div class="form-group {{ $errors->has('overallObservation.observation_1') ? 'invalid' : '' }}">
            <label class="form-label" for="observation_1">{{ trans('cruds.overallObservation.fields.observation_1') }}</label>
            <textarea class="form-control" name="observation_1" id="observation_1" wire:model.defer="overallObservation.observation_1" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('overallObservation.observation_1') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservation.fields.observation_1_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('overallObservation.observation_2') ? 'invalid' : '' }}">
            <label class="form-label" for="observation_2">{{ trans('cruds.overallObservation.fields.observation_2') }}</label>
            <textarea class="form-control" name="observation_2" id="observation_2" wire:model.defer="overallObservation.observation_2" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('overallObservation.observation_2') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservation.fields.observation_2_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('overallObservation.observation_3') ? 'invalid' : '' }}">
            <label class="form-label" for="observation_3">{{ trans('cruds.overallObservation.fields.observation_3') }}</label>
            <textarea class="form-control" name="observation_3" id="observation_3" wire:model.defer="overallObservation.observation_3" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('overallObservation.observation_3') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservation.fields.observation_3_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('overallObservation.observation_4') ? 'invalid' : '' }}">
            <label class="form-label" for="observation_4">{{ trans('cruds.overallObservation.fields.observation_4') }}</label>
            <textarea class="form-control" name="observation_4" id="observation_4" wire:model.defer="overallObservation.observation_4" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('overallObservation.observation_4') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservation.fields.observation_4_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('overallObservation.observation_5') ? 'invalid' : '' }}">
            <label class="form-label" for="observation_5">{{ trans('cruds.overallObservation.fields.observation_5') }}</label>
            <textarea class="form-control" name="observation_5" id="observation_5" wire:model.defer="overallObservation.observation_5" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('overallObservation.observation_5') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservation.fields.observation_5_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('overallObservation.observation_6') ? 'invalid' : '' }}">
            <label class="form-label" for="observation_6">{{ trans('cruds.overallObservation.fields.observation_6') }}</label>
            <input class="form-control" type="text" name="observation_6" id="observation_6" wire:model.defer="overallObservation.observation_6">
            <div class="validation-message">
                {{ $errors->first('overallObservation.observation_6') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservation.fields.observation_6_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('stream_group') ? 'invalid' : '' }}">
            <label class="form-label" for="stream_group">{{ trans('cruds.overallObservation.fields.stream_group') }}</label>
            <x-select-list class="form-control" id="stream_group" name="stream_group" wire:model="stream_group" :options="$this->listsForFields['stream_group']" multiple />
            <div class="validation-message">
                {{ $errors->first('stream_group') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservation.fields.stream_group_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('stream') ? 'invalid' : '' }}">
            <label class="form-label" for="stream">{{ trans('cruds.overallObservation.fields.stream') }}</label>
            <x-select-list class="form-control" id="stream" name="stream" wire:model="stream" :options="$this->listsForFields['stream']" multiple />
            <div class="validation-message">
                {{ $errors->first('stream') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservation.fields.stream_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('courses') ? 'invalid' : '' }}">
            <label class="form-label" for="courses">{{ trans('cruds.overallObservation.fields.courses') }}</label>
            <x-select-list class="form-control" id="courses" name="courses" wire:model="courses" :options="$this->listsForFields['courses']" multiple />
            <div class="validation-message">
                {{ $errors->first('courses') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservation.fields.courses_helper') }}
            </div>
        </div>

    </div>
    <div class="row m-0 g-5  flex">
        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('college') ? 'invalid' : '' }}">
            <label class="form-label" for="college">{{ trans('cruds.overallObservation.fields.college') }}</label>
            <x-select-list class="form-control" id="college" name="college" wire:model="college" :options="$this->listsForFields['college']" multiple />
            <div class="validation-message">
                {{ $errors->first('college') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservation.fields.college_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('profession') ? 'invalid' : '' }}">
            <label class="form-label" for="profession">{{ trans('cruds.overallObservation.fields.profession') }}</label>
            <x-select-list class="form-control" id="profession" name="profession" wire:model="profession" :options="$this->listsForFields['profession']" multiple />
            <div class="validation-message">
                {{ $errors->first('profession') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservation.fields.profession_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.overall-observations.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

<script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script>
    document.addEventListener('livewire:load', function () {

        const editorObservation1 = CKEDITOR.replace('observation_1');
        editorObservation1.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('observation_1', event.editor.getData());
        });

        const editorObservation2 = CKEDITOR.replace('observation_2');
        editorObservation2.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('observation_2', event.editor.getData());
        });

        const editorObservation3 = CKEDITOR.replace('observation_3');
        editorObservation3.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('observation_3', event.editor.getData());
        });

        const editorObservation4 = CKEDITOR.replace('observation_4');
        editorObservation4.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('observation_4', event.editor.getData());
        });

        const editorObservation5 = CKEDITOR.replace('observation_5');
        editorObservation5.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('observation_5', event.editor.getData());
        });

        const editorObservation6 = CKEDITOR.replace('observation_6');
        editorObservation6.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('observation_6', event.editor.getData());
        });

    });
</script>



