@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.systemOption.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('system_option_create')
                    <a class="btn btn-indigo" href="{{ route('admin.system-options.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.systemOption.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('system-option.index')

    </div>
</div>
@endsection