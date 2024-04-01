@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.studentTestTaken.title_singular') }}:
                    {{ trans('cruds.studentTestTaken.fields.id') }}
                    {{ $studentTestTaken->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('student-test-taken.edit', [$studentTestTaken])
        </div>
    </div>
</div>
@endsection