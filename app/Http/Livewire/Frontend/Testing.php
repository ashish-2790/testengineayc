<?php

namespace App\Http\Livewire\Frontend;
use Livewire\Component;
use App\Models\QuestionBank;
use App\Models\QuestionPaper;
use App\Models\CreateTest;
use App\Models\StudentTestTaken;
use App\Models\StudentTestAnswer;
use App\Models\StenChart;
use App\Models\StudentResult;
use Illuminate\Support\Facades\Session;
use App\Models\AbilityMaster;
use App\Models\User;
use Carbon\carbon;
use App\Models\StudentProfile;
use Auth;

class Testing extends Component
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



    public function mount()
    {
        $this->user_id = Auth::user()->id;

        $test_id = $_GET['tid'] ?? '';


        if (!empty($test_id)) {

            $get_test_detail = CreateTest::where('id', $test_id)->first();

            $this->duration = $get_test_detail->udf_1 * 60;

            $current_time = date('Y-m-d H:i:s');

            $this->question_paper_id = $get_test_detail->related_question_paper_id;

            $this->question_paper = QuestionPaper::with(['relatedTest', 'relatedAbility'])->where('id', $this->question_paper_id)->first();

            //First Ability Data Fetch

            $get_first_ability = $this->question_paper->relatedAbility->first();

            $this->get_ability_instruction = $get_first_ability->ability_instruction;

            $this->get_ability_example_question = QuestionBank::where('related_question_paper_id', $this->question_paper_id)
                ->where('related_ability_id', $get_first_ability->id)
                ->where('example_question', 1)
                ->get();


            $check_student_test_taken = StudentTestTaken::where('related_student_id', $this->user_id)
                ->where('related_create_test_id', $test_id)
                ->first();


            if ($check_student_test_taken) {

                if ($check_student_test_taken->stage == 3) // 1 for submitted 2 for not submitted 3 for not started
                {

                    $this->dispatchBrowserEvent('alert', [
                        'type' => 'success',
                        'message' => "Already Submitted Successfully"
                    ]);

                    return redirect()->route('home');
                }

                if ($check_student_test_taken->stage == 2) {

                    $this->student_test_takenid = $check_student_test_taken->id;

                    $this->timeLeft = $check_student_test_taken->udf_1;

                }

            } else {
                $update_student_test_taken = StudentTestTaken::Create(
                    ['related_class_name_id' => $get_test_detail->related_class_id,
                        'related_student_id' => $this->user_id,
                        'related_create_test_id' => $get_test_detail->id,
                        'started_at' => $current_time,
                        'stage' => 2,
                        'udf_1' => $this->duration,
                    ]);
                $this->student_test_takenid = $update_student_test_taken->id;

                $this->timeLeft = $check_student_test_taken->udf_1;

                $question_bank_studentans = QuestionBank::where('related_question_paper_id', $this->question_paper_id)
                    ->where('example_question', 0)
                    ->orderBy('order_no', 'asc')
                    ->get();


                foreach ($question_bank_studentans as $key => $value) {
                    $entery_studentanswer = StudentTestAnswer::Create([
                        'related_student_id' => $this->user_id,
                        'related_student_test_taken_id' => $this->student_test_takenid,
                        'related_question_bank_id' => $value->id,
                        'create_test_id' => $test_id,
                        'answer_status' => '1',
                    ]);

                }

            }

            $this->question_bank = getQuestionList($get_first_ability->id, $this->student_test_takenid);


            $this->question_text = StudentTestAnswer::with('relatedQuestionBank')
                ->where('related_student_id', $this->user_id)
                ->where('related_student_test_taken_id', $this->student_test_takenid)
                ->whereHas('relatedQuestionBank', function ($query) use ($get_first_ability) {
                    $query->where('related_ability_id', $get_first_ability->id);
                })
                ->first();

            $this->answer = $this->question_text?->answer_choice;

        }

        // Fetch timer from the database or any other source
        $this->timer = 1800; // Assume the timer is set to 60 seconds for this example
        //dd($this->timeLeft);

    }


//    public function decrementTimeLeft()
//    {
//        $this->timeLeft--; // Decrement time left by 1 second
//        if ($this->timeLeft <= 0) {
//            $this->timeLeft = 0; // Ensure time left doesn't go negative
//        }
//
//        $store_time_left = StudentTestTaken::where('id', $this->student_test_takenid)
//            ->where('related_student_id', $this->user_id)
//            ->update(['udf_1' => $this->timeLeft]);
//    }

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

        $this->question_text = StudentTestAnswer::with('relatedQuestionBank')
            ->where('related_student_id', $this->user_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->whereHas('relatedQuestionBank', function ($query) use ($ability_id) {
                $query->where('related_ability_id', $ability_id);
            })
            ->first();
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
        if (empty($this->answer)) {
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
            ->whereHas('relatedQuestionBank', function ($query) use ($question_id) {
                $query->where('id', '>', $question_id);
            })
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
        if (empty($this->answer)) {
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
            ->whereHas('relatedQuestionBank', function ($query) use ($question_id) {
                $query->where('id', '>', $question_id);
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

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Marked Successfully"
        ]);

        //fetch the next question
        $this->question_text = StudentTestAnswer::with('relatedQuestionBank')
            ->where('related_student_id', $this->user_id)
            ->where('related_student_test_taken_id', $this->student_test_takenid)
            ->whereHas('relatedQuestionBank', function ($query) use ($question_id) {
                $query->where('id', '>', $question_id);
            })
            ->first();

    }


    public function submitTestfinal()
    {

        $student_test_taken = StudentTestTaken::where('id', $this->student_test_takenid)
            ->where('related_student_id', $this->user_id)
            ->first();

        $get_user_class = User::where('id', $this->user_id)->first()->related_class_name_id;

        $student_test_taken->stage = 3;
        $student_test_taken->ended_at = Carbon::now();
        $student_test_taken->save();

        foreach($this->question_paper->relatedAbility as $abilityq)
        {

            $ability_id = $abilityq->id;

            $get_total_score = StudentTestAnswer::with(['relatedQuestionBank'])->where('related_student_id', $this->user_id)
                ->where('related_student_test_taken_id', $this->student_test_takenid)
                ->whereHas('relatedQuestionBank', function ($query) use ($ability_id) {
                    $query->where('related_ability_id', $ability_id);
                })
                ->sum('score');

            $get_ability_sten_score = StenChart::where('related_ability_name_id', $ability_id)
                ->where('related_class_id', $get_user_class)
                ->where('score_raw_from', '<=', $get_total_score)
                ->where('score_raw_to', '>=', $get_total_score)
                ->first();

            if($get_ability_sten_score)
                $ability_sten_score = $get_ability_sten_score->sten_score;
            else
                $ability_sten_score = 0;

            $enter_score = StudentResult::updateorCreate([

                'related_student_name_id' => $this->user_id,
                'related_class_name_id' => $get_user_class,
                'related_test_name_id' => $this->question_paper->related_test_id,
                'related_ability_name_id' => $ability_id,
                'create_test_id' => $student_test_taken->related_create_test_id,
                'result_score_total' => intval($get_total_score),
                'sten_score' => $ability_sten_score,
            ]);


        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Exam Submitted Successfully"
        ]);

        return redirect()->route('exam-list');
    }

    public function render()
    {
        return view('livewire.frontend.testing');
    }
}
