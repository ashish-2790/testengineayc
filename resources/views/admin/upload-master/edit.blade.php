@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.uploadMaster.title_singular') }}:
                    {{ trans('cruds.uploadMaster.fields.id') }}
                    {{ $uploadMaster->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('upload-master.edit', [$uploadMaster])
        </div>
    </div>
</div>
@endsection