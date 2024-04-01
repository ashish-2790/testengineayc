<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('streamMaster.group_master_id') ? 'invalid' : '' }}">
        <label class="form-label" for="group_master">{{ trans('cruds.streamMaster.fields.group_master') }}</label>
        <x-select-list class="form-control" id="group_master" name="group_master" :options="$this->listsForFields['group_master']" wire:model="streamMaster.group_master_id" />
        <div class="validation-message">
            {{ $errors->first('streamMaster.group_master_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.streamMaster.fields.group_master_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('streamMaster.stream_name') ? 'invalid' : '' }}">
        <label class="form-label" for="stream_name">{{ trans('cruds.streamMaster.fields.stream_name') }}</label>
        <input class="form-control" type="text" name="stream_name" id="stream_name" wire:model.defer="streamMaster.stream_name">
        <div class="validation-message">
            {{ $errors->first('streamMaster.stream_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.streamMaster.fields.stream_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('streamMaster.stream_description') ? 'invalid' : '' }}">
        <label class="form-label" for="stream_description">{{ trans('cruds.streamMaster.fields.stream_description') }}</label>
        <textarea class="form-control" name="stream_description" id="stream_description" wire:model.defer="streamMaster.stream_description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('streamMaster.stream_description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.streamMaster.fields.stream_description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('streamMaster.icon_url') ? 'invalid' : '' }}">
        <label class="form-label" for="icon_url">{{ trans('cruds.streamMaster.fields.icon_url') }}</label>
        <input class="form-control" type="text" name="icon_url" id="icon_url" wire:model.defer="streamMaster.icon_url">
        <div class="validation-message">
            {{ $errors->first('streamMaster.icon_url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.streamMaster.fields.icon_url_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('streamMaster.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive" wire:model.defer="streamMaster.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.streamMaster.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('streamMaster.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.streamMaster.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.stream-masters.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>