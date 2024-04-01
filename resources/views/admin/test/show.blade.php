@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.test.title_singular') }}:
                    {{ trans('cruds.test.fields.id') }}
                    {{ $test->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.test.fields.id') }}
                            </th>
                            <td>
                                {{ $test->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.test.fields.class_name') }}
                            </th>
                            <td>
                                @foreach($test->className as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->class_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.test.fields.test_name') }}
                            </th>
                            <td>
                                {{ $test->test_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.test.fields.order') }}
                            </th>
                            <td>
                                {{ $test->order }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.test.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $test->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('test_edit')
                    <a href="{{ route('admin.tests.edit', $test) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.tests.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection