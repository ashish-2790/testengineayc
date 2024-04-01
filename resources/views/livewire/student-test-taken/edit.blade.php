<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('studentTestTaken.related_class_name_id') ? 'invalid' : '' }}">
        <label class="form-label" for="related_class_name">{{ trans('cruds.studentTestTaken.fields.related_class_name') }}</label>
        <x-select-list class="form-control" id="related_class_name" name="related_class_name" :options="$this->listsForFields['related_class_name']" wire:model="studentTestTaken.related_class_name_id" />
        <div class="validation-message">
            {{ $errors->first('studentTestTaken.related_class_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentTestTaken.fields.related_class_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studentTestTaken.related_student_id') ? 'invalid' : '' }}">
        <label class="form-label" for="related_student">{{ trans('cruds.studentTestTaken.fields.related_student') }}</label>
        <x-select-list class="form-control" id="related_student" name="related_student" :options="$this->listsForFields['related_student']" wire:model="studentTestTaken.related_student_id" />
        <div class="validation-message">
            {{ $errors->first('studentTestTaken.related_student_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentTestTaken.fields.related_student_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studentTestTaken.related_create_test_id') ? 'invalid' : '' }}">
        <label class="form-label" for="related_create_test">{{ trans('cruds.studentTestTaken.fields.related_create_test') }}</label>
        <x-select-list class="form-control" id="related_create_test" name="related_create_test" :options="$this->listsForFields['related_create_test']" wire:model="studentTestTaken.related_create_test_id" />
        <div class="validation-message">
            {{ $errors->first('studentTestTaken.related_create_test_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentTestTaken.fields.related_create_test_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studentTestTaken.started_at') ? 'invalid' : '' }}">
        <label class="form-label" for="started_at">{{ trans('cruds.studentTestTaken.fields.started_at') }}</label>
        <x-date-picker class="form-control" wire:model="studentTestTaken.started_at" id="started_at" name="started_at" />
        <div class="validation-message">
            {{ $errors->first('studentTestTaken.started_at') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentTestTaken.fields.started_at_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studentTestTaken.ended_at') ? 'invalid' : '' }}">
        <label class="form-label" for="ended_at">{{ trans('cruds.studentTestTaken.fields.ended_at') }}</label>
        <x-date-picker class="form-control" wire:model="studentTestTaken.ended_at" id="ended_at" name="ended_at" />
        <div class="validation-message">
            {{ $errors->first('studentTestTaken.ended_at') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentTestTaken.fields.ended_at_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studentTestTaken.stage') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.studentTestTaken.fields.stage') }}</label>
        <select class="form-control" wire:model="studentTestTaken.stage">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['stage'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('studentTestTaken.stage') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentTestTaken.fields.stage_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studentTestTaken.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive" wire:model.defer="studentTestTaken.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.studentTestTaken.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('studentTestTaken.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentTestTaken.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.student-test-takens.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>