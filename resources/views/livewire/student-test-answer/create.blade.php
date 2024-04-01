<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('studentTestAnswer.related_student_id') ? 'invalid' : '' }}">
        <label class="form-label" for="related_student">{{ trans('cruds.studentTestAnswer.fields.related_student') }}</label>
        <x-select-list class="form-control" id="related_student" name="related_student" :options="$this->listsForFields['related_student']" wire:model="studentTestAnswer.related_student_id" />
        <div class="validation-message">
            {{ $errors->first('studentTestAnswer.related_student_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentTestAnswer.fields.related_student_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studentTestAnswer.related_student_test_taken_id') ? 'invalid' : '' }}">
        <label class="form-label" for="related_student_test_taken">{{ trans('cruds.studentTestAnswer.fields.related_student_test_taken') }}</label>
        <x-select-list class="form-control" id="related_student_test_taken" name="related_student_test_taken" :options="$this->listsForFields['related_student_test_taken']" wire:model="studentTestAnswer.related_student_test_taken_id" />
        <div class="validation-message">
            {{ $errors->first('studentTestAnswer.related_student_test_taken_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentTestAnswer.fields.related_student_test_taken_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studentTestAnswer.related_question_bank_id') ? 'invalid' : '' }}">
        <label class="form-label" for="related_question_bank">{{ trans('cruds.studentTestAnswer.fields.related_question_bank') }}</label>
        <x-select-list class="form-control" id="related_question_bank" name="related_question_bank" :options="$this->listsForFields['related_question_bank']" wire:model="studentTestAnswer.related_question_bank_id" />
        <div class="validation-message">
            {{ $errors->first('studentTestAnswer.related_question_bank_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentTestAnswer.fields.related_question_bank_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studentTestAnswer.create_test_id') ? 'invalid' : '' }}">
        <label class="form-label" for="create_test">{{ trans('cruds.studentTestAnswer.fields.create_test') }}</label>
        <x-select-list class="form-control" id="create_test" name="create_test" :options="$this->listsForFields['create_test']" wire:model="studentTestAnswer.create_test_id" />
        <div class="validation-message">
            {{ $errors->first('studentTestAnswer.create_test_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentTestAnswer.fields.create_test_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studentTestAnswer.answer_choice') ? 'invalid' : '' }}">
        <label class="form-label" for="answer_choice">{{ trans('cruds.studentTestAnswer.fields.answer_choice') }}</label>
        <input class="form-control" type="text" name="answer_choice" id="answer_choice" wire:model.defer="studentTestAnswer.answer_choice">
        <div class="validation-message">
            {{ $errors->first('studentTestAnswer.answer_choice') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentTestAnswer.fields.answer_choice_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studentTestAnswer.score') ? 'invalid' : '' }}">
        <label class="form-label" for="score">{{ trans('cruds.studentTestAnswer.fields.score') }}</label>
        <input class="form-control" type="text" name="score" id="score" wire:model.defer="studentTestAnswer.score">
        <div class="validation-message">
            {{ $errors->first('studentTestAnswer.score') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentTestAnswer.fields.score_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studentTestAnswer.answer_status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.studentTestAnswer.fields.answer_status') }}</label>
        <select class="form-control" wire:model="studentTestAnswer.answer_status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['answer_status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('studentTestAnswer.answer_status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentTestAnswer.fields.answer_status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studentTestAnswer.inactive') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="inactive" id="inactive" wire:model.defer="studentTestAnswer.inactive">
        <label class="form-label inline ml-1" for="inactive">{{ trans('cruds.studentTestAnswer.fields.inactive') }}</label>
        <div class="validation-message">
            {{ $errors->first('studentTestAnswer.inactive') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentTestAnswer.fields.inactive_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.student-test-answers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>