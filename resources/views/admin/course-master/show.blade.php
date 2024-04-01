@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.courseMaster.title_singular') }}:
                    {{ trans('cruds.courseMaster.fields.id') }}
                    {{ $courseMaster->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.courseMaster.fields.id') }}
                            </th>
                            <td>
                                {{ $courseMaster->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseMaster.fields.stream') }}
                            </th>
                            <td>
                                @if($courseMaster->stream)
                                    <span class="badge badge-relationship">{{ $courseMaster->stream->stream_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseMaster.fields.course_name') }}
                            </th>
                            <td>
                                {{ $courseMaster->course_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseMaster.fields.course_description') }}
                            </th>
                            <td>
                                {{ $courseMaster->course_description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseMaster.fields.related_college') }}
                            </th>
                            <td>
                                @foreach($courseMaster->relatedCollege as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->college_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseMaster.fields.image_url') }}
                            </th>
                            <td>
                                {{ $courseMaster->image_url }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseMaster.fields.related_image') }}
                            </th>
                            <td>
                                @foreach($courseMaster->related_image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseMaster.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $courseMaster->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('course_master_edit')
                    <a href="{{ route('admin.course-masters.edit', $courseMaster) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.course-masters.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection