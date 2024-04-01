<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\QuestionBank;
use App\Models\QuestionPaper;
use App\Models\CreateTest;
use App\Models\StudentTestTaken;
use App\Models\StudentTestAnswer;
use App\Models\StenChart;
use App\Models\OverallResultReport;
use Illuminate\Support\Facades\Session;
use App\Models\AbilityMaster;
use App\Models\AbilityWiseResult;
use App\Models\ReportTemplate;
use App\Models\OverallReportTemplate;
use App\Models\User;
use Carbon\carbon;
use App\Models\StudentProfile;

use Auth;

class Testscreen extends Component
{
    public $questions = [];
    public $timer;
    public $question_bank = [];
    public $user_id;
    public $question_paper = [];
    public $question_text;
    public $answer;
    public $get_ability_example_question;
    public $get_ability_instruction;
    public $question_paper_id;
    public $student_test_takenid;
    public $duration;
    public $timeLeft;
    public $check_student_test_taken;
    public $get_test_detail;

    public $allQuestionsList;



    public function mount()
    {
        $this->user_id = Auth::user()->id;

        $test_id = $_GET['tid'] ?? '';


        if (!empty($test_id)) {

            $this->get_test_detail = CreateTest::where('id', $test_id)->first();

            $this->duration = $this->get_test_detail->udf_1 * 60;

            $current_time = date('Y-m-d H:i:s');

            $this->question_paper_id = $this->get_test_detail->related_question_paper_id;

            $this->question_paper = QuestionPaper::with(['relatedTest', 'relatedAbility'])->where('id', $this->question_paper_id)->first();

            //First Ability Data Fetch

            $get_first_ability = $this->question_paper->relatedAbility->first();

            $this->get_ability_instruction = $get_first_ability->ability_instruction;

            $this->get_ability_example_question = QuestionBank::where('related_question_paper_id', $this->question_paper_id)
                ->where('related_ability_id', $get_first_ability->id)
                ->where('example_question', 1)
                ->get();


            $this->check_student_test_taken = StudentTestTaken::where('related_student_id', $this->user_id)
                ->where('related_create_test_id', $test_id)
                ->first();


            if ($this->check_student_test_taken) {

                if ($this->check_student_test_taken->stage == 2) {

                    $this->student_test_takenid = $this->check_student_test_taken->id;

                    $this->timeLeft = $this->check_student_test_taken->udf_1;

                }

            } else {
                $update_student_test_taken = StudentTestTaken::Create(
                    ['related_class_name_id' => $this->get_test_detail->related_class_id,
                        'related_student_id' => $this->user_id,
                        'related_create_test_id' => $this->get_test_detail->id,
                        'started_at' => $current_time,
                        'stage' => 2,
                        'udf_1' => $this->duration,
                    ]);
                $this->student_test_takenid = $update_student_test_taken->id;

                $this->timeLeft = $update_student_test_taken->udf_1;

                $question_bank_studentans = QuestionBank::where('related_question_paper_id', $this->question_paper_id)
                    ->where('example_question', 0)
                    ->orderBy('related_ability_id', 'asc')
                    ->orderByRaw('CAST(order_no AS UNSIGNED) ASC')
                    ->get();


                $serial_no = 0;

                foreach ($question_bank_studentans as $key => $value) {
                    $serial_no++;
                    $entery_studentanswer = StudentTestAnswer::Create([
                        'related_student_id' => $this->user_id,
                        'related_student_test_taken_id' => $this->student_test_takenid,
                        'related_question_bank_id' => $value->id,
                        'create_test_id' => $test_id,
                        'answer_status' => '1',
                        'udf_1' => $serial_no,
                        'udf_2' => $value->related_ability_id,
                    ]);

                }

            }

            $this->question_bank = getQuestionList($get_first_ability->id, $this->student_test_takenid);

            $this->allQuestionsList = getAllQuestionList($this->student_test_takenid);
           // dd($this->allQuestionsList);

            $this->question_text =  $this->question_bank->first();

            $this->answer = $this->question_text?->answer_choice;

        }

        // Fetch timer from the database or any other source
        $this->timer = 1800; // Assume the timer is set to 60 seconds for this example
        //dd($this->timeLeft);

    }


