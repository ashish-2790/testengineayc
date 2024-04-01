<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\StudentResult;
use App\Models\StudentTestTaken;
use App\Models\CreateTest;
use App\Models\User;
use App\Models\AbilityWiseResult;
use App\Models\ReportTemplate;
use App\Models\OverallResultReport;
use App\Models\SystemOption;

class StudentReport extends Component
{
    public $exam_id;
    public $user_id;
    public $updatedScores = [];
    public $get_ability_remarks = [];
    public $get_test_type;
    public $student_abilitywise_report;
    public $student_details;
    public $student_test_taken;
    public $overall_result;
    public $prefix_image1;
    public $postfix_image1;



    protected $listeners = ['updateScores' => 'updateScores'];


    public function render()
    {
        $this->emit('updateChart', $this->updatedScores);
        return view('livewire.frontend.student-report');
    }

    public function mount()
    {
        $this->exam_id = $_GET['examid'];

        $this->student_test_taken = StudentTestTaken::with(['relatedClassName', 'relatedStudent', 'relatedCreateTest'])->where('id', $this->exam_id)->first();

        $student_id = $this->student_test_taken->related_student_id;

        $this->student_details = User::with(['relatedSchoolName', 'relatedClassName', 'relatedTestType'])->where('id', $student_id)->first();

        $this->overall_result = OverallResultReport::with('studentTestTaken')->where('student_test_taken_id', $this->exam_id)->first();

        $this->student_abilitywise_report = AbilityWiseResult::with(['studentTestTaken', 'ability', 'overallResult'])->where('student_test_taken_id', $this->exam_id)
            ->get();

        foreach ($this->student_abilitywise_report as $ability_report) {

            if ($ability_report) {
                $this->updatedScores[$ability_report->ability->ability_name] = $ability_report->ability_sten_score;
            } else {
                $this->updatedScores[$ability_report->ability->ability_name] = null; // Or any default value you prefer
            }
        }

        $this->prefix_image1 = SystemOption::where('option_name', 'report_prefix_img1')->first();
        $this->postfix_image1 = SystemOption::where('option_name', 'report_postfix_img1')->first();

    }

    public function updateScores()
    {
        $this->emit('updateChart', $this->updatedScores);
    }


}
