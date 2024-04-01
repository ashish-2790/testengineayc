@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.questionBank.title_singular') }}:
                    {{ trans('cruds.questionBank.fields.id') }}
                    {{ $questionBank->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.id') }}
                            </th>
                            <td>
                                {{ $questionBank->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.related_class_name') }}
                            </th>
                            <td>
                                @if($questionBank->relatedClassName)
                                    <span class="badge badge-relationship">{{ $questionBank->relatedClassName->class_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.related_test_type') }}
                            </th>
                            <td>
                                @if($questionBank->relatedTestType)
                                    <span class="badge badge-relationship">{{ $questionBank->relatedTestType->test_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.related_ability') }}
                            </th>
                            <td>
                                @if($questionBank->relatedAbility)
                                    <span class="badge badge-relationship">{{ $questionBank->relatedAbility->ability_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.related_question_paper') }}
                            </th>
                            <td>
                                @if($questionBank->relatedQuestionPaper)
                                    <span class="badge badge-relationship">{{ $questionBank->relatedQuestionPaper->question_paper_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.question_text') }}
                            </th>
                            <td>
                                {{ $questionBank->question_text }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.question_url') }}
                            </th>
                            <td>
                                {{ $questionBank->question_url }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.choice_1') }}
                            </th>
                            <td>
                                {{ $questionBank->choice_1 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.choice_2') }}
                            </th>
                            <td>
                                {{ $questionBank->choice_2 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.choice_3') }}
                            </th>
                            <td>
                                {{ $questionBank->choice_3 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.choice_4') }}
                            </th>
                            <td>
                                {{ $questionBank->choice_4 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.choice_5') }}
                            </th>
                            <td>
                                {{ $questionBank->choice_5 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.choice_6') }}
                            </th>
                            <td>
                                {{ $questionBank->choice_6 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.right_choice') }}
                            </th>
                            <td>
                                {{ $questionBank->right_choice }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.score_right') }}
                            </th>
                            <td>
                                {{ $questionBank->score_right }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.score_wrong') }}
                            </th>
                            <td>
                                {{ $questionBank->score_wrong }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.order_no') }}
                            </th>
                            <td>
                                {{ $questionBank->order_no }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.question_image') }}
                            </th>
                            <td>
                                @foreach($questionBank->question_image as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.choice_1_image') }}
                            </th>
                            <td>
                                @foreach($questionBank->choice_1_image as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.choice_2_image') }}
                            </th>
                            <td>
                                @foreach($questionBank->choice_2_image as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.choice_3_image') }}
                            </th>
                            <td>
                                @foreach($questionBank->choice_3_image as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.choice_4_image') }}
                            </th>
                            <td>
                                @foreach($questionBank->choice_4_image as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.choice_5_image') }}
                            </th>
                            <td>
                                @foreach($questionBank->choice_5_image as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.choice_6_image') }}
                            </th>
                            <td>
                                @foreach($questionBank->choice_6_image as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.right_choice_image') }}
                            </th>
                            <td>
                                @foreach($questionBank->right_choice_image as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.example_question') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $questionBank->example_question ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionBank.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $questionBank->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('question_bank_edit')
                    <a href="{{ route('admin.question-banks.edit', $questionBank) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.question-banks.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection