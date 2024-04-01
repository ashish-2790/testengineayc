<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('uploadMaster.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.uploadMaster.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="uploadMaster.title">
        <div class="validation-message">
            {{ $errors->first('uploadMaster.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.uploadMaster.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.upload_master_related_doc') ? 'invalid' : '' }}">
        <label class="form-label" for="related_doc">{{ trans('cruds.uploadMaster.fields.related_doc') }}</label>
        <x-dropzone id="related_doc" name="related_doc" action="{{ route('admin.upload-masters.storeMedia') }}" collection-name="upload_master_related_doc" max-file-size="2" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.upload_master_related_doc') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.uploadMaster.fields.related_doc_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.upload-masters.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>