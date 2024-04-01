<form wire:submit.prevent="submit" class="pt-3">
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('observationTemplate.related_class_name_id') ? 'invalid' : '' }}">
            <label class="form-label" for="related_class_name">{{ trans('cruds.observationTemplate.fields.related_class_name') }}</label>
            <x-select-list class="form-control" id="related_class_name" name="related_class_name" :options="$this->listsForFields['related_class_name']" wire:model="observationTemplate.related_class_name_id" />
            <div class="validation-message">
                {{ $errors->first('observationTemplate.related_class_name_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.related_class_name_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('observationTemplate.related_test_id') ? 'invalid' : '' }}">
            <label class="form-label" for="related_test">{{ trans('cruds.observationTemplate.fields.related_test') }}</label>
            <x-select-list class="form-control" id="related_test" name="related_test" :options="$this->listsForFields['related_test']" wire:model="observationTemplate.related_test_id" />
            <div class="validation-message">
                {{ $errors->first('observationTemplate.related_test_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.related_test_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('observationTemplate.related_ability_id') ? 'invalid' : '' }}">
            <label class="form-label" for="related_ability">{{ trans('cruds.observationTemplate.fields.related_ability') }}</label>
            <x-select-list class="form-control" id="related_ability" name="related_ability" :options="$this->listsForFields['related_ability']" wire:model="observationTemplate.related_ability_id" />
            <div class="validation-message">
                {{ $errors->first('observationTemplate.related_ability_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.related_ability_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('observationTemplate.sten_score_from') ? 'invalid' : '' }}">
            <label class="form-label" for="sten_score_from">{{ trans('cruds.observationTemplate.fields.sten_score_from') }}</label>
            <input class="form-control" type="text" name="sten_score_from" id="sten_score_from" wire:model.defer="observationTemplate.sten_score_from">
            <div class="validation-message">
                {{ $errors->first('observationTemplate.sten_score_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.sten_score_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('observationTemplate.sten_score_to') ? 'invalid' : '' }}">
            <label class="form-label" for="sten_score_to">{{ trans('cruds.observationTemplate.fields.sten_score_to') }}</label>
            <input class="form-control" type="text" name="sten_score_to" id="sten_score_to" wire:model.defer="observationTemplate.sten_score_to">
            <div class="validation-message">
                {{ $errors->first('observationTemplate.sten_score_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.sten_score_to_helper') }}
            </div>
        </div>
    </div>

    <div wire:ignore>
        <div class="form-group {{ $errors->has('observationTemplate.observation_1') ? 'invalid' : '' }}">
            <label class="form-label" for="observation_1">{{ trans('cruds.observationTemplate.fields.observation_1') }}</label>
            <textarea class="form-control" name="observation_1" id="observation_1" wire:model.defer="observationTemplate.observation_1" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('observationTemplate.observation_1') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.observation_1_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('observationTemplate.observation_2') ? 'invalid' : '' }}">
            <label class="form-label" for="observation_2">{{ trans('cruds.observationTemplate.fields.observation_2') }}</label>
            <textarea class="form-control" name="observation_2" id="observation_2" wire:model.defer="observationTemplate.observation_2" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('observationTemplate.observation_2') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.observation_2_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('observationTemplate.observation_3') ? 'invalid' : '' }}">
            <label class="form-label" for="observation_3">{{ trans('cruds.observationTemplate.fields.observation_3') }}</label>
            <input class="form-control" type="text" name="observation_3" id="observation_3" wire:model.defer="observationTemplate.observation_3">
            <div class="validation-message">
                {{ $errors->first('observationTemplate.observation_3') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.observation_3_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('observationTemplate.observation_4') ? 'invalid' : '' }}">
            <label class="form-label" for="observation_4">{{ trans('cruds.observationTemplate.fields.observation_4') }}</label>
            <input class="form-control" type="text" name="observation_4" id="observation_4" wire:model.defer="observationTemplate.observation_4">
            <div class="validation-message">
                {{ $errors->first('observationTemplate.observation_4') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.observation_4_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('observationTemplate.observation_5') ? 'invalid' : '' }}">
            <label class="form-label" for="observation_5">{{ trans('cruds.observationTemplate.fields.observation_5') }}</label>
            <input class="form-control" type="text" name="observation_5" id="observation_5" wire:model.defer="observationTemplate.observation_5">
            <div class="validation-message">
                {{ $errors->first('observationTemplate.observation_5') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.observation_5_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('observationTemplate.observation_6') ? 'invalid' : '' }}">
            <label class="form-label" for="observation_6">{{ trans('cruds.observationTemplate.fields.observation_6') }}</label>
            <input class="form-control" type="text" name="observation_6" id="observation_6" wire:model.defer="observationTemplate.observation_6">
            <div class="validation-message">
                {{ $errors->first('observationTemplate.observation_6') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.observation_6_helper') }}
            </div>
        </div>

    </div>
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('stream_group') ? 'invalid' : '' }}">
            <label class="form-label" for="stream_group">{{ trans('cruds.observationTemplate.fields.stream_group') }}</label>
            <x-select-list class="form-control" id="stream_group" name="stream_group" wire:model="stream_group" :options="$this->listsForFields['stream_group']" multiple />
            <div class="validation-message">
                {{ $errors->first('stream_group') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.stream_group_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('stream') ? 'invalid' : '' }}">
            <label class="form-label" for="stream">{{ trans('cruds.observationTemplate.fields.stream') }}</label>
            <x-select-list class="form-control" id="stream" name="stream" wire:model="stream" :options="$this->listsForFields['stream']" multiple />
            <div class="validation-message">
                {{ $errors->first('stream') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.stream_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('course') ? 'invalid' : '' }}">
            <label class="form-label" for="course">{{ trans('cruds.observationTemplate.fields.course') }}</label>
            <x-select-list class="form-control" id="course" name="course" wire:model="course" :options="$this->listsForFields['course']" multiple />
            <div class="validation-message">
                {{ $errors->first('course') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.course_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('college') ? 'invalid' : '' }}">
            <label class="form-label" for="college">{{ trans('cruds.observationTemplate.fields.college') }}</label>
            <x-select-list class="form-control" id="college" name="college" wire:model="college" :options="$this->listsForFields['college']" multiple />
            <div class="validation-message">
                {{ $errors->first('college') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.college_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('profession') ? 'invalid' : '' }}">
            <label class="form-label" for="profession">{{ trans('cruds.observationTemplate.fields.profession') }}</label>
            <x-select-list class="form-control" id="profession" name="profession" wire:model="profession" :options="$this->listsForFields['profession']" multiple />
            <div class="validation-message">
                {{ $errors->first('profession') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.observationTemplate.fields.profession_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group {{ $errors->has('observationTemplate.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive" wire:model.defer="observationTemplate.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.observationTemplate.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('observationTemplate.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.observationTemplate.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.observation-templates.index') }}" class="btn btn-secondary">
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

