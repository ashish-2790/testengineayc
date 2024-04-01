<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('professionMaster.profession_name') ? 'invalid' : '' }}">
        <label class="form-label" for="profession_name">{{ trans('cruds.professionMaster.fields.profession_name') }}</label>
        <input class="form-control" type="text" name="profession_name" id="profession_name" wire:model.defer="professionMaster.profession_name">
        <div class="validation-message">
            {{ $errors->first('professionMaster.profession_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.professionMaster.fields.profession_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('professionMaster.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive" wire:model.defer="professionMaster.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.professionMaster.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('professionMaster.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.professionMaster.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.profession-masters.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>