@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.questionPaper.title_singular') }}:
                    {{ trans('cruds.questionPaper.fields.id') }}
                    {{ $questionPaper->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.questionPaper.fields.id') }}
                            </th>
                            <td>
                                {{ $questionPaper->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionPaper.fields.related_class') }}
                            </th>
                            <td>
                                @if($questionPaper->relatedClass)
                                    <span class="badge badge-relationship">{{ $questionPaper->relatedClass->class_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionPaper.fields.related_test') }}
                            </th>
                            <td>
                                @if($questionPaper->relatedTest)
                                    <span class="badge badge-relationship">{{ $questionPaper->relatedTest->test_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionPaper.fields.related_ability') }}
                            </th>
                            <td>
                                @foreach($questionPaper->relatedAbility as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->ability_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionPaper.fields.question_paper_name') }}
                            </th>
                            <td>
                                {{ $questionPaper->question_paper_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionPaper.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $questionPaper->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('question_paper_edit')
                    <a href="{{ route('admin.question-papers.edit', $questionPaper) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.question-papers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection