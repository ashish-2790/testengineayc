@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.systemOption.title_singular') }}:
                    {{ trans('cruds.systemOption.fields.id') }}
                    {{ $systemOption->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('system-option.edit', [$systemOption])
        </div>
    </div>
</div>
@endsection