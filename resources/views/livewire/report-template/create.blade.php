<form wire:submit.prevent="submit" class="pt-3">
    <div class="row m-0 g-5  flex">
        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('reportTemplate.related_class_name_id') ? 'invalid' : '' }}">
            <label class="form-label" for="related_class_name">{{ trans('cruds.reportTemplate.fields.related_class_name') }}</label>
            <x-select-list class="form-control" id="related_class_name" name="related_class_name" :options="$this->listsForFields['related_class_name']" wire:model="reportTemplate.related_class_name_id" />
            <div class="validation-message">
                {{ $errors->first('reportTemplate.related_class_name_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.reportTemplate.fields.related_class_name_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('reportTemplate.related_test_name_id') ? 'invalid' : '' }}">
        <label class="form-label" for="related_test_name">{{ trans('cruds.reportTemplate.fields.related_test_name') }}</label>
        <x-select-list class="form-control" id="related_test_name" name="related_test_name" :options="$this->listsForFields['related_test_name']" wire:model="reportTemplate.related_test_name_id" />
        <div class="validation-message">
            {{ $errors->first('reportTemplate.related_test_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.reportTemplate.fields.related_test_name_helper') }}
        </div>
    </div>
    </div>
    <div class="row m-0 g-5  flex">
        <div class="form-group w-full lg:w-6/12 px-4 pt-4 {{ $errors->has('reportTemplate.related_ability_name_id') ? 'invalid' : '' }}">
            <label class="form-label" for="related_ability_name">{{ trans('cruds.reportTemplate.fields.related_ability_name') }}</label>
            <x-select-list class="form-control" id="related_ability_name" name="related_ability_name" :options="$this->listsForFields['related_ability_name']" wire:model="reportTemplate.related_ability_name_id" />
            <div class="validation-message">
                {{ $errors->first('reportTemplate.related_ability_name_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.reportTemplate.fields.related_ability_name_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('reportTemplate.test_sten_score_from') ? 'invalid' : '' }}">
            <label class="form-label" for="test_sten_score_from">{{ trans('cruds.reportTemplate.fields.test_sten_score_from') }}</label>
            <input class="form-control" type="text" name="test_sten_score_from" id="test_sten_score_from" wire:model.defer="reportTemplate.test_sten_score_from">
            <div class="validation-message">
                {{ $errors->first('reportTemplate.test_sten_score_from') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.reportTemplate.fields.test_sten_score_from_helper') }}
            </div>
        </div>
        <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('reportTemplate.test_sten_score_to') ? 'invalid' : '' }}">
        <label class="form-label" for="test_sten_score_to">{{ trans('cruds.reportTemplate.fields.test_sten_score_to') }}</label>
        <input class="form-control" type="text" name="test_sten_score_to" id="test_sten_score_to" wire:model.defer="reportTemplate.test_sten_score_to">
        <div class="validation-message">
            {{ $errors->first('reportTemplate.test_sten_score_to') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.reportTemplate.fields.test_sten_score_to_helper') }}
        </div>
    </div>
    </div>

    <div class="form-group {{ $errors->has('reportTemplate.short_review') ? 'invalid' : '' }}">
        <label class="form-label" for="short_review">{{ trans('cruds.reportTemplate.fields.short_review') }}</label>
        <input class="form-control" type="text" name="short_review" id="short_review" wire:model.defer="reportTemplate.short_review">
        <div class="validation-message">
            {{ $errors->first('reportTemplate.short_review') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.reportTemplate.fields.short_review_helper') }}
        </div>
    </div>

    <div wire:ignore>
        <div class="form-group {{ $errors->has('reportTemplate.report_1') ? 'invalid' : '' }}">
            <label class="form-label" for="report_1">{{ trans('cruds.reportTemplate.fields.report_1') }}</label>
            <textarea class="form-control" name="report_1" id="report_1" wire:model.defer="reportTemplate.report_1" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('reportTemplate.report_1') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.reportTemplate.fields.report_1_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('reportTemplate.report_2') ? 'invalid' : '' }}">
            <label class="form-label" for="report_2">{{ trans('cruds.reportTemplate.fields.report_2') }}</label>
            <textarea class="form-control" name="report_2" id="report_2" wire:model.defer="reportTemplate.report_2" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('reportTemplate.report_2') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.reportTemplate.fields.report_2_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('reportTemplate.report_3') ? 'invalid' : '' }}">
            <label class="form-label" for="report_3">{{ trans('cruds.reportTemplate.fields.report_3') }}</label>
            <textarea class="form-control" name="report_3" id="report_3" wire:model.defer="reportTemplate.report_3" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('reportTemplate.report_3') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.reportTemplate.fields.report_3_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('reportTemplate.report_4') ? 'invalid' : '' }}">
            <label class="form-label" for="report_4">{{ trans('cruds.reportTemplate.fields.report_4') }}</label>
            <textarea class="form-control" name="report_4" id="report_4" wire:model.defer="reportTemplate.report_4" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('reportTemplate.report_4') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.reportTemplate.fields.report_4_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('reportTemplate.report_5') ? 'invalid' : '' }}">
            <label class="form-label" for="report_5">{{ trans('cruds.reportTemplate.fields.report_5') }}</label>
            <textarea class="form-control" name="report_5" id="report_5" wire:model.defer="reportTemplate.report_5" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('reportTemplate.report_5') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.reportTemplate.fields.report_5_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('reportTemplate.report_6') ? 'invalid' : '' }}">
        <label class="form-label" for="report_6">{{ trans('cruds.reportTemplate.fields.report_6') }}</label>
        <input class="form-control" type="text" name="report_6" id="report_6" wire:model.defer="reportTemplate.report_6">
        <div class="validation-message">
            {{ $errors->first('reportTemplate.report_6') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.reportTemplate.fields.report_6_helper') }}
        </div>
    </div>
    </div>
    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.report-templates.index') }}" class="btn btn-secondary">
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