@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.classMaster.title_singular') }}:
                    {{ trans('cruds.classMaster.fields.id') }}
                    {{ $classMaster->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('class-master.edit', [$classMaster])
        </div>
    </div>
</div>
@endsection