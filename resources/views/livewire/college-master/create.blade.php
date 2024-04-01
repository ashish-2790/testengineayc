<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('collegeMaster.college_name') ? 'invalid' : '' }}">
        <label class="form-label" for="college_name">{{ trans('cruds.collegeMaster.fields.college_name') }}</label>
        <input class="form-control" type="text" name="college_name" id="college_name" wire:model.defer="collegeMaster.college_name">
        <div class="validation-message">
            {{ $errors->first('collegeMaster.college_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.collegeMaster.fields.college_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('collegeMaster.website_url') ? 'invalid' : '' }}">
        <label class="form-label" for="website_url">{{ trans('cruds.collegeMaster.fields.website_url') }}</label>
        <input class="form-control" type="text" name="website_url" id="website_url" wire:model.defer="collegeMaster.website_url">
        <div class="validation-message">
            {{ $errors->first('collegeMaster.website_url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.collegeMaster.fields.website_url_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('collegeMaster.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive" wire:model.defer="collegeMaster.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.collegeMaster.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('collegeMaster.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.collegeMaster.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.college-masters.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>