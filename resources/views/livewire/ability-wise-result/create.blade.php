
<form wire:submit.prevent="submit" class="pt-3">
    <div class="row m-0 g-5  flex">

    <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('abilityWiseResult.student_test_taken_id') ? 'invalid' : '' }}">
        <label class="form-label" for="student_test_taken">{{ trans('cruds.abilityWiseResult.fields.student_test_taken') }}</label>
        <x-select-list class="form-control" id="student_test_taken" name="student_test_taken" :options="$this->listsForFields['student_test_taken']" wire:model="abilityWiseResult.student_test_taken_id" />
        <div class="validation-message">
            {{ $errors->first('abilityWiseResult.student_test_taken_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.abilityWiseResult.fields.student_test_taken_helper') }}
        </div>
    </div>
    <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('abilityWiseResult.overall_result_id') ? 'invalid' : '' }}">
        <label class="form-label" for="overall_result">{{ trans('cruds.abilityWiseResult.fields.overall_result') }}</label>
        <x-select-list class="form-control" id="overall_result" name="overall_result" :options="$this->listsForFields['overall_result']" wire:model="abilityWiseResult.overall_result_id" />
        <div class="validation-message">
            {{ $errors->first('abilityWiseResult.overall_result_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.abilityWiseResult.fields.overall_result_helper') }}
        </div>
    </div>
    <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('abilityWiseResult.ability_id') ? 'invalid' : '' }}">
        <label class="form-label" for="ability">{{ trans('cruds.abilityWiseResult.fields.ability') }}</label>
        <x-select-list class="form-control" id="ability" name="ability" :options="$this->listsForFields['ability']" wire:model="abilityWiseResult.ability_id" />
        <div class="validation-message">
            {{ $errors->first('abilityWiseResult.ability_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.abilityWiseResult.fields.ability_helper') }}
        </div>
    </div>
    </div>
    <div class="row m-0 g-5  flex">
    <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('abilityWiseResult.ability_raw_score') ? 'invalid' : '' }}">
        <label class="form-label" for="ability_raw_score">{{ trans('cruds.abilityWiseResult.fields.ability_raw_score') }}</label>
        <input class="form-control" type="text" name="ability_raw_score" id="ability_raw_score" wire:model.defer="abilityWiseResult.ability_raw_score">
        <div class="validation-message">
            {{ $errors->first('abilityWiseResult.ability_raw_score') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.abilityWiseResult.fields.ability_raw_score_helper') }}
        </div>
    </div>
    <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('abilityWiseResult.ability_sten_score') ? 'invalid' : '' }}">
        <label class="form-label" for="ability_sten_score">{{ trans('cruds.abilityWiseResult.fields.ability_sten_score') }}</label>
        <input class="form-control" type="text" name="ability_sten_score" id="ability_sten_score" wire:model.defer="abilityWiseResult.ability_sten_score">
        <div class="validation-message">
            {{ $errors->first('abilityWiseResult.ability_sten_score') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.abilityWiseResult.fields.ability_sten_score_helper') }}
        </div>
    </div>
    </div>
    <div class="form-group {{ $errors->has('abilityWiseResult.short_description') ? 'invalid' : '' }}">
        <label class="form-label" for="short_description">{{ trans('cruds.abilityWiseResult.fields.short_description') }}</label>
        <input class="form-control" type="text" name="short_description" id="short_description" wire:model.defer="abilityWiseResult.short_description">
        <div class="validation-message">
            {{ $errors->first('abilityWiseResult.short_description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.abilityWiseResult.fields.short_description_helper') }}
        </div>
    </div>
    <div wire:ignore>
    <div class="form-group {{ $errors->has('abilityWiseResult.report_1') ? 'invalid' : '' }}">
        <label class="form-label" for="report_1">{{ trans('cruds.abilityWiseResult.fields.report_1') }}</label>
        <textarea class="form-control" name="report_1" id="report_1" wire:model.defer="abilityWiseResult.report_1" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('abilityWiseResult.report_1') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.abilityWiseResult.fields.report_1_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('abilityWiseResult.report_2') ? 'invalid' : '' }}">
        <label class="form-label" for="report_2">{{ trans('cruds.abilityWiseResult.fields.report_2') }}</label>
        <textarea class="form-control" name="report_2" id="report_2" wire:model.defer="abilityWiseResult.report_2" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('abilityWiseResult.report_2') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.abilityWiseResult.fields.report_2_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('abilityWiseResult.report_3') ? 'invalid' : '' }}">
        <label class="form-label" for="report_3">{{ trans('cruds.abilityWiseResult.fields.report_3') }}</label>
        <textarea class="form-control" name="report_3" id="report_3" wire:model.defer="abilityWiseResult.report_3" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('abilityWiseResult.report_3') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.abilityWiseResult.fields.report_3_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('abilityWiseResult.report_4') ? 'invalid' : '' }}">
        <label class="form-label" for="report_4">{{ trans('cruds.abilityWiseResult.fields.report_4') }}</label>
        <textarea class="form-control" name="report_4" id="report_4" wire:model.defer="abilityWiseResult.report_4" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('abilityWiseResult.report_4') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.abilityWiseResult.fields.report_4_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('abilityWiseResult.report_5') ? 'invalid' : '' }}">
        <label class="form-label" for="report_5">{{ trans('cruds.abilityWiseResult.fields.report_5') }}</label>
        <textarea class="form-control" name="report_5" id="report_5" wire:model.defer="abilityWiseResult.report_5" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('abilityWiseResult.report_5') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.abilityWiseResult.fields.report_5_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('abilityWiseResult.report_6') ? 'invalid' : '' }}">
        <label class="form-label" for="report_6">{{ trans('cruds.abilityWiseResult.fields.report_6') }}</label>
        <textarea class="form-control" name="report_6" id="report_6" wire:model.defer="abilityWiseResult.report_6" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('abilityWiseResult.report_6') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.abilityWiseResult.fields.report_6_helper') }}
        </div>
    </div>
    </div>
    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.ability-wise-results.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
<script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script>
    document.addEventListener('livewire:load', function () {

        const editorReport1 = CKEDITOR.replace('report_1');
        editorReport1.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('report_1', event.editor.getData());
        });

        const editorReport2 = CKEDITOR.replace('report_2');
        editorReport2.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('report_2', event.editor.getData());
        });
        const editorReport3 = CKEDITOR.replace('report_3');
        editorReport3.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('report_3', event.editor.getData());
        });

        const editorReport4 = CKEDITOR.replace('report_4');
        editorReport4.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('report_4', event.editor.getData());
        });

        const editorReport5 = CKEDITOR.replace('report_5');
        editorReport5.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('report_5', event.editor.getData());
        });

        const editorReport6 = CKEDITOR.replace('report_6');
        editorReport6.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('report_6', event.editor.getData());
        });

    });
</script>