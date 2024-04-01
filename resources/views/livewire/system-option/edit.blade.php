<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('systemOption.option_name') ? 'invalid' : '' }}">
        <label class="form-label" for="option_name">{{ trans('cruds.systemOption.fields.option_name') }}</label>
        <input class="form-control" type="text" name="option_name" id="option_name" wire:model.defer="systemOption.option_name">
        <div class="validation-message">
            {{ $errors->first('systemOption.option_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.systemOption.fields.option_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('systemOption.option_value') ? 'invalid' : '' }}">
        <label class="form-label" for="option_value">{{ trans('cruds.systemOption.fields.option_value') }}</label>
        <input class="form-control" type="text" name="option_value" id="option_value" wire:model.defer="systemOption.option_value">
        <div class="validation-message">
            {{ $errors->first('systemOption.option_value') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.systemOption.fields.option_value_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('systemOption.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive" wire:model.defer="systemOption.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.systemOption.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('systemOption.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.systemOption.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.system-options.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>