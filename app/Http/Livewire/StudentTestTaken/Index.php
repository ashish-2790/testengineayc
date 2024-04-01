<?php

namespace App\Http\Livewire\StudentTestTaken;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\AbilityWiseResult;
use App\Models\OverallReportTemplate;
use App\Models\OverallResultReport;
use App\Models\ReportTemplate;
use App\Models\School;
use App\Models\StenChart;
use App\Models\StudentTestAnswer;
use App\Models\StudentTestTaken;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\carbon;
use Auth;


class Index extends Component
{
    use WithPagination, WithSorting, WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $listsForFields = [];

    public array $paginationOptions;

    protected $studentlist;

    public $related_school_name;

    public $student_test_takenid;

    public $user_id;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new StudentTestTaken())->orderable;

        $this->initListsForFields();

        if(auth()->user()->is_admin == 1) {
            $query = StudentTestTaken::with(['relatedClassName', 'relatedStudent', 'relatedCreateTest'])
                ->advancedFilter([
                    's'               => $this->search ?: null,
                    'order_column'    => $this->sortBy,
                    'order_direction' => $this->sortDirection,
                ]);
        } elseif(auth()->user()->is_school == 1){
            $related_school_id = Auth::user()->related_school_name_id;
            $query = StudentTestTaken::with(['relatedClassName', 'relatedStudent', 'relatedCreateTest'])
                ->whereHas('relatedStudent', function($q) use ($related_school_id) {
                    $q->where('related_school_name_id', $related_school_id);
                })
                ->advancedFilter([
                    's'               => $this->search ?: null,
                    'order_column'    => $this->sortBy,
                    'order_direction' => $this->sortDirection,
                ]);
        }


        $this->studentlist = $query->paginate($this->perPage);
    }

    public function render()
    {
        $studentTestTakens = $this->studentlist;

        return view('livewire.student-test-taken.index', compact('studentTestTakens'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('student_test_taken_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        StudentTestTaken::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(StudentTestTaken $studentTestTaken)
    {
        abort_if(Gate::denies('student_test_taken_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentTestTaken->delete();
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['related_school_name'] = School::pluck('name', 'id')->toArray();
    }

    public function updatedRelatedSchoolName($value)
    {
        $query = StudentTestTaken::with(['relatedClassName', 'relatedStudent', 'relatedCreateTest'])
                                ->whereHas('relatedStudent', function($q) use ($value) {
                                    $q->where('related_school_name_id', $value);
                                })
                                    ->advancedFilter([
                                    's'               => $this->search ?: null,
                                    'order_column'    => $this->sortBy,
                                    'order_direction' => $this->sortDirection,
                                ]);
        $this->studentlist = $query->paginate($this->perPage);

    }

    public function generateReport($test_taken_id)
    {
        $this->student_test_takenid = $test_taken_id;
        $student_test_taken = StudentTestTaken::with(['relatedCreateTest', 'relatedCreateTest.relatedQuestionPaper', 'relatedCreateTest.relatedQuestionPaper.relatedAbility'])
            ->where('id', $test_taken_id)
            ->first();

        $this->user_id = $student_test_taken->related_student_id;

        $user_gender = $student_test_taken->relatedStudent->gender;

        $get_user_class = $student_test_taken->related_class_name_id;

        $total_raw_score = StudentTestAnswer::where('related_student_id', $this->user_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->sum('score');


        $overall_result = OverallResultReport::updateorCreate([
            'student_test_taken_id' => $this->student_test_takenid,
            'overall_raw_score' => intval($total_raw_score),
        ]);

        // dd($overall_result);

        foreach($student_test_taken->relatedCreateTest->relatedQuestionPaper->relatedAbility as $abilityq)
        {
            $ability_id = $abilityq->id;

            $ability_total_score = StudentTestAnswer::with(['relatedQuestionBank'])->where('related_student_id', $this->user_id)
                ->where('related_student_test_taken_id', $this->student_test_takenid)
                ->whereHas('relatedQuestionBank', function ($query) use ($ability_id) {
                    $query->where('related_ability_id', $ability_id);
                })
                ->sum('score');

            $get_ability_sten_score = StenChart::where('related_ability_name_id', $ability_id)
                ->where('related_class_id', $get_user_class)
                ->where('score_raw_from', '<=', intval($ability_total_score))
                ->where('score_raw_to', '>=',  intval($ability_total_score))
                ->where('udf_1',$user_gender)
                ->first();

            if($get_ability_sten_score)
                $ability_sten_score = intval($get_ability_sten_score->sten_score);
            else
                $ability_sten_score = 0;

            $ability_stenscore_remark = ReportTemplate::where('related_ability_name_id', $ability_id)
                ->where('test_sten_score_from', '<=', $ability_sten_score)
                ->where('test_sten_score_to', '>=', $ability_sten_score)
                ->first();


            $enter_score_ability_wise = AbilityWiseResult::updateorCreate([
                'student_test_taken_id' => $this->student_test_takenid,
                'overall_result_id' => $overall_result->id,
                'ability_id' => $ability_id,
                'ability_raw_score' => intval($ability_total_score),
                'ability_sten_score' => $ability_sten_score,
                'short_description' => $ability_stenscore_remark->short_review??'Remarks Not Available',
                'report_1' => $ability_stenscore_remark->report_1??'Remarks Not Available',
                'report_2'  => $ability_stenscore_remark->report_2??'Remarks Not Available',
                'report_3' => $ability_stenscore_remark->report_3??'Remarks Not Available',
                'report_4' => $ability_stenscore_remark->report_4??'Remarks Not Available',
                'report_5' => $ability_stenscore_remark->report_5??'Remarks Not Available',
                'report_6'  => $ability_stenscore_remark->report_6??'Remarks Not Available',
            ]);

        }


        $total_ability_sten_score = AbilityWiseResult::where('student_test_taken_id', $this->student_test_takenid)
            ->sum('ability_sten_score');
        $overall_report_remark = OverallReportTemplate::with(['class'])
            ->where('test_type_id', $student_test_taken->relatedCreateTest->related_test_type_id)
            ->where('overall_stenscore_from', '<=', intval($total_ability_sten_score))
            ->where('overall_stenscore_to', '>=', intval($total_ability_sten_score))
            ->whereHas('class', function ($query) use ($get_user_class) {
                $query->where('id', $get_user_class);
            })
            ->first();

        $upadate_overall_result = OverallResultReport::where('student_test_taken_id', $this->student_test_takenid)
            ->update([
                'overall_sten_score' => $total_ability_sten_score,
                'short_description' => $overall_report_remark->short_review??'Remarks Not Available',
                'report_1' => $overall_report_remark->detailed_report_1??'Remarks Not Available',
                'report_2' => $overall_report_remark->detailed_report_2??'Remarks Not Available',
                'report_3' => $overall_report_remark->detailed_report_3??'Remarks Not Available',
                'report_4' => $overall_report_remark->detailed_report_4??'Remarks Not Available',
                'report_5' => $overall_report_remark->detailed_report_5??'Remarks Not Available',
                'report_6' => $overall_report_remark->detailed_report_6??'Remarks Not Available',
            ]);

        if($upadate_overall_result)
        {
        $update_student_test_taken = StudentTestTaken::where('id', $this->student_test_takenid)
            ->update([
                'udf_5' => 1,
            ]);
        }

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Report Generated Successfully"
        ]);

        if($this->related_school_name != null)
        {
            $value = $this->related_school_name;
            $query = StudentTestTaken::with(['relatedClassName', 'relatedStudent', 'relatedCreateTest'])
                ->whereHas('relatedStudent', function($q) use ($value) {
                    $q->where('related_school_name_id', $value);
                })
                ->advancedFilter([
                    's'               => $this->search ?: null,
                    'order_column'    => $this->sortBy,
                    'order_direction' => $this->sortDirection,
                ]);
            $this->studentlist = $query->paginate($this->perPage);
        }
        else{
            $query = StudentTestTaken::with(['relatedClassName', 'relatedStudent', 'relatedCreateTest'])
                ->advancedFilter([
                    's'               => $this->search ?: null,
                    'order_column'    => $this->sortBy,
                    'order_direction' => $this->sortDirection,
                ]);
            $this->studentlist = $query->paginate($this->perPage);
        }

    }

    public function submitExamForce($testtakenid)
    {

        $studentTestTaken = StudentTestTaken::find($testtakenid);
        $studentTestTaken->ended_at = Carbon::now();
        $studentTestTaken->stage = 3;
        $studentTestTaken->save();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Exam Submitted Successfully"
        ]);

        if($this->related_school_name != null)
        {
            $value = $this->related_school_name;
            $query = StudentTestTaken::with(['relatedClassName', 'relatedStudent', 'relatedCreateTest'])
                ->whereHas('relatedStudent', function($q) use ($value) {
                    $q->where('related_school_name_id', $value);
                })
                ->advancedFilter([
                    's'               => $this->search ?: null,
                    'order_column'    => $this->sortBy,
                    'order_direction' => $this->sortDirection,
                ]);
            $this->studentlist = $query->paginate($this->perPage);
        }
        else{
            $query = StudentTestTaken::with(['relatedClassName', 'relatedStudent', 'relatedCreateTest'])
                ->advancedFilter([
                    's'               => $this->search ?: null,
                    'order_column'    => $this->sortBy,
                    'order_direction' => $this->sortDirection,
                ]);
            $this->studentlist = $query->paginate($this->perPage);
        }


    }
}