    public function decrementTimeLeft()
    {
        $this->timeLeft--; // Decrement time left by 1 second
        if ($this->timeLeft <= 0) {
            $this->timeLeft = 0; // Ensure time left doesn't go negative
        }

        $store_time_left = StudentTestTaken::where('id', $this->student_test_takenid)
            ->where('related_student_id', $this->user_id)
            ->update(['udf_1' => $this->timeLeft]);
    }

    public function updateTimer($timeleftNow)
    {

        $store_time_left = StudentTestTaken::where('id', $this->student_test_takenid)
            ->where('related_student_id', $this->user_id)
            ->update(['udf_1' => $timeleftNow]);
    }

    public function showAbilitycontent($ability_id)
    {

        $this->get_ability_example_question = QuestionBank::where('related_question_paper_id', $this->question_paper_id)
            ->where('example_question', 1)
            ->where('related_ability_id', $ability_id)
            ->get();

        $this->get_ability_instruction = AbilityMaster::where('id', $ability_id)->first()->ability_instruction;

        $this->question_bank = getQuestionList($ability_id, $this->student_test_takenid);

        $this->question_text =  $this->question_bank->first();

        $this->answer = $this->question_text?->answer_choice;

    }


    public function showSpecificquestion($question_id)
    {
        $this->question_text = StudentTestAnswer::with('relatedQuestionBank')
            ->where('related_student_id', $this->user_id)
            ->where('related_question_bank_id', $question_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->first();
        $this->answer = $this->question_text?->answer_choice;

    }

    public function markAnswer($question_id)
    {
        // Check if $this->answer is empty

        if (empty($this->answer) || $this->answer == null) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Answer is required."
            ]);
            return;
        }

        $student_test_answer = StudentTestAnswer::where('related_student_id', $this->user_id)
            ->where('related_question_bank_id', $question_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->first();

        $student_test_answer->answer_choice = $this->answer;
        $student_test_answer->answer_status = 3;
        $student_test_answer->save();

        $get_correct_response = QuestionBank::where('id', $question_id)->first()->right_choice;
        $get_score_for_question = QuestionBank::where('id', $question_id)->first()->score_right;
        $get_negative_score_for_question = QuestionBank::where('id', $question_id)->first()->score_wrong;
        $next_serial_no = $student_test_answer->udf_1 + 1;

        if ($this->answer == $get_correct_response) {
            $student_test_answer->score = $get_score_for_question;
            $student_test_answer->save();
        } else {
            $student_test_answer->score = $get_negative_score_for_question;
            $student_test_answer->save();
        }

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Submitted Successfully"
        ]);

        // Fetch the next question
        $this->question_text = StudentTestAnswer::with('relatedQuestionBank')
            ->where('related_student_id', $this->user_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->where('udf_1',$next_serial_no)
            ->first();

    }


    public function clearResponse($question_id)
    {
        $student_test_answer = StudentTestAnswer::where('related_student_id', $this->user_id)
            ->where('related_question_bank_id', $question_id)
            ->first();

        $student_test_answer->answer_choice = '';
        $student_test_answer->answer_status = 1;
        $student_test_answer->save();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Cleared Successfully"
        ]);

        $this->question_text = StudentTestAnswer::with('relatedQuestionBank')
            ->where('related_student_id', $this->user_id)
            ->where('related_question_bank_id', $question_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->first();
        $this->answer = $this->question_text?->answer_choice;

    }

    public function saveAnswerMarked($question_id)
    {

        // Check if $this->answer is empty
        if (($this->answer==null) || empty($this->answer)) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Answer is required."
            ]);
            return;
        }

        $student_test_answer = StudentTestAnswer::where('related_student_id', $this->user_id)
            ->where('related_question_bank_id', $question_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->first();

        $student_test_answer->answer_choice = $this->answer;
        $student_test_answer->answer_status = 4;
        $student_test_answer->save();

        $get_correct_response = QuestionBank::where('id', $question_id)->first()->right_choice;
        $get_score_for_question = QuestionBank::where('id', $question_id)->first()->score_right;
        $get_negative_score_for_question = QuestionBank::where('id', $question_id)->first()->score_wrong;
        $get_order_no = QuestionBank::where('id', $question_id)->first()->order_no; // Get the order number of the question
        $get_ability_id = QuestionBank::where('id', $question_id)->first()->related_ability_id; // Get the ability id of the question
        if ($this->answer == $get_correct_response) {
            $student_test_answer->score = $get_score_for_question;
            $student_test_answer->save();
        } else {
            $student_test_answer->score = $get_negative_score_for_question;
            $student_test_answer->save();
        }

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Saved and Marked For Review Successfully "
        ]);

        //fetch the next question
        $this->question_text = StudentTestAnswer::with('relatedQuestionBank')
            ->where('related_student_id', $this->user_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->whereHas('relatedQuestionBank', function ($query) use ($get_order_no,$get_ability_id) {
                $query->where('order_no', '>', $get_order_no)
                ->where('related_ability_id', $get_ability_id);
            })
            ->first();

    }

    public function markForreview($question_id)
    {
        $student_test_answer = StudentTestAnswer::where('related_student_id', $this->user_id)
            ->where('related_question_bank_id', $question_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->first();

        $student_test_answer->answer_status = 2;
        $student_test_answer->save();
        $get_order_no = QuestionBank::where('id', $question_id)->first()->order_no; // Get the order number of the question
        $get_ability_id = QuestionBank::where('id', $question_id)->first()->related_ability_id; // Get the ability id of the question

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Marked Successfully"
        ]);

        //fetch the next question
        $this->question_text = StudentTestAnswer::with('relatedQuestionBank')
            ->where('related_student_id', $this->user_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->whereHas('relatedQuestionBank', function ($query) use ($get_order_no,$get_ability_id) {
                $query->where('order_no', '>', $get_order_no)
                ->where('related_ability_id', $get_ability_id);
            })
            ->first();

    }


    public function submitTestfinal()
    {
        $get_user_class = User::where('id', $this->user_id)->first()->related_class_name_id;

         $this->check_student_test_taken->stage = 3;
         $this->check_student_test_taken->ended_at = Carbon::now();
         $this->check_student_test_taken->save();

        $total_raw_score = StudentTestAnswer::where('related_student_id', $this->user_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->sum('score');

        $overall_result = OverallResultReport::updateorCreate([
            'student_test_taken_id' => $this->student_test_takenid,
            'overall_raw_score' => intval($total_raw_score),
        ]);

       // dd($overall_result);

        foreach($this->question_paper->relatedAbility as $abilityq)
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
                'short_description' => $ability_stenscore_remark->short_review??'',
                'report_1' => $ability_stenscore_remark->report_1??'',
                'report_2'  => $ability_stenscore_remark->report_2??'',
                'report_3' => $ability_stenscore_remark->report_3??'',
                'report_4' => $ability_stenscore_remark->report_4??'',
                'report_5' => $ability_stenscore_remark->report_5??'',
                'report_6'  => $ability_stenscore_remark->report_6??'',
            ]);

        }


        $total_ability_sten_score = AbilityWiseResult::where('student_test_taken_id', $this->student_test_takenid)
            ->sum('ability_sten_score');

        $overall_report_remark = OverallReportTemplate::with(['class'])
            ->where('test_type_id', $this->get_test_detail->related_test_type_id)
            ->where('overall_stenscore_from', '<=', intval($total_ability_sten_score))
            ->where('overall_stenscore_to', '>=', intval($total_ability_sten_score))
            ->whereHas('class', function ($query) use ($get_user_class) {
                $query->where('id', $get_user_class);
            })
            ->first();

        $upadate_overall_result = OverallResultReport::where('student_test_taken_id', $this->student_test_takenid)
            ->update([
                'overall_sten_score' => $total_ability_sten_score,
                'short_description' => $overall_report_remark->short_review??'',
                'report_1' => $overall_report_remark->detailed_report_1??'',
                'report_2' => $overall_report_remark->detailed_report_2??'',
                'report_3' => $overall_report_remark->detailed_report_3??'',
                'report_4' => $overall_report_remark->detailed_report_4??'',
                'report_5' => $overall_report_remark->detailed_report_5??'',
                'report_6' => $overall_report_remark->detailed_report_6??'',
            ]);


        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Exam Submitted Successfully"
        ]);

        return redirect()->route('exam-list');
    }

    public function render()
    {
        return view('livewire.frontend.testscreen');
    }
}
