<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('classMaster.class_name') ? 'invalid' : '' }}">
        <label class="form-label" for="class_name">{{ trans('cruds.classMaster.fields.class_name') }}</label>
        <input class="form-control" type="text" name="class_name" id="class_name" wire:model.defer="classMaster.class_name">
        <div class="validation-message">
            {{ $errors->first('classMaster.class_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.classMaster.fields.class_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('classMaster.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive" wire:model.defer="classMaster.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.classMaster.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('classMaster.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.classMaster.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.class-masters.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>