<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('streamGroup.stream_group_master') ? 'invalid' : '' }}">
        <label class="form-label" for="stream_group_master">{{ trans('cruds.streamGroup.fields.stream_group_master') }}</label>
        <input class="form-control" type="text" name="stream_group_master" id="stream_group_master" wire:model.defer="streamGroup.stream_group_master">
        <div class="validation-message">
            {{ $errors->first('streamGroup.stream_group_master') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.streamGroup.fields.stream_group_master_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('streamGroup.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive" wire:model.defer="streamGroup.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.streamGroup.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('streamGroup.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.streamGroup.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.stream-groups.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>