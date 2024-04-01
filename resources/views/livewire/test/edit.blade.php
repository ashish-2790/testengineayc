<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('class_name') ? 'invalid' : '' }}">
        <label class="form-label" for="class_name">{{ trans('cruds.test.fields.class_name') }}</label>
        <x-select-list class="form-control" id="class_name" name="class_name" wire:model="class_name" :options="$this->listsForFields['class_name']" multiple />
        <div class="validation-message">
            {{ $errors->first('class_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.test.fields.class_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('test.test_name') ? 'invalid' : '' }}">
        <label class="form-label" for="test_name">{{ trans('cruds.test.fields.test_name') }}</label>
        <input class="form-control" type="text" name="test_name" id="test_name" wire:model.defer="test.test_name">
        <div class="validation-message">
            {{ $errors->first('test.test_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.test.fields.test_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('test.order') ? 'invalid' : '' }}">
        <label class="form-label required" for="order">{{ trans('cruds.test.fields.order') }}</label>
        <input class="form-control" type="number" name="order" id="order" required wire:model.defer="test.order" step="1">
        <div class="validation-message">
            {{ $errors->first('test.order') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.test.fields.order_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('test.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive" wire:model.defer="test.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.test.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('test.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.test.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.tests.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>