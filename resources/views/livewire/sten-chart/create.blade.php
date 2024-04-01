<form wire:submit.prevent="submit" class="pt-3">
    <div class="row m-0 g-5  flex">
    <div class="form-group  w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('stenChart.related_class_id') ? 'invalid' : '' }}">
        <label class="form-label" for="related_class">{{ trans('cruds.stenChart.fields.related_class') }}</label>
        <x-select-list class="form-control" id="related_class" name="related_class" :options="$this->listsForFields['related_class']" wire:model="stenChart.related_class_id" />
        <div class="validation-message">
            {{ $errors->first('stenChart.related_class_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stenChart.fields.related_class_helper') }}
        </div>
    </div>
    <div class="form-group  w-full lg:w-6/12 px-4 {{ $errors->has('stenChart.related_test_name_id') ? 'invalid' : '' }}">
        <label class="form-label" for="related_test_name">{{ trans('cruds.stenChart.fields.related_test_name') }}</label>
        <x-select-list class="form-control" id="related_test_name" name="related_test_name" :options="$this->listsForFields['related_test_name']" wire:model="stenChart.related_test_name_id" />
        <div class="validation-message">
            {{ $errors->first('stenChart.related_test_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stenChart.fields.related_test_name_helper') }}
        </div>
    </div>
    <div class="form-group  w-full lg:w-6/12 px-4 {{ $errors->has('stenChart.related_ability_name_id') ? 'invalid' : '' }}">
        <label class="form-label" for="related_ability_name">{{ trans('cruds.stenChart.fields.related_ability_name') }}</label>
        <x-select-list class="form-control" id="related_ability_name" name="related_ability_name" :options="$this->listsForFields['related_ability_name']" wire:model="stenChart.related_ability_name_id" />
        <div class="validation-message">
            {{ $errors->first('stenChart.related_ability_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stenChart.fields.related_ability_name_helper') }}
        </div>
    </div>
    </div>
    <div class="row m-0 g-5  flex">
{{--    <div class="form-group  w-full lg:w-6/12 px-4 pt-4{{ $errors->has('stenChart.max_score_raw') ? 'invalid' : '' }}">--}}
{{--        <label class="form-label" for="max_score_raw">{{ trans('cruds.stenChart.fields.max_score_raw') }}</label>--}}
{{--        <input class="form-control" type="text" name="max_score_raw" id="max_score_raw" wire:model.defer="stenChart.max_score_raw">--}}
{{--        <div class="validation-message">--}}
{{--            {{ $errors->first('stenChart.max_score_raw') }}--}}
{{--        </div>--}}
{{--        <div class="help-block">--}}
{{--            {{ trans('cruds.stenChart.fields.max_score_raw_helper') }}--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="form-group  w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('stenChart.score_raw_from') ? 'invalid' : '' }}">
        <label class="form-label" for="score_raw_from">{{ trans('cruds.stenChart.fields.score_raw_from') }}</label>
        <input class="form-control" type="text" name="score_raw_from" id="score_raw_from" wire:model.defer="stenChart.score_raw_from">
        <div class="validation-message">
            {{ $errors->first('stenChart.score_raw_from') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stenChart.fields.score_raw_from_helper') }}
        </div>
    </div>
    <div class="form-group  w-full lg:w-6/12 px-4 {{ $errors->has('stenChart.score_raw_to') ? 'invalid' : '' }}">
        <label class="form-label" for="score_raw_to">{{ trans('cruds.stenChart.fields.score_raw_to') }}</label>
        <input class="form-control" type="text" name="score_raw_to" id="score_raw_to" wire:model.defer="stenChart.score_raw_to">
        <div class="validation-message">
            {{ $errors->first('stenChart.score_raw_to') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stenChart.fields.score_raw_to_helper') }}
        </div>
    </div>
    <div class="form-group  w-full lg:w-6/12 px-4 {{ $errors->has('stenChart.sten_score') ? 'invalid' : '' }}">
        <label class="form-label" for="sten_score">{{ trans('cruds.stenChart.fields.sten_score') }}</label>
        <input class="form-control" type="text" name="sten_score" id="sten_score" wire:model.defer="stenChart.sten_score">
        <div class="validation-message">
            {{ $errors->first('stenChart.sten_score') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stenChart.fields.sten_score_helper') }}
        </div>
    </div>
        <div class="w-full lg:w-4/12 px-4 form-group ">
            <label class="form-label">Gender</label>
            <label class="radio-label"><input type="radio" name="gender" wire:model="stenChart.udf_1" value="1">Boy</label>
            <label class="radio-label"><input type="radio" name="gender" wire:model="stenChart.udf_1" value="2">Girl</label>
            <div class="validation-message">
            </div>
            <div class="help-block">
            </div>
        </div>
    </div>


    <div class="form-group {{ $errors->has('stenChart.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive" wire:model.defer="stenChart.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.stenChart.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('stenChart.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stenChart.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.sten-charts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>