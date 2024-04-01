@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.streamGroup.title_singular') }}:
                    {{ trans('cruds.streamGroup.fields.id') }}
                    {{ $streamGroup->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.streamGroup.fields.id') }}
                            </th>
                            <td>
                                {{ $streamGroup->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.streamGroup.fields.stream_group_master') }}
                            </th>
                            <td>
                                {{ $streamGroup->stream_group_master }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.streamGroup.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $streamGroup->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('stream_group_edit')
                    <a href="{{ route('admin.stream-groups.edit', $streamGroup) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.stream-groups.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection