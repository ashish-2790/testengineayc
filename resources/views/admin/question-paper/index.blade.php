@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.questionPaper.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('question_paper_create')
                    <a class="btn btn-indigo" href="{{ route('admin.question-papers.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.questionPaper.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('question-paper.index')

    </div>
</div>
@endsection