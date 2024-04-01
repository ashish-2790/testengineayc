@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.abilityWiseObservation.title_singular') }}:
                    {{ trans('cruds.abilityWiseObservation.fields.id') }}
                    {{ $abilityWiseObservation->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('ability-wise-observation.edit', [$abilityWiseObservation])
        </div>
    </div>
</div>
@endsection