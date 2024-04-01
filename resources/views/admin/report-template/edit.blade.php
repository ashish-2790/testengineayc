@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.reportTemplate.title_singular') }}:
                    {{ trans('cruds.reportTemplate.fields.id') }}
                    {{ $reportTemplate->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('report-template.edit', [$reportTemplate])
        </div>
    </div>
</div>
@endsection