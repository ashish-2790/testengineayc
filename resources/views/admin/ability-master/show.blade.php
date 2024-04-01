@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.abilityMaster.title_singular') }}:
                    {{ trans('cruds.abilityMaster.fields.id') }}
                    {{ $abilityMaster->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.abilityMaster.fields.id') }}
                            </th>
                            <td>
                                {{ $abilityMaster->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityMaster.fields.related_class_name') }}
                            </th>
                            <td>
                                @if($abilityMaster->relatedClassName)
                                    <span class="badge badge-relationship">{{ $abilityMaster->relatedClassName->class_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityMaster.fields.related_test') }}
                            </th>
                            <td>
                                @if($abilityMaster->relatedTest)
                                    <span class="badge badge-relationship">{{ $abilityMaster->relatedTest->test_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityMaster.fields.ability_name') }}
                            </th>
                            <td>
                                {{ $abilityMaster->ability_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityMaster.fields.ability_instruction') }}
                            </th>
                            <td>
                                {{ $abilityMaster->ability_instruction }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('ability_master_edit')
                    <a href="{{ route('admin.ability-masters.edit', $abilityMaster) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.ability-masters.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection