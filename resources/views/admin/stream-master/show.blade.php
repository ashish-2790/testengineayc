@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.streamMaster.title_singular') }}:
                    {{ trans('cruds.streamMaster.fields.id') }}
                    {{ $streamMaster->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.streamMaster.fields.id') }}
                            </th>
                            <td>
                                {{ $streamMaster->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.streamMaster.fields.group_master') }}
                            </th>
                            <td>
                                @if($streamMaster->groupMaster)
                                    <span class="badge badge-relationship">{{ $streamMaster->groupMaster->stream_group_master ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.streamMaster.fields.stream_name') }}
                            </th>
                            <td>
                                {{ $streamMaster->stream_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.streamMaster.fields.stream_description') }}
                            </th>
                            <td>
                                {{ $streamMaster->stream_description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.streamMaster.fields.icon_url') }}
                            </th>
                            <td>
                                {{ $streamMaster->icon_url }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.streamMaster.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $streamMaster->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('stream_master_edit')
                    <a href="{{ route('admin.stream-masters.edit', $streamMaster) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.stream-masters.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection