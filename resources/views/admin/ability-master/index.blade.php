@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.abilityMaster.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('ability_master_create')
                    <a class="btn btn-indigo" href="{{ route('admin.ability-masters.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.abilityMaster.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('ability-master.index')

    </div>
</div>
@endsection