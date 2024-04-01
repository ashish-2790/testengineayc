@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.classMaster.title_singular') }}:
                    {{ trans('cruds.classMaster.fields.id') }}
                    {{ $classMaster->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.classMaster.fields.id') }}
                            </th>
                            <td>
                                {{ $classMaster->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.classMaster.fields.class_name') }}
                            </th>
                            <td>
                                {{ $classMaster->class_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.classMaster.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $classMaster->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('class_master_edit')
                    <a href="{{ route('admin.class-masters.edit', $classMaster) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.class-masters.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection