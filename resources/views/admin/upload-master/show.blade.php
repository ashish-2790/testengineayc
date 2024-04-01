@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.uploadMaster.title_singular') }}:
                    {{ trans('cruds.uploadMaster.fields.id') }}
                    {{ $uploadMaster->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.uploadMaster.fields.id') }}
                            </th>
                            <td>
                                {{ $uploadMaster->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.uploadMaster.fields.title') }}
                            </th>
                            <td>
                                {{ $uploadMaster->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.uploadMaster.fields.related_doc') }}
                            </th>
                            <td>
                                @foreach($uploadMaster->related_doc as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('upload_master_edit')
                    <a href="{{ route('admin.upload-masters.edit', $uploadMaster) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.upload-masters.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection