<form wire:submit.prevent="submit" class="pt-3">
    <div class="row m-0 g-5  flex">
        <div class="form-group w-full lg:w-2/12 px-4 pt-4 {{ $errors->has('school.name') ? 'invalid' : '' }}">
            <label class="form-label" for="name">{{ trans('cruds.school.fields.name') }}</label>
            <input class="form-control" type="text" name="name" id="name" wire:model.defer="school.name">
            <div class="validation-message">
                {{ $errors->first('school.name') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.school.fields.name_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-2/12 px-4 {{ $errors->has('class_name') ? 'invalid' : '' }}">
            <label class="form-label" for="class_name">{{ trans('cruds.school.fields.class_name') }}</label>
            <x-select-list class="form-control" id="class_name" name="class_name" wire:model="class_name"
                           :options="$this->listsForFields['class_name']" multiple/>
            <div class="validation-message">
                {{ $errors->first('class_name') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.school.fields.class_name_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">
        <div class="form-group w-full lg:w-2/12 px-4 pt-4 {{ $errors->has('school.email') ? 'invalid' : '' }}">
            <label class="form-label" for="email">{{ trans('cruds.school.fields.email') }}</label>
            <input class="form-control" type="email" name="email" id="email" wire:model.defer="school.email">
            <div class="validation-message">
                {{ $errors->first('school.email') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.school.fields.email_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-2/12 px-4  {{ $errors->has('school.website') ? 'invalid' : '' }}">
            <label class="form-label" for="website">{{ trans('cruds.school.fields.website') }}</label>
            <input class="form-control" type="text" name="website" id="website" wire:model.defer="school.website">
            <div class="validation-message">
                {{ $errors->first('school.website') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.school.fields.website_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-2/12 px-4  {{ $errors->has('school.phone_no') ? 'invalid' : '' }}">
            <label class="form-label" for="phone_no">{{ trans('cruds.school.fields.phone_no') }}</label>
            <input class="form-control" type="text" name="phone_no" id="phone_no" wire:model.defer="school.phone_no">
            <div class="validation-message">
                {{ $errors->first('school.phone_no') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.school.fields.phone_no_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">
        <div class="form-group w-full lg:w-2/12 px-4 pt-4 {{ $errors->has('school.school_code') ? 'invalid' : '' }}">
            <label class="form-label" for="school_code">{{ trans('cruds.school.fields.school_code') }}</label>
            <input class="form-control" type="text" name="school_code" id="school_code"
                   wire:model.defer="school.school_code">
            <div class="validation-message">
                {{ $errors->first('school.school_code') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.school.fields.school_code_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-2/12 px-4 {{ $errors->has('school.affiliation') ? 'invalid' : '' }}">
            <label class="form-label" for="affiliation">{{ trans('cruds.school.fields.affiliation') }}</label>
            <input class="form-control" type="text" name="affiliation" id="affiliation"
                   wire:model.defer="school.affiliation">
            <div class="validation-message">
                {{ $errors->first('school.affiliation') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.school.fields.affiliation_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-2/12 px-4 {{ $errors->has('school.address') ? 'invalid' : '' }}">
            <label class="form-label" for="address">{{ trans('cruds.school.fields.address') }}</label>
            <textarea class="form-control" name="address" id="address" wire:model.defer="school.address"
                      rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('school.address') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.school.fields.address_helper') }}
            </div>
        </div>
    </div>
    <div class="row m-0 g-5  flex">
        <div class="form-group w-full lg:w-2/12 px-4 pt-4{{ $errors->has('mediaCollections.school_logo_square') ? 'invalid' : '' }}">
            <label class="form-label" for="logo_square">{{ trans('cruds.school.fields.logo_square') }}</label>
            <x-dropzone id="logo_square" name="logo_square" action="{{ route('admin.schools.storeMedia') }}"
                        collection-name="school_logo_square" max-file-size="2" max-files="1"/>
            <div class="validation-message">
                {{ $errors->first('mediaCollections.school_logo_square') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.school.fields.logo_square_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-2/12 px-4 {{ $errors->has('mediaCollections.school_logo_wide') ? 'invalid' : '' }}">
            <label class="form-label" for="logo_wide">{{ trans('cruds.school.fields.logo_wide') }}</label>
            <x-dropzone id="logo_wide" name="logo_wide" action="{{ route('admin.schools.storeMedia') }}"
                        collection-name="school_logo_wide" max-file-size="2" max-files="1"/>
            <div class="validation-message">
                {{ $errors->first('mediaCollections.school_logo_wide') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.school.fields.logo_wide_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group {{ $errors->has('school.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive"
               wire:model.defer="school.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.school.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('school.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.school.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.schools.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>