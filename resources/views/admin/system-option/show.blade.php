@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.systemOption.title_singular') }}:
                    {{ trans('cruds.systemOption.fields.id') }}
                    {{ $systemOption->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.systemOption.fields.id') }}
                            </th>
                            <td>
                                {{ $systemOption->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.systemOption.fields.option_name') }}
                            </th>
                            <td>
                                {{ $systemOption->option_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.systemOption.fields.option_value') }}
                            </th>
                            <td>
                                {{ $systemOption->option_value }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.systemOption.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $systemOption->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('system_option_edit')
                    <a href="{{ route('admin.system-options.edit', $systemOption) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.system-options.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection