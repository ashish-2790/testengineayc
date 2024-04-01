@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.questionBank.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('question_bank_create')
                    <a class="btn btn-indigo" href="{{ route('admin.question-banks.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.questionBank.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('question-bank.index')

    </div>
</div>
@endsection