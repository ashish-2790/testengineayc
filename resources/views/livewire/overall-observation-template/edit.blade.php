<form wire:submit.prevent="submit" class="pt-3">
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4  {{ $errors->has('class') ? 'invalid' : '' }}">
            <label class="form-label" for="class">{{ trans('cruds.overallObservationTemplate.fields.class') }}</label>
            <x-select-list class="form-control" id="class" name="class" wire:model="class" :options="$this->listsForFields['class']" multiple />
            <div class="validation-message">
                {{ $errors->first('class') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.class_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.test_type_id') ? 'invalid' : '' }}">
            <label class="form-label" for="test_type">{{ trans('cruds.overallObservationTemplate.fields.test_type') }}</label>
            <x-select-list class="form-control" id="test_type" name="test_type" :options="$this->listsForFields['test_type']" wire:model="overallObservationTemplate.test_type_id" />
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.test_type_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.test_type_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('overallObservationTemplate.overall_stenscore_from') ? 'invalid' : '' }}">
            <label class="form-label" for="overall_stenscore_from">{{ trans('cruds.overallObservationTemplate.fields.overall_stenscore_from') }}</label>
            <input class="form-control" type="text" name="overall_stenscore_from" id="overall_stenscore_from" wire:model.defer="overallObservationTemplate.overall_stenscore_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.overall_stenscore_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.overall_stenscore_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.overall_stenscore_to') ? 'invalid' : '' }}">
            <label class="form-label" for="overall_stenscore_to">{{ trans('cruds.overallObservationTemplate.fields.overall_stenscore_to') }}</label>
            <input class="form-control" type="text" name="overall_stenscore_to" id="overall_stenscore_to" wire:model.defer="overallObservationTemplate.overall_stenscore_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.overall_stenscore_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.overall_stenscore_to_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group {{ $errors->has('overallObservationTemplate.short_description') ? 'invalid' : '' }}">
        <label class="form-label" for="short_description">{{ trans('cruds.overallObservationTemplate.fields.short_description') }}</label>
        <input class="form-control" type="text" name="short_description" id="short_description" wire:model.defer="overallObservationTemplate.short_description">
        <div class="validation-message">
            {{ $errors->first('overallObservationTemplate.short_description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.overallObservationTemplate.fields.short_description_helper') }}
        </div>
    </div>
    <div wire:ignore>
        <div class="form-group {{ $errors->has('overallObservationTemplate.detailed_observation_1') ? 'invalid' : '' }}">
            <label class="form-label" for="detailed_observation_1">{{ trans('cruds.overallObservationTemplate.fields.detailed_observation_1') }}</label>
            <textarea class="form-control" name="detailed_observation_1" id="detailed_observation_1" wire:model.defer="overallObservationTemplate.detailed_observation_1" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.detailed_observation_1') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_1_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('overallObservationTemplate.detailed_observation_2') ? 'invalid' : '' }}">
            <label class="form-label" for="detailed_observation_2">{{ trans('cruds.overallObservationTemplate.fields.detailed_observation_2') }}</label>
            <textarea class="form-control" name="detailed_observation_2" id="detailed_observation_2" wire:model.defer="overallObservationTemplate.detailed_observation_2" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.detailed_observation_2') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_2_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('overallObservationTemplate.detailed_observation_3') ? 'invalid' : '' }}">
            <label class="form-label" for="detailed_observation_3">{{ trans('cruds.overallObservationTemplate.fields.detailed_observation_3') }}</label>
            <textarea class="form-control" name="detailed_observation_3" id="detailed_observation_3" wire:model.defer="overallObservationTemplate.detailed_observation_3" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.detailed_observation_3') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_3_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('overallObservationTemplate.detailed_observation_4') ? 'invalid' : '' }}">
            <label class="form-label" for="detailed_observation_4">{{ trans('cruds.overallObservationTemplate.fields.detailed_observation_4') }}</label>
            <textarea class="form-control" name="detailed_observation_4" id="detailed_observation_4" wire:model.defer="overallObservationTemplate.detailed_observation_4" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.detailed_observation_4') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_4_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('overallObservationTemplate.detailed_observation_5') ? 'invalid' : '' }}">
            <label class="form-label" for="detailed_observation_5">{{ trans('cruds.overallObservationTemplate.fields.detailed_observation_5') }}</label>
            <textarea class="form-control" name="detailed_observation_5" id="detailed_observation_5" wire:model.defer="overallObservationTemplate.detailed_observation_5" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.detailed_observation_5') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_5_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('overallObservationTemplate.detailed_observation_6') ? 'invalid' : '' }}">
            <label class="form-label" for="detailed_observation_6">{{ trans('cruds.overallObservationTemplate.fields.detailed_observation_6') }}</label>
            <textarea class="form-control" name="detailed_observation_6" id="detailed_observation_6" wire:model.defer="overallObservationTemplate.detailed_observation_6" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.detailed_observation_6') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_6_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('stream_group') ? 'invalid' : '' }}">
            <label class="form-label" for="stream_group">{{ trans('cruds.overallObservationTemplate.fields.stream_group') }}</label>
            <x-select-list class="form-control" id="stream_group" name="stream_group" wire:model="stream_group" :options="$this->listsForFields['stream_group']" multiple />
            <div class="validation-message">
                {{ $errors->first('stream_group') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.stream_group_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('stream') ? 'invalid' : '' }}">
            <label class="form-label" for="stream">{{ trans('cruds.overallObservationTemplate.fields.stream') }}</label>
            <x-select-list class="form-control" id="stream" name="stream" wire:model="stream" :options="$this->listsForFields['stream']" multiple />
            <div class="validation-message">
                {{ $errors->first('stream') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.stream_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('course') ? 'invalid' : '' }}">
            <label class="form-label" for="course">{{ trans('cruds.overallObservationTemplate.fields.course') }}</label>
            <x-select-list class="form-control" id="course" name="course" wire:model="course" :options="$this->listsForFields['course']" multiple />
            <div class="validation-message">
                {{ $errors->first('course') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.course_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('college') ? 'invalid' : '' }}">
            <label class="form-label" for="college">{{ trans('cruds.overallObservationTemplate.fields.college') }}</label>
            <x-select-list class="form-control" id="college" name="college" wire:model="college" :options="$this->listsForFields['college']" multiple />
            <div class="validation-message">
                {{ $errors->first('college') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.college_helper') }}
            </div>
        </div>
        <div class="form-group  w-full lg:w-6/12 px-4 {{ $errors->has('profession') ? 'invalid' : '' }}">
            <label class="form-label" for="profession">{{ trans('cruds.overallObservationTemplate.fields.profession') }}</label>
            <x-select-list class="form-control" id="profession" name="profession" wire:model="profession" :options="$this->listsForFields['profession']" multiple />
            <div class="validation-message">
                {{ $errors->first('profession') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.profession_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('overallObservationTemplate.ability_1_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_1_from">{{ trans('cruds.overallObservationTemplate.fields.ability_1_from') }}</label>
            <input class="form-control" type="text" name="ability_1_from" id="ability_1_from" wire:model.defer="overallObservationTemplate.ability_1_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_1_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_1_from_helper') }}
            </div>
        </div>
        <div class="form-group  w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_1_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_1_to">{{ trans('cruds.overallObservationTemplate.fields.ability_1_to') }}</label>
            <input class="form-control" type="text" name="ability_1_to" id="ability_1_to" wire:model.defer="overallObservationTemplate.ability_1_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_1_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_1_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_2_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_2_from">{{ trans('cruds.overallObservationTemplate.fields.ability_2_from') }}</label>
            <input class="form-control" type="text" name="ability_2_from" id="ability_2_from" wire:model.defer="overallObservationTemplate.ability_2_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_2_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_2_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_2_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_2_to">{{ trans('cruds.overallObservationTemplate.fields.ability_2_to') }}</label>
            <input class="form-control" type="text" name="ability_2_to" id="ability_2_to" wire:model.defer="overallObservationTemplate.ability_2_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_2_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_2_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_3_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_3_from">{{ trans('cruds.overallObservationTemplate.fields.ability_3_from') }}</label>
            <input class="form-control" type="text" name="ability_3_from" id="ability_3_from" wire:model.defer="overallObservationTemplate.ability_3_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_3_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_3_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_3_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_3_to">{{ trans('cruds.overallObservationTemplate.fields.ability_3_to') }}</label>
            <input class="form-control" type="text" name="ability_3_to" id="ability_3_to" wire:model.defer="overallObservationTemplate.ability_3_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_3_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_3_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_4_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_4_from">{{ trans('cruds.overallObservationTemplate.fields.ability_4_from') }}</label>
            <input class="form-control" type="text" name="ability_4_from" id="ability_4_from" wire:model.defer="overallObservationTemplate.ability_4_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_4_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_4_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_4_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_4_to">{{ trans('cruds.overallObservationTemplate.fields.ability_4_to') }}</label>
            <input class="form-control" type="text" name="ability_4_to" id="ability_4_to" wire:model.defer="overallObservationTemplate.ability_4_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_4_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_4_to_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('overallObservationTemplate.ability_5_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_5_from">{{ trans('cruds.overallObservationTemplate.fields.ability_5_from') }}</label>
            <input class="form-control" type="text" name="ability_5_from" id="ability_5_from" wire:model.defer="overallObservationTemplate.ability_5_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_5_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_5_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_5_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_5_to">{{ trans('cruds.overallObservationTemplate.fields.ability_5_to') }}</label>
            <input class="form-control" type="text" name="ability_5_to" id="ability_5_to" wire:model.defer="overallObservationTemplate.ability_5_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_5_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_5_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_6_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_6_from">{{ trans('cruds.overallObservationTemplate.fields.ability_6_from') }}</label>
            <input class="form-control" type="text" name="ability_6_from" id="ability_6_from" wire:model.defer="overallObservationTemplate.ability_6_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_6_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_6_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_6_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_6_to">{{ trans('cruds.overallObservationTemplate.fields.ability_6_to') }}</label>
            <input class="form-control" type="text" name="ability_6_to" id="ability_6_to" wire:model.defer="overallObservationTemplate.ability_6_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_6_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_6_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_7_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_7_from">{{ trans('cruds.overallObservationTemplate.fields.ability_7_from') }}</label>
            <input class="form-control" type="text" name="ability_7_from" id="ability_7_from" wire:model.defer="overallObservationTemplate.ability_7_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_7_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_7_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_7_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_7_to">{{ trans('cruds.overallObservationTemplate.fields.ability_7_to') }}</label>
            <input class="form-control" type="text" name="ability_7_to" id="ability_7_to" wire:model.defer="overallObservationTemplate.ability_7_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_7_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_7_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_8_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_8_from">{{ trans('cruds.overallObservationTemplate.fields.ability_8_from') }}</label>
            <input class="form-control" type="text" name="ability_8_from" id="ability_8_from" wire:model.defer="overallObservationTemplate.ability_8_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_8_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_8_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_8_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_8_to">{{ trans('cruds.overallObservationTemplate.fields.ability_8_to') }}</label>
            <input class="form-control" type="text" name="ability_8_to" id="ability_8_to" wire:model.defer="overallObservationTemplate.ability_8_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_8_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_8_to_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('overallObservationTemplate.ability_9_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_9_from">{{ trans('cruds.overallObservationTemplate.fields.ability_9_from') }}</label>
            <input class="form-control" type="text" name="ability_9_from" id="ability_9_from" wire:model.defer="overallObservationTemplate.ability_9_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_9_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_9_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_9_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_9_to">{{ trans('cruds.overallObservationTemplate.fields.ability_9_to') }}</label>
            <input class="form-control" type="text" name="ability_9_to" id="ability_9_to" wire:model.defer="overallObservationTemplate.ability_9_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_9_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_9_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_10_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_10_from">{{ trans('cruds.overallObservationTemplate.fields.ability_10_from') }}</label>
            <input class="form-control" type="text" name="ability_10_from" id="ability_10_from" wire:model.defer="overallObservationTemplate.ability_10_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_10_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_10_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_10_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_10_to">{{ trans('cruds.overallObservationTemplate.fields.ability_10_to') }}</label>
            <input class="form-control" type="text" name="ability_10_to" id="ability_10_to" wire:model.defer="overallObservationTemplate.ability_10_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_10_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_10_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_11_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_11_from">{{ trans('cruds.overallObservationTemplate.fields.ability_11_from') }}</label>
            <input class="form-control" type="text" name="ability_11_from" id="ability_11_from" wire:model.defer="overallObservationTemplate.ability_11_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_11_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_11_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_11_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_11_to">{{ trans('cruds.overallObservationTemplate.fields.ability_11_to') }}</label>
            <input class="form-control" type="text" name="ability_11_to" id="ability_11_to" wire:model.defer="overallObservationTemplate.ability_11_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_11_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_11_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_12_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_12_from">{{ trans('cruds.overallObservationTemplate.fields.ability_12_from') }}</label>
            <input class="form-control" type="text" name="ability_12_from" id="ability_12_from" wire:model.defer="overallObservationTemplate.ability_12_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_12_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_12_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_12_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_12_to">{{ trans('cruds.overallObservationTemplate.fields.ability_12_to') }}</label>
            <input class="form-control" type="text" name="ability_12_to" id="ability_12_to" wire:model.defer="overallObservationTemplate.ability_12_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_12_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_12_to_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('overallObservationTemplate.ability_13_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_13_from">{{ trans('cruds.overallObservationTemplate.fields.ability_13_from') }}</label>
            <input class="form-control" type="text" name="ability_13_from" id="ability_13_from" wire:model.defer="overallObservationTemplate.ability_13_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_13_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_13_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_13_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_13_to">{{ trans('cruds.overallObservationTemplate.fields.ability_13_to') }}</label>
            <input class="form-control" type="text" name="ability_13_to" id="ability_13_to" wire:model.defer="overallObservationTemplate.ability_13_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_13_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_13_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_14_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_14_from">{{ trans('cruds.overallObservationTemplate.fields.ability_14_from') }}</label>
            <input class="form-control" type="text" name="ability_14_from" id="ability_14_from" wire:model.defer="overallObservationTemplate.ability_14_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_14_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_14_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_14_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_14_to">{{ trans('cruds.overallObservationTemplate.fields.ability_14_to') }}</label>
            <input class="form-control" type="text" name="ability_14_to" id="ability_14_to" wire:model.defer="overallObservationTemplate.ability_14_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_14_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_14_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_15_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_15_from">{{ trans('cruds.overallObservationTemplate.fields.ability_15_from') }}</label>
            <input class="form-control" type="text" name="ability_15_from" id="ability_15_from" wire:model.defer="overallObservationTemplate.ability_15_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_15_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_15_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_15_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_15_to">{{ trans('cruds.overallObservationTemplate.fields.ability_15_to') }}</label>
            <input class="form-control" type="text" name="ability_15_to" id="ability_15_to" wire:model.defer="overallObservationTemplate.ability_15_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_15_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_15_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_16_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_16_from">{{ trans('cruds.overallObservationTemplate.fields.ability_16_from') }}</label>
            <input class="form-control" type="text" name="ability_16_from" id="ability_16_from" wire:model.defer="overallObservationTemplate.ability_16_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_16_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_16_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_16_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_16_to">{{ trans('cruds.overallObservationTemplate.fields.ability_16_to') }}</label>
            <input class="form-control" type="text" name="ability_16_to" id="ability_16_to" wire:model.defer="overallObservationTemplate.ability_16_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_16_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_16_to_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('overallObservationTemplate.ability_17_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_17_from">{{ trans('cruds.overallObservationTemplate.fields.ability_17_from') }}</label>
            <input class="form-control" type="text" name="ability_17_from" id="ability_17_from" wire:model.defer="overallObservationTemplate.ability_17_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_17_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_17_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_17_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_17_to">{{ trans('cruds.overallObservationTemplate.fields.ability_17_to') }}</label>
            <input class="form-control" type="text" name="ability_17_to" id="ability_17_to" wire:model.defer="overallObservationTemplate.ability_17_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_17_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_17_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_18_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_18_from">{{ trans('cruds.overallObservationTemplate.fields.ability_18_from') }}</label>
            <input class="form-control" type="text" name="ability_18_from" id="ability_18_from" wire:model.defer="overallObservationTemplate.ability_18_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_18_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_18_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_18_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_18_to">{{ trans('cruds.overallObservationTemplate.fields.ability_18_to') }}</label>
            <input class="form-control" type="text" name="ability_18_to" id="ability_18_to" wire:model.defer="overallObservationTemplate.ability_18_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_18_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_18_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_19_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_19_from">{{ trans('cruds.overallObservationTemplate.fields.ability_19_from') }}</label>
            <input class="form-control" type="text" name="ability_19_from" id="ability_19_from" wire:model.defer="overallObservationTemplate.ability_19_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_19_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_19_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_19_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_19_to">{{ trans('cruds.overallObservationTemplate.fields.ability_19_to') }}</label>
            <input class="form-control" type="text" name="ability_19_to" id="ability_19_to" wire:model.defer="overallObservationTemplate.ability_19_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_19_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_19_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_20_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_20_from">{{ trans('cruds.overallObservationTemplate.fields.ability_20_from') }}</label>
            <input class="form-control" type="text" name="ability_20_from" id="ability_20_from" wire:model.defer="overallObservationTemplate.ability_20_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_20_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_20_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_20_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_20_to">{{ trans('cruds.overallObservationTemplate.fields.ability_20_to') }}</label>
            <input class="form-control" type="text" name="ability_20_to" id="ability_20_to" wire:model.defer="overallObservationTemplate.ability_20_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_20_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_20_to_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('overallObservationTemplate.ability_21_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_21_from">{{ trans('cruds.overallObservationTemplate.fields.ability_21_from') }}</label>
            <input class="form-control" type="text" name="ability_21_from" id="ability_21_from" wire:model.defer="overallObservationTemplate.ability_21_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_21_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_21_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_21_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_21_to">{{ trans('cruds.overallObservationTemplate.fields.ability_21_to') }}</label>
            <input class="form-control" type="text" name="ability_21_to" id="ability_21_to" wire:model.defer="overallObservationTemplate.ability_21_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_21_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_21_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_22_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_22_from">{{ trans('cruds.overallObservationTemplate.fields.ability_22_from') }}</label>
            <input class="form-control" type="text" name="ability_22_from" id="ability_22_from" wire:model.defer="overallObservationTemplate.ability_22_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_22_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_22_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_22_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_22_to">{{ trans('cruds.overallObservationTemplate.fields.ability_22_to') }}</label>
            <input class="form-control" type="text" name="ability_22_to" id="ability_22_to" wire:model.defer="overallObservationTemplate.ability_22_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_22_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_22_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_23_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_23_from">{{ trans('cruds.overallObservationTemplate.fields.ability_23_from') }}</label>
            <input class="form-control" type="text" name="ability_23_from" id="ability_23_from" wire:model.defer="overallObservationTemplate.ability_23_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_23_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_23_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_23_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_23_to">{{ trans('cruds.overallObservationTemplate.fields.ability_23_to') }}</label>
            <input class="form-control" type="text" name="ability_23_to" id="ability_23_to" wire:model.defer="overallObservationTemplate.ability_23_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_23_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_23_to_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_24_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_24_from">{{ trans('cruds.overallObservationTemplate.fields.ability_24_from') }}</label>
            <input class="form-control" type="text" name="ability_24_from" id="ability_24_from" wire:model.defer="overallObservationTemplate.ability_24_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_24_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_24_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_24_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_24_to">{{ trans('cruds.overallObservationTemplate.fields.ability_24_to') }}</label>
            <input class="form-control" type="text" name="ability_24_to" id="ability_24_to" wire:model.defer="overallObservationTemplate.ability_24_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_24_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_24_to_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">

        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('overallObservationTemplate.ability_25_from') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_25_from">{{ trans('cruds.overallObservationTemplate.fields.ability_25_from') }}</label>
            <input class="form-control" type="text" name="ability_25_from" id="ability_25_from" wire:model.defer="overallObservationTemplate.ability_25_from">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_25_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_25_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('overallObservationTemplate.ability_25_to') ? 'invalid' : '' }}">
            <label class="form-label" for="ability_25_to">{{ trans('cruds.overallObservationTemplate.fields.ability_25_to') }}</label>
            <input class="form-control" type="text" name="ability_25_to" id="ability_25_to" wire:model.defer="overallObservationTemplate.ability_25_to">
            <div class="validation-message">
                {{ $errors->first('overallObservationTemplate.ability_25_to') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.overallObservationTemplate.fields.ability_25_to_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.overall-observation-templates.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
<script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script>
    document.addEventListener('livewire:load', function () {

        const editorDetailedObservation1 = CKEDITOR.replace('detailed_observation_1');
        editorDetailedObservation1.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('detailed_observation_1', event.editor.getData());
        });

        const editorDetailedObservation2 = CKEDITOR.replace('detailed_observation_2');
        editorDetailedObservation2.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('detailed_observation_2', event.editor.getData());
        });

        const editorDetailedObservation3 = CKEDITOR.replace('detailed_observation_3');
        editorDetailedObservation3.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('detailed_observation_3', event.editor.getData());
        });

        const editorDetailedObservation4 = CKEDITOR.replace('detailed_observation_4');
        editorDetailedObservation4.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('detailed_observation_4', event.editor.getData());
        });

        const editorDetailedObservation5 = CKEDITOR.replace('detailed_observation_5');
        editorDetailedObservation5.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('detailed_observation_5', event.editor.getData());
        });

        const editorDetailedObservation6 = CKEDITOR.replace('detailed_observation_6');
        editorDetailedObservation6.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('detailed_observation_6', event.editor.getData());
        });



    });
</script>
