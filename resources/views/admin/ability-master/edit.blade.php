@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.abilityMaster.title_singular') }}:
                    {{ trans('cruds.abilityMaster.fields.id') }}
                    {{ $abilityMaster->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('ability-master.edit', [$abilityMaster])
        </div>
    </div>
</div>
@endsection