@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.collegeMaster.title_singular') }}:
                    {{ trans('cruds.collegeMaster.fields.id') }}
                    {{ $collegeMaster->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('college-master.edit', [$collegeMaster])
        </div>
    </div>
</div>
@endsection