<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

{{--            @can('student_test_taken_delete')--}}
{{--                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>--}}
{{--                    {{ __('Delete Selected') }}--}}
{{--                </button>--}}
{{--            @endcan--}}

{{--            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))--}}
{{--                <livewire:excel-export model="StudentTestTaken" format="csv" />--}}
{{--                <livewire:excel-export model="StudentTestTaken" format="xlsx" />--}}
{{--                <livewire:excel-export model="StudentTestTaken" format="pdf" />--}}
{{--            @endif--}}




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>
@if(Auth::user()->is_admin == 1)
    <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('user.related_school_name_id') ? 'invalid' : '' }}">
        <label class="form-label"
               for="related_school_name">{{ trans('cruds.user.fields.related_school_name') }}</label>
        <x-select-list class="form-control" id="related_school_name" name="related_school_name"
                       :options="$this->listsForFields['related_school_name']"
                       wire:model="related_school_name"/>
        <div class="validation-message">
            {{ $errors->first('user.related_school_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.related_school_name_helper') }}
        </div>
    </div>
@endif
    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.studentTestTaken.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.studentTestTaken.fields.related_class_name') }}
                            @include('components.table.sort', ['field' => 'related_class_name.class_name'])
                        </th>
                        <th>
                            {{ trans('cruds.studentTestTaken.fields.related_student') }}
                            @include('components.table.sort', ['field' => 'related_student.name'])
                        </th>
                        <th>
                            {{ trans('cruds.studentTestTaken.fields.related_create_test') }}
                            @include('components.table.sort', ['field' => 'related_create_test.instruction'])
                        </th>
                        <th>
                            {{ trans('cruds.studentTestTaken.fields.started_at') }}
                            @include('components.table.sort', ['field' => 'started_at'])
                        </th>
                        <th>
                            {{ trans('cruds.studentTestTaken.fields.ended_at') }}
                            @include('components.table.sort', ['field' => 'ended_at'])
                        </th>
                        <th>
                            {{ trans('cruds.studentTestTaken.fields.stage') }}
                            @include('components.table.sort', ['field' => 'stage'])
                        </th>
                        <th>
                            {{'Action Buttons'}}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($studentTestTakens as $studentTestTaken)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $studentTestTaken->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $studentTestTaken->id }}
                            </td>
                            <td>
                                @if($studentTestTaken->relatedClassName)
                                    @if(auth()->user()->is_admin == 1)
                                    <span class="badge badge-relationship">{{ $studentTestTaken->relatedStudent->relatedSchoolName->name.' - ' .$studentTestTaken->relatedClassName->class_name ?? '' }}</span>
                                    @else
                                     <span class="badge badge-relationship">{{ $studentTestTaken->relatedClassName->class_name ?? '' }}</span>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if($studentTestTaken->relatedStudent)
                                    <span class="badge badge-relationship">{{ $studentTestTaken->relatedStudent->name ?? '' }}</span>
                                    <span class="badge badge-relationship">{{ $studentTestTaken->relatedStudent->email ?? '' }}</span>
                                    <span class="badge badge-relationship">{{ $studentTestTaken->relatedStudent->phone_no ?? '' }}</span>

                                @endif
                            </td>
                            <td>
                                @if($studentTestTaken->relatedCreateTest)
                                    <span class="badge badge-relationship">{{ $studentTestTaken->relatedCreateTest->relatedQuestionPaper->question_paper_name ?? '' }}</span>


                                @endif
                            </td>
                            <td>
                                {{ $studentTestTaken->started_at }}
                            </td>
                            <td>
                                {{ $studentTestTaken->ended_at }}
                            </td>
                            <td>
                                {{ $studentTestTaken->stage_label }}
                            </td>
                            @if($studentTestTaken->stage == 3)

                                <td>
                                    @if($studentTestTaken->udf_5 == null  || $studentTestTaken->udf_5 == 0)
                                        @if(auth()->user()->is_admin == 1)
                                    <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="generateReport({{$studentTestTaken->id}})" >
                                        {{'Generate Report'}}
                                    </button>
                                            @else
                                            <button class="btn btn-sm btn-primary mr-2" type="button" wire:click="" >
                                                {{'Report Not Generated'}}
                                            </button>
                                        @endif
                                    @else
                                    <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.student-report',"examid=".$studentTestTaken->id) }}" >
                                        <span class=" text-white">
                                    View Report
                                        </span></a>
                                    @endif
                                </td>
                            @else
                                <td>
                                    @if($studentTestTaken->udf_1 <= 0)
                                    <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="submitExamForce({{$studentTestTaken->id}})" >
                                        {{ 'Submit-Test' }}
                                    </button>
                                    @else
                                        <button class="btn btn-sm btn-primary mr-2" type="button" wire:click="" >
                                            {{ 'Exam In-Progress' }}
                                        </button>
                                    @endif
                                </td>
                            @endif
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $studentTestTaken->inactive ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('student_test_taken_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.student-test-takens.show', $studentTestTaken) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('student_test_taken_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.student-test-takens.edit', $studentTestTaken) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('student_test_taken_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $studentTestTaken->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $studentTestTakens->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush