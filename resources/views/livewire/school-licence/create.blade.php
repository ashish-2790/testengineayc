<form wire:submit.prevent="submit" class="pt-3">
    <div class="row m-0 g-5  flex">
    <div class="form-group w-full lg:w-2/12 px-4 pt-4  {{ $errors->has('schoolLicence.school_name_id') ? 'invalid' : '' }}">
        <label class="form-label" for="school_name">{{ trans('cruds.schoolLicence.fields.school_name') }}</label>
        <x-select-list class="form-control" id="school_name" name="school_name" :options="$this->listsForFields['school_name']" wire:model="schoolLicence.school_name_id" />
        <div class="validation-message">
            {{ $errors->first('schoolLicence.school_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.schoolLicence.fields.school_name_helper') }}
        </div>
    </div>
    <div class="form-group w-full lg:w-2/12 px-4   {{ $errors->has('schoolLicence.related_class_name_id') ? 'invalid' : '' }}">
        <label class="form-label" for="related_class_name">{{ trans('cruds.schoolLicence.fields.related_class_name') }}</label>
        <x-select-list class="form-control" id="related_class_name" name="related_class_name" :options="$this->listsForFields['related_class_name']" wire:model="schoolLicence.related_class_name_id" />
        <div class="validation-message">
            {{ $errors->first('schoolLicence.related_class_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.schoolLicence.fields.related_class_name_helper') }}
        </div>
    </div>
    <div class="form-group w-full lg:w-2/12 px-4  {{ $errors->has('schoolLicence.related_test_type_id') ? 'invalid' : '' }}">
        <label class="form-label" for="related_test_type">{{ trans('cruds.schoolLicence.fields.related_test_type') }}</label>
        <x-select-list class="form-control" id="related_test_type" name="related_test_type" :options="$this->listsForFields['related_test_type']" wire:model="schoolLicence.related_test_type_id" />
        <div class="validation-message">
            {{ $errors->first('schoolLicence.related_test_type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.schoolLicence.fields.related_test_type_helper') }}
        </div>
    </div>
    </div>
    <div class="row m-0 g-5  flex">

    <div class="form-group w-full lg:w-2/12 px-4 pt-4  {{ $errors->has('schoolLicence.student_count') ? 'invalid' : '' }}">
        <label class="form-label" for="student_count">{{ trans('cruds.schoolLicence.fields.student_count') }}</label>
        <input class="form-control" type="text" name="student_count" id="student_count" wire:model.defer="schoolLicence.student_count">
        <div class="validation-message">
            {{ $errors->first('schoolLicence.student_count') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.schoolLicence.fields.student_count_helper') }}
        </div>
    </div>
    <div class="form-group w-full lg:w-2/12 px-4  {{ $errors->has('schoolLicence.valid_from') ? 'invalid' : '' }}">
        <label class="form-label" for="valid_from">{{ trans('cruds.schoolLicence.fields.valid_from') }}</label>
        <x-date-picker class="form-control" wire:model="schoolLicence.valid_from" id="valid_from" name="valid_from" picker="date" />
        <div class="validation-message">
            {{ $errors->first('schoolLicence.valid_from') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.schoolLicence.fields.valid_from_helper') }}
        </div>
    </div>
    <div class="form-group w-full lg:w-2/12 px-4  {{ $errors->has('schoolLicence.valid_to') ? 'invalid' : '' }}">
        <label class="form-label" for="valid_to">{{ trans('cruds.schoolLicence.fields.valid_to') }}</label>
        <x-date-picker class="form-control" wire:model="schoolLicence.valid_to" id="valid_to" name="valid_to" picker="date" />
        <div class="validation-message">
            {{ $errors->first('schoolLicence.valid_to') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.schoolLicence.fields.valid_to_helper') }}
        </div>
    </div>

    </div>


    <div class="form-group {{ $errors->has('schoolLicence.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive" wire:model.defer="schoolLicence.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.schoolLicence.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('schoolLicence.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.schoolLicence.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.school-licences.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>