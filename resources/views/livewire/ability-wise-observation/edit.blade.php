<form wire:submit.prevent="submit" class="pt-3">
    <div class="row m-0 g-5  flex">
        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('abilityWiseObservation.student_test_taken_id') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="student_test_taken">{{ trans('cruds.abilityWiseObservation.fields.student_test_taken') }}</label>
            <x-select-list class="form-control" id="student_test_taken" name="student_test_taken"
                           :options="$this->listsForFields['student_test_taken']"
                           wire:model="abilityWiseObservation.student_test_taken_id"/>
            <div class="validation-message">
                {{ $errors->first('abilityWiseObservation.student_test_taken_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.student_test_taken_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('abilityWiseObservation.overall_observation_id') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="overall_observation">{{ trans('cruds.abilityWiseObservation.fields.overall_observation') }}</label>
            <x-select-list class="form-control" id="overall_observation" name="overall_observation"
                           :options="$this->listsForFields['overall_observation']"
                           wire:model="abilityWiseObservation.overall_observation_id"/>
            <div class="validation-message">
                {{ $errors->first('abilityWiseObservation.overall_observation_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.overall_observation_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('abilityWiseObservation.ability_result_id') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="ability_result">{{ trans('cruds.abilityWiseObservation.fields.ability_result') }}</label>
            <x-select-list class="form-control" id="ability_result" name="ability_result"
                           :options="$this->listsForFields['ability_result']"
                           wire:model="abilityWiseObservation.ability_result_id"/>
            <div class="validation-message">
                {{ $errors->first('abilityWiseObservation.ability_result_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.ability_result_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">
        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('abilityWiseObservation.ability_id') ? 'invalid' : '' }}">
            <label class="form-label" for="ability">{{ trans('cruds.abilityWiseObservation.fields.ability') }}</label>
            <x-select-list class="form-control" id="ability" name="ability" :options="$this->listsForFields['ability']"
                           wire:model="abilityWiseObservation.ability_id"/>
            <div class="validation-message">
                {{ $errors->first('abilityWiseObservation.ability_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.ability_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('abilityWiseObservation.short_description') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="short_description">{{ trans('cruds.abilityWiseObservation.fields.short_description') }}</label>
            <input class="form-control" type="text" name="short_description" id="short_description"
                   wire:model.defer="abilityWiseObservation.short_description">
            <div class="validation-message">
                {{ $errors->first('abilityWiseObservation.short_description') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.short_description_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('abilityWiseObservation.ability_sten_score') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="ability_sten_score">{{ trans('cruds.abilityWiseObservation.fields.ability_sten_score') }}</label>
            <input class="form-control" type="text" name="ability_sten_score" id="ability_sten_score"
                   wire:model.defer="abilityWiseObservation.ability_sten_score">
            <div class="validation-message">
                {{ $errors->first('abilityWiseObservation.ability_sten_score') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.ability_sten_score_helper') }}
            </div>
        </div>
    </div>
    <div wire:ignore>
        <div class="form-group {{ $errors->has('abilityWiseObservation.observation_1') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="observation_1">{{ trans('cruds.abilityWiseObservation.fields.observation_1') }}</label>
            <textarea class="form-control" name="observation_1" id="observation_1"
                      wire:model.defer="abilityWiseObservation.observation_1" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('abilityWiseObservation.observation_1') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.observation_1_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('abilityWiseObservation.observation_2') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="observation_2">{{ trans('cruds.abilityWiseObservation.fields.observation_2') }}</label>
            <textarea class="form-control" name="observation_2" id="observation_2"
                      wire:model.defer="abilityWiseObservation.observation_2" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('abilityWiseObservation.observation_2') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.observation_2_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('abilityWiseObservation.observation_3') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="observation_3">{{ trans('cruds.abilityWiseObservation.fields.observation_3') }}</label>
            <textarea class="form-control" name="observation_3" id="observation_3"
                      wire:model.defer="abilityWiseObservation.observation_3" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('abilityWiseObservation.observation_3') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.observation_3_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('abilityWiseObservation.observation_4') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="observation_4">{{ trans('cruds.abilityWiseObservation.fields.observation_4') }}</label>
            <textarea class="form-control" name="observation_4" id="observation_4"
                      wire:model.defer="abilityWiseObservation.observation_4" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('abilityWiseObservation.observation_4') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.observation_4_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('abilityWiseObservation.observation_5') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="observation_5">{{ trans('cruds.abilityWiseObservation.fields.observation_5') }}</label>
            <textarea class="form-control" name="observation_5" id="observation_5"
                      wire:model.defer="abilityWiseObservation.observation_5" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('abilityWiseObservation.observation_5') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.observation_5_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('abilityWiseObservation.observation_6') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="observation_6">{{ trans('cruds.abilityWiseObservation.fields.observation_6') }}</label>
            <textarea class="form-control" name="observation_6" id="observation_6"
                      wire:model.defer="abilityWiseObservation.observation_6" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('abilityWiseObservation.observation_6') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.observation_6_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">
        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('stream_group') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="stream_group">{{ trans('cruds.abilityWiseObservation.fields.stream_group') }}</label>
            <x-select-list class="form-control" id="stream_group" name="stream_group" wire:model="stream_group"
                           :options="$this->listsForFields['stream_group']" multiple/>
            <div class="validation-message">
                {{ $errors->first('stream_group') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.stream_group_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('stream_master') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="stream_master">{{ trans('cruds.abilityWiseObservation.fields.stream_master') }}</label>
            <x-select-list class="form-control" id="stream_master" name="stream_master" wire:model="stream_master"
                           :options="$this->listsForFields['stream_master']" multiple/>
            <div class="validation-message">
                {{ $errors->first('stream_master') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.stream_master_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('course') ? 'invalid' : '' }}">
            <label class="form-label" for="course">{{ trans('cruds.abilityWiseObservation.fields.course') }}</label>
            <x-select-list class="form-control" id="course" name="course" wire:model="course"
                           :options="$this->listsForFields['course']" multiple/>
            <div class="validation-message">
                {{ $errors->first('course') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.course_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">
        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('college') ? 'invalid' : '' }}">
            <label class="form-label" for="college">{{ trans('cruds.abilityWiseObservation.fields.college') }}</label>
            <x-select-list class="form-control" id="college" name="college" wire:model="college"
                           :options="$this->listsForFields['college']" multiple/>
            <div class="validation-message">
                {{ $errors->first('college') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.college_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('profession') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="profession">{{ trans('cruds.abilityWiseObservation.fields.profession') }}</label>
            <x-select-list class="form-control" id="profession" name="profession" wire:model="profession"
                           :options="$this->listsForFields['profession']" multiple/>
            <div class="validation-message">
                {{ $errors->first('profession') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.abilityWiseObservation.fields.profession_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.ability-wise-observations.index') }}" class="btn btn-secondary">
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