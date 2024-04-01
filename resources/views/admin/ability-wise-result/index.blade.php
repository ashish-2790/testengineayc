@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.abilityWiseResult.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('ability_wise_result_create')
                    <a class="btn btn-indigo" href="{{ route('admin.ability-wise-results.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.abilityWiseResult.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('ability-wise-result.index')

    </div>
</div>
@endsection