@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.observationTemplate.title_singular') }}:
                    {{ trans('cruds.observationTemplate.fields.id') }}
                    {{ $observationTemplate->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('observation-template.edit', [$observationTemplate])
        </div>
    </div>
</div>
@endsection