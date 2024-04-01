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
    public $instructionsShown = [];
    public $sampleQuestionsShown = [];

    public $SampleQuestionDisplay;
    public $lastSampleQuestion;
    public $intial_time_zero;
    public $createTestID;


    public function initializeTest()
    {
        $this->get_test_detail = CreateTest::where('id', $this->createTestID)->first();
        if($this->get_test_detail)
        $this->duration = $this->get_test_detail->udf_1*60;

        $current_time = date('Y-m-d H:i:s');
        $this->question_paper_id = $this->get_test_detail->related_question_paper_id;

        $this->question_paper = QuestionPaper::with(['relatedTest', 'relatedAbility'])->where('id', $this->question_paper_id)->first();

        // Check if Test has been Started by Student or its first time
        $this->check_student_test_taken = StudentTestTaken::where('related_student_id', $this->user_id)
            ->where('related_create_test_id', $this->createTestID)
            ->first();

//dd($this->check_student_test_taken);
        if ($this->check_student_test_taken != null) {
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
                    'create_test_id' => $this->createTestID,
                    'answer_status' => '1',
                    'udf_1' => $serial_no,
                    'udf_2' => $value->related_ability_id,
                ]);

            }

        }
        $this->timeLeft=$this->timeLeft ? $this->timeLeft : '0';
        if( $this->timeLeft == '0')
        {
            $this->intial_time_zero = 1;
        }
    }
    public function mount()
    {
        $this->user_id = Auth::user()->id;

        $test_id = $_GET['tid'] ?? '';
        $this->createTestID=$_GET['tid'] ?? '';
        if (!empty($this->createTestID)) {
            $this->initializeTest();
            $this->allQuestionsList = getAllQuestionList($this->student_test_takenid);
            // Set the Instruction & Sample Question array to False
            foreach($this->allQuestionsList->groupBy("relatedAbility.ability_name") as $ability_name => $ability_name_items)
            {
                $this->instructionsShown[$ability_name_items->first()->udf_2] = false;
                $this->sampleQuestionsShown[$ability_name_items->first()->udf_2] = false;
            }
            $this->question_text =  $this->allQuestionsList->first();
            $this->getAbilityInstruction($this->question_text->udf_2);
            $this->getSampleQuestion($this->question_text->udf_2,$currentSampleQuestionId=NULL);

            $this->answer = $this->question_text?->answer_choice;

        }

    }


    public function updateTimeLeft()
    {
        //dd('reached after 20 seconds');
        // Update the time left in the database
        // You can replace this with your actual logic to update the time in the database
        $this->timeLeft -= 60; // Example: decrease time by 20 seconds every update

        if ($this->timeLeft <= 0) {
            $this->timeLeft = 0;
            if($this->intial_time_zero !=1) {
                $store_time_left = StudentTestTaken::where('id', $this->student_test_takenid)
                    ->where('related_student_id', $this->user_id)
                    ->update(
                        ['udf_1' => $this->timeLeft,
                            'ended_at' => Carbon::now(),
                            'stage' => 3]);

                $this->dispatchBrowserEvent('alert', [
                    'type' => 'success',
                    'message' => "Time Over and Exam Submitted Successfully"
                ]);

                return redirect()->route('exam-list');
            }

        }

        $store_time_left = StudentTestTaken::where('id', $this->student_test_takenid)
            ->where('related_student_id', $this->user_id)
            ->update(['udf_1' => $this->timeLeft]);
    }


    public function showAbilitycontent($abilityId)
    {
        $first_pending_question = StudentTestAnswer::with('relatedQuestionBank')
            ->where('related_student_id', $this->user_id)
            ->where('udf_2',$abilityId)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->where('answer_status','1') // Pending Question
            ->orderByRaw('CAST(udf_1 AS UNSIGNED) ASC')
            ->first();
        $this->showSpecificquestion($first_pending_question->related_question_bank_id);

    }

    public function showSpecificquestion($question_id)
    {
        $this->question_text = StudentTestAnswer::with('relatedQuestionBank')
            ->where('related_student_id', $this->user_id)
            ->where('related_question_bank_id', $question_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->first();
        $this->answer = $this->question_text?->answer_choice;
        $this->getAbilityInstruction($this->question_text->udf_2);
        $this->updatelastSampleQuestion($this->question_text->udf_2);
        $this->getSampleQuestion($this->question_text->udf_2,$currentSampleQuestionId=NULL);


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
        if($this->get_test_detail->related_test_type_id == 2)
        {
            $get_correct_response = QuestionBank::where('id', $question_id)
            ->first();

        }
        else {
            $get_correct_response = QuestionBank::where('id', $question_id)->first()->right_choice;
            $get_score_for_question = QuestionBank::where('id', $question_id)->first()->score_right;
            $get_negative_score_for_question = QuestionBank::where('id', $question_id)->first()->score_wrong;
        }


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

        $this->answer = '';

        // Fetch the next question
        $this->question_text = StudentTestAnswer::with('relatedQuestionBank')
            ->where('related_student_id', $this->user_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->where('udf_1',$next_serial_no)
            ->first();
        if ($this->question_text == null) {
            $this->question_text = StudentTestAnswer::with('relatedQuestionBank')
                ->where('related_student_id', $this->user_id)
                ->where('related_student_test_taken_id', $this->student_test_takenid)
                ->where('udf_1',1)
                ->first();
        }

    }

    public function clearResponse($question_id)
    {
        $student_test_answer = StudentTestAnswer::where('related_student_id', $this->user_id)
            ->where('related_question_bank_id', $question_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->first();

        $student_test_answer->answer_choice = '';
        $student_test_answer->score = 0;
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
        $this->answer = '';



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
        $next_serial_no = $student_test_answer->udf_1 + 1;
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

        $this->answer = '';

        // Fetch the next question
        $this->question_text = StudentTestAnswer::with('relatedQuestionBank')
            ->where('related_student_id', $this->user_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->where('udf_1',$next_serial_no)
            ->first();
        if ($this->question_text == null) {
            $this->question_text = StudentTestAnswer::with('relatedQuestionBank')
                ->where('related_student_id', $this->user_id)
                ->where('related_student_test_taken_id', $this->student_test_takenid)
                ->where('udf_1',1)
                ->first();
        }

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
        $next_serial_no = $student_test_answer->udf_1 + 1;
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Marked Successfully"
        ]);

        // Fetch the next question
        $this->question_text = StudentTestAnswer::with('relatedQuestionBank')
            ->where('related_student_id', $this->user_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->where('udf_1',$next_serial_no)
            ->first();
        if ($this->question_text == null) {
            $this->question_text = StudentTestAnswer::with('relatedQuestionBank')
                ->where('related_student_id', $this->user_id)
                ->where('related_student_test_taken_id', $this->student_test_takenid)
                ->where('udf_1',1)
                ->first();
        }

    }

    public function submitTestfinal()
    {
        $check_if_all_questions_answered = StudentTestAnswer::where('related_student_id', $this->user_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->where('answer_status', 1)
            ->count();
        if ($check_if_all_questions_answered > 0) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Please answer all questions before submitting the exam."
            ]);
            return;
        }

        $this->check_student_test_taken = StudentTestTaken::where('id', $this->student_test_takenid)
            ->first();
         $this->check_student_test_taken->stage = 3;
         $this->check_student_test_taken->ended_at = Carbon::now();
         $this->check_student_test_taken->save();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Exam Submitted Successfully"
        ]);

        return redirect()->route('exam-list');
    }

    public function render()
    {
        $this->allQuestionsList = getAllQuestionList($this->student_test_takenid);
        return view('livewire.frontend.testscreen');
    }

    public function getAbilityInstruction($abilityId)
    {

        $this->question_paper = QuestionPaper::with(['relatedTest', 'relatedAbility' => function ($query) use ($abilityId) {
            $query->where('id', $abilityId)->first();
        }])
            ->where('id', $this->question_paper_id)
            ->whereHas('relatedAbility', function($query) use ($abilityId) {
                $query->where('id', $abilityId);
            })
            ->first();
        $this->instructionContent=$this->question_paper->relatedAbility[0]->ability_instruction;
    }

    public function instructionsOver($abilityId)
    {
        $this->instructionsShown[$abilityId] = true;
        $this->updatelastSampleQuestion($abilityId);
        $this->getSampleQuestion($abilityId,$currentSampleQuestionId=NULL); // Get first Sample Question of Current Ability
    }

    public function instructionsReplay($abilityId)
    {

        $this->instructionsShown[$abilityId] = false;
        $this->sampleQuestionsShown[$abilityId] = true;

        $first_pending_question = StudentTestAnswer::with('relatedQuestionBank')
            ->where('related_student_id', $this->user_id)
            ->where('udf_2',$abilityId)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->where('answer_status','1') // Pending Question
            ->orderByRaw('CAST(udf_1 AS UNSIGNED) ASC')
            ->first();
        $this->showSpecificquestion($first_pending_question->related_question_bank_id);

      //  dd($abilityId);
    }

    public function sampleQuestionsOver($abilityId)
    {
        $this->instructionsShown[$abilityId] = true;
        $this->sampleQuestionsShown[$abilityId] = true;
    }
    public function updatelastSampleQuestion($abilityId)
    {
        $this->lastSampleQuestion=  QuestionBank::where('related_question_paper_id', $this->question_paper_id)
            ->where('example_question', 1)
            ->where('related_ability_id', $abilityId)
            ->OrderBy('id','DESC')
            ->first();

    }
    public function getSampleQuestion($abilityId,$currentSampleQuestionId)
    {
        if($currentSampleQuestionId)
        {
            $this->SampleQuestionDisplay = QuestionBank::where('related_question_paper_id', $this->question_paper_id)
                ->where('example_question', 1)
                ->where('id','>',$currentSampleQuestionId)
                ->where('related_ability_id', $abilityId)
                ->OrderBy('id')
                ->first();

        }
        else
        {
            $this->SampleQuestionDisplay = QuestionBank::where('related_question_paper_id', $this->question_paper_id)
                ->where('example_question', 1)
                ->where('related_ability_id', $abilityId)
                ->OrderBy('id')
                ->first();
        }
    }
    public function nextStep($abilityId,$currentSampleQuestionId)
    {
        $this->getSampleQuestion($abilityId,$currentSampleQuestionId);
    }

}
