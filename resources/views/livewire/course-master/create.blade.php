<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('courseMaster.stream_id') ? 'invalid' : '' }}">
        <label class="form-label" for="stream">{{ trans('cruds.courseMaster.fields.stream') }}</label>
        <x-select-list class="form-control" id="stream" name="stream" :options="$this->listsForFields['stream']" wire:model="courseMaster.stream_id" />
        <div class="validation-message">
            {{ $errors->first('courseMaster.stream_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseMaster.fields.stream_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('courseMaster.course_name') ? 'invalid' : '' }}">
        <label class="form-label" for="course_name">{{ trans('cruds.courseMaster.fields.course_name') }}</label>
        <input class="form-control" type="text" name="course_name" id="course_name" wire:model.defer="courseMaster.course_name">
        <div class="validation-message">
            {{ $errors->first('courseMaster.course_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseMaster.fields.course_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('courseMaster.course_description') ? 'invalid' : '' }}">
        <label class="form-label" for="course_description">{{ trans('cruds.courseMaster.fields.course_description') }}</label>
        <textarea class="form-control" name="course_description" id="course_description" wire:model.defer="courseMaster.course_description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('courseMaster.course_description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseMaster.fields.course_description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('related_college') ? 'invalid' : '' }}">
        <label class="form-label" for="related_college">{{ trans('cruds.courseMaster.fields.related_college') }}</label>
        <x-select-list class="form-control" id="related_college" name="related_college" wire:model="related_college" :options="$this->listsForFields['related_college']" multiple />
        <div class="validation-message">
            {{ $errors->first('related_college') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseMaster.fields.related_college_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('courseMaster.image_url') ? 'invalid' : '' }}">
        <label class="form-label" for="image_url">{{ trans('cruds.courseMaster.fields.image_url') }}</label>
        <input class="form-control" type="text" name="image_url" id="image_url" wire:model.defer="courseMaster.image_url">
        <div class="validation-message">
            {{ $errors->first('courseMaster.image_url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseMaster.fields.image_url_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.course_master_related_image') ? 'invalid' : '' }}">
        <label class="form-label" for="related_image">{{ trans('cruds.courseMaster.fields.related_image') }}</label>
        <x-dropzone id="related_image" name="related_image" action="{{ route('admin.course-masters.storeMedia') }}" collection-name="course_master_related_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.course_master_related_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseMaster.fields.related_image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('courseMaster.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive" wire:model.defer="courseMaster.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.courseMaster.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('courseMaster.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseMaster.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.course-masters.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>