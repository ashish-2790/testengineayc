<form wire:submit.prevent="submit" class="pt-3">

{{--    <div class="form-group {{ $errors->has('abilityMaster.related_class_name_id') ? 'invalid' : '' }}">--}}
{{--        <label class="form-label" for="related_class_name">{{ trans('cruds.abilityMaster.fields.related_class_name') }}</label>--}}
{{--        <x-select-list class="form-control" id="related_class_name" name="related_class_name" :options="$this->listsForFields['related_class_name']" wire:model="abilityMaster.related_class_name_id" />--}}
{{--        <div class="validation-message">--}}
{{--            {{ $errors->first('abilityMaster.related_class_name_id') }}--}}
{{--        </div>--}}
{{--        <div class="help-block">--}}
{{--            {{ trans('cruds.abilityMaster.fields.related_class_name_helper') }}--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="form-group {{ $errors->has('abilityMaster.related_test_id') ? 'invalid' : '' }}">
        <label class="form-label" for="related_test">{{ trans('cruds.abilityMaster.fields.related_test') }}</label>
        <x-select-list class="form-control" id="related_test" name="related_test" :options="$this->listsForFields['related_test']" wire:model="abilityMaster.related_test_id" />
        <div class="validation-message">
            {{ $errors->first('abilityMaster.related_test_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.abilityMaster.fields.related_test_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('abilityMaster.ability_name') ? 'invalid' : '' }}">
        <label class="form-label" for="ability_name">{{ trans('cruds.abilityMaster.fields.ability_name') }}</label>
        <input class="form-control" type="text" name="ability_name" id="ability_name" wire:model.defer="abilityMaster.ability_name">
        <div class="validation-message">
            {{ $errors->first('abilityMaster.ability_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.abilityMaster.fields.ability_name_helper') }}
        </div>
    </div>
    <div  wire:ignore>
    <div class="form-group  {{ $errors->has('abilityMaster.ability_instruction') ? 'invalid' : '' }}">
        <label class="form-label" for="ability_instruction">{{ trans('cruds.abilityMaster.fields.ability_instruction') }}</label>
        <textarea class="form-control" name="ability_instruction" id="ability_instruction" wire:model.defer="abilityMaster.ability_instruction" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('abilityMaster.ability_instruction') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.abilityMaster.fields.ability_instruction_helper') }}
        </div>
    </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.ability-masters.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
<script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script>
    document.addEventListener('livewire:load', function () {

        const editorAbilityInstruction = CKEDITOR.replace('ability_instruction');
        editorAbilityInstruction.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('ability_instruction', event.editor.getData());
        });
    });
</script>
