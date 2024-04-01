@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.questionPaper.title_singular') }}:
                    {{ trans('cruds.questionPaper.fields.id') }}
                    {{ $questionPaper->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('question-paper.edit', [$questionPaper])
        </div>
    </div>
</div>
@endsection