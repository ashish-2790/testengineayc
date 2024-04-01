@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.professionMaster.title_singular') }}:
                    {{ trans('cruds.professionMaster.fields.id') }}
                    {{ $professionMaster->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.professionMaster.fields.id') }}
                            </th>
                            <td>
                                {{ $professionMaster->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.professionMaster.fields.profession_name') }}
                            </th>
                            <td>
                                {{ $professionMaster->profession_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.professionMaster.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $professionMaster->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('profession_master_edit')
                    <a href="{{ route('admin.profession-masters.edit', $professionMaster) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.profession-masters.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection