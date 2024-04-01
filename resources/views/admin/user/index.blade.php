@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.user.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('user_create')
                    @if(Auth::user()->is_admin == 1)
                    <a class="btn btn-indigo" href="{{ route('admin.users.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                    </a>
                        @else
                        <a class="btn btn-indigo" href="{{ route('admin.users.create') }}">
                        {{'Add Student'}}
                    </a>
                    @endif
                @endcan
            </div>
        </div>
        @livewire('user.index')

    </div>
</div>
@endsection