<div x-data="setup()">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card shadow-0 bg-gray-100 my-5 h-full">
                    <div class="card-header position-relative">
                        @foreach($question_paper->relatedAbility as $ab)
                            <button wire:click="showAbilitycontent({{$ab->id}})" @click="resetComp()"
                                    class="btn bg-blue-300 text-white">{{ $ab->ability_name }}</button>
                        @endforeach
                    </div>

                    <div x-show="!instructionComplete" class="p-5 text-lg-center">
                        <div class=" justify-content-between mb-5">
                            <h4>Instructions:</h4>
                            <h6 class="pt-3 mb-5">{!! $get_ability_instruction !!}</h6>
                            <button class="btn btn-primary " @click="instructionComplete = true">Show Sample
                            </button>
                        </div>

                    </div>

                    <div x-show="instructionComplete && !showQuestion" class="p-5">


                        <div class="d-flex justify-content-between">
                            <h4>Sample Question:</h4>
                        </div>
                        @foreach($get_ability_example_question as $question_texts)
                            <h4 class="mb-2">
                                {!! $question_texts->question_text??"" !!}
                            </h4>
                            <div class="form-check">
                                @foreach($question_texts->question_image as $key => $image)
                                    <img src="{{ $image }}" alt="">
                                @endforeach
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="{{ $question_texts->choice_1??''}}"
                                       wire:model.defer='answer' name="answer" id="answer">
                                <label class="form-check-label mt-1" for="flexRadioDefault1">
                                    {{ $question_texts->choice_1??''}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value=" {{ $question_texts->choice_2??''}}"
                                       wire:model.defer='answer' name="answer" id="answer">
                                <label class="form-check-label mt-1" for="flexRadioDefault2">
                                    {{ $question_texts->choice_2??''}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value=" {{ $question_texts->choice_3??''}}"
                                       wire:model.defer='answer' name="answer" id="answer">
                                <label class="form-check-label mt-1" for="flexRadioDefault3">
                                    {{ $question_texts->choice_3??''}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value=" {{ $question_texts->choice_4??''}}"
                                       wire:model.defer='answer' name="answer" id="answer">
                                <label class="form-check-label mt-1" for="flexRadioDefault4">
                                    {{ $question_texts->choice_4??""}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value=" {{ $question_texts->choice_5??''}}"
                                       wire:model.defer='answer' name="answer" id="answer">
                                <label class="form-check-label mt-1" for="flexRadioDefault4">
                                    {{ $question_texts->choice_5??''}}
                                </label>
                            </div>
                        @endforeach
                        <button class="btn btn-primary mt-5" @click="showQuestion = true">Start Test</button>

                    </div>


                    <div x-show="instructionComplete && showQuestion" class="p-5">

                        @if($question_text)
                            <div class="card-body p-2 pb-20">


                                <div class="d-flex justify-content-between">
                                    <h4>Question:</h4>
                                    <h6 class="text-end"></h6>
                                </div>
                                <hr class="mt-1 mb-6">
                                <h4 class="mb-2">
                                    {!! $question_text->relatedQuestionBank->question_text??"" !!}
                                </h4>
                                <div class="form-check w-2/3">
                                    @foreach($question_text->relatedQuestionBank->question_image as $key => $entry)
                                        <img src="{{ $entry['url'] }}" class="img-fluid card-img">
                                    @endforeach
                                </div>
                                @php
                                    $answer = $question_text->answer_choice; // Assuming $answer holds the value of the selected answer
                                   // $correctAnswer = $question_text->relatedQuestionBank->right_choice; // Assuming 'correct_choice' is the column storing the correct answer in your database
                                @endphp
                                <div class="form-check">
                                    <input class="form-check-input" required type="radio"
                                           value="{{ $question_text->relatedQuestionBank->choice_1 ?? '' }}"
                                           wire:model.defer="answer" name="answer" id="answer1"
                                           @if($answer == $question_text->relatedQuestionBank->choice_1) checked @endif>
                                    <label class="form-check-label mt-1" for="answer1">
                                        {{ $question_text->relatedQuestionBank->choice_1 ?? '' }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" required type="radio"
                                           value="{{ $question_text->relatedQuestionBank->choice_2 ?? '' }}"
                                           wire:model.defer="answer" name="answer" id="answer2"
                                           @if($answer == $question_text->relatedQuestionBank->choice_2) checked @endif>
                                    <label class="form-check-label mt-1" for="answer2">
                                        {{ $question_text->relatedQuestionBank->choice_2 ?? '' }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" required type="radio"
                                           value="{{ $question_text->relatedQuestionBank->choice_3 ?? '' }}"
                                           wire:model.defer="answer" name="answer" id="answer3"
                                           @if($answer == $question_text->relatedQuestionBank->choice_3) checked @endif>
                                    <label class="form-check-label mt-1" for="answer3">
                                        {{ $question_text->relatedQuestionBank->choice_3 ?? '' }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" required type="radio"
                                           value="{{ $question_text->relatedQuestionBank->choice_4 ?? '' }}"
                                           wire:model.defer="answer" name="answer" id="answer4"
                                           @if($answer == $question_text->relatedQuestionBank->choice_4) checked @endif>
                                    <label class="form-check-label mt-1" for="answer4">
                                        {{ $question_text->relatedQuestionBank->choice_4 ?? '' }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" required type="radio"
                                           value="{{ $question_text->relatedQuestionBank->choice_5 ?? '' }}"
                                           wire:model.defer="answer" name="answer" id="answer5"
                                           @if($answer == $question_text->relatedQuestionBank->choice_5) checked @endif>
                                    <label class="form-check-label mt-1" for="answer5">
                                        {{ $question_text->relatedQuestionBank->choice_5 ?? '' }}
                                    </label>
                                </div>

                            </div>
                            <div class="card-footer mt-5 p-2">

                                <button class="btn btn-sm p-2 bg-blue-100 button next  ps-5 pe-5 mb-1 mt-1" id="markbtn"
                                        type="button"
                                        wire:click="markForreview({{$question_text->relatedQuestionBank->id}})">
                                    Mark For Review &amp; Next
                                </button>

                                <button class="btn btn-sm p-2 bg-blue-100 button clear-answer  ps-5 pe-5 mb-1 mt-1"
                                        type="button"
                                        wire:click="clearResponse({{$question_text->relatedQuestionBank->id}})">
                                    Clear Response
                                </button>

                                <button class="btn btn-sm p-2 bg-blue-100 button  finish  ps-5 pe-5 mb-1 mt-1"
                                        type="submit"
                                        wire:click="saveAnswerMarked({{$question_text->relatedQuestionBank->id}})">
                                    Save & Mark For Review
                                </button>
                                    <button class="btn btn-sm p-2 btn-danger button float-end finish  ps-5 pe-5 mb-1 mt-1"
                                            type="submit"
                                            wire:click="markAnswer({{$question_text->relatedQuestionBank->id}})">
                                        Save & Next
                                    </button>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-0 bg-gray-100 my-5 h-full">
                    <div class="panel-body">
                        <div class="sub-heading d-flex">
                            <!--                        <div>-->
                            <!--                            <img src="https://iqwing.s3.ap-south-1.amazonaws.com/cms/results/2024-03/1710303513424.jpg" class="img-fluid h-18">-->
                            <!--                        </div>-->
                            <!-- <h3 class="mt-6 mb-4">Chemistry Basics </h3> -->


                            <div x-data="{
                                        timer: null,
                                        showModal: false
                                    }" x-init="
                                        timer = setInterval(() => { $wire.decrementTimeLeft() }, 1000);
                                        setTimeout(() => { showModal = true }, {{ $duration }} * 1000);
                                        $watch('showModal', value => { if (value) clearInterval(timer) })
                                    ">
                                <div>
                                    <p>Time Left: {{ gmdate("H:i:s", $timeLeft) }}</p>
                                </div>
                            </div>

{{--                            </div>--}}

{{--                            <div x-data="{--}}
{{--                                    timeleft: this.timeleft,--}}
{{--                                    timer: null--}}
{{--                                }" x-init="startTimer(timeleft)">--}}
{{--                                <p>Time Left: <span x-text="timeleft"></span> seconds</p>--}}
{{--                            </div>--}}

{{--                            <div x-data="{ timeLeft: {{ $timeLeft }}, timer: null }" x-init="startTimer(timeLeft)">--}}

{{--                                <p>Time Left: <span x-html="timeLeft"></span> seconds</p>--}}
{{--                            </div>--}}

                        </div>
                        <div class="bg-blue-100 p-0 pt-1">
                            <div class="panel-heading">
                                <h4 class="ms-4">Legend</h4>
                            </div>

                            <div class="row">

                                <div class="col-12 my-0 py-0 d-flex">

                                    <div class="col-6 h-12  my-0 py-0 position-relative">
                                        <div class="p-3 d-flex align-items-center">
                                            <div class="me-1">
                                                <div class="rounded-10 icon icon-shape h-8 w-8 p-4 bg-danger text-sm text-white">
                                                    0
                                                </div>
                                            </div>
                                            <div class="flex-fill">
                                                <span class="d-block text-xs">Pending</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 h-12 my-0 py-0 position-relative">
                                        <div class="p-3 d-flex align-items-center">
                                            <div class="me-1">
                                                <div class="bg-primary rounded-bottom-circle icon icon-shape h-8 w-8 p-4  text-sm text-white">
                                                    0
                                                </div>
                                            </div>
                                            <div class="flex-fill">
                                                <span class="d-block text-xs">Answered & Marked for Review</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 my-0 py-0 d-flex">

                                    <div class="col-6  my-0 py-0 position-relative ">
                                        <div class="p-3 d-flex align-items-center">
                                            <div class="me-1">
                                                <div class="bg-success rounded-top-circle icon icon-shape h-8 w-8 p-4  text-sm text-white">
                                                    0
                                                </div>
                                            </div>
                                            <div class="flex-fill">
                                                <span class="d-block text-xs">Answered</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6  my-0 py-0 position-relative">
                                        <div class="p-3 d-flex align-items-center">
                                            <div class="me-1">
                                                <div class="bg-warning icon icon-shape h-8 w-8 p-4  text-sm text-white">
                                                    0
                                                </div>
                                            </div>
                                            <div class="flex-fill">
                                                <span class="d-block text-xs">Not Answered & Marked for Review</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-progress p-0 m-0">
                                @foreach($allQuestionsList->groupBy("relatedAbility.ability_name") as $ability_name => $ability_name_items)

                                <div>
                                <div class="d-block text-xs text-dark ps-2 m-0">{{ $ability_name }}</div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="card-body ps-1 pe-0 pt-0 pb-0 m-0 row align-items-center">
                                    <div class="list-group-item d-flex px-0">
                                        <div class="flex-fill">
                                            <!-- Subtitle -->

                                            <!-- Badges -->
                                            <div class="d-flex-wrap-wrap pb-1">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach($ability_name_items as $question)
                                                <button wire:click="showSpecificquestion({{$question->relatedQuestionBank->id}})"
                                                      class="
                                                        @if($question->answer_status == 3) bg-success rounded-top-circle
                                                        @elseif($question->answer_status == 4) bg-primary rounded-bottom-circle
                                                         @elseif($question->answer_status == 2) bg-warning
                                                        @elseif($question->answer_status == 1) bg-danger rounded-10
                                                        @endif
                                                        icon icon-shape h-8 w-8 p-2 mb-1 text-sm text-white">{{$i}}</button>
                                                @php
                                                    $i++;
                                                @endphp
                                                @endforeach
                                                </div>
                                        </div>

                                    </div>
                                </div>
                                </div>
                                @endforeach
                            </div>

                            <h5 class="ms-5">You are viewing ER section Question Palette:</h5>
                            <ul class="question-palette ps-3" id="pallete_list" style="height: 200px; overflow: auto;">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($question_bank as $question)

                                    <li>
                                    <button wire:click="showSpecificquestion({{$question->relatedQuestionBank->id}})"
                                            class="btn btn-sm
                                            @if($question->answer_status == 3) bg-success rounded-top-circle
                                            @elseif($question->answer_status == 4) bg-primary rounded-bottom-circle
                                             @elseif($question->answer_status == 2) bg-warning rounded-10
                                            @elseif($question->answer_status == 1) bg-danger rounded-10
                                            @endif">
                                        <span>{{$i}}</span>
                                    </button>
                                    </li>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach

                            </ul>
                            <div class="card-footer flex-wrap d-flex justify-content-between bg-blue-100 pt-1 pb-1">

                                <button class="bg-blue-300 btn mb-2 p-2 pe-1 ps-1 w-md-32 text-white"
                                        wire:click="submitTestfinal()">Final Submit
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


<script>
    function setup() {
        return {
            instructionComplete: false, // Track if instruction section is completed
            showQuestion: false, // Track if question section should be shown
            timeLeft: '', // Track time left for the test

            init() {
                var self = this;

                console.log('Received question data:', this.question_text);

                Livewire.on('questiondata', function (data) {
                    self.questionbank = data.map(question => ({
                        question,
                        isOpen: false // Add a property to track if the question is open
                    }));
                });

            },


            // Function to reset the UI for showing ability content
            resetComp() {

                this.instructionComplete = false; // Reset instruction section
                this.showQuestion = false; // Reset question section

            }


        };
    }

    document.addEventListener('DOMContentLoaded', function () {
        setup().init();
    });
</script>
<script>
    function confirmSubmission() {
        if (confirm("Are you sure you want to submit the test?")) {
            Livewire.emit('submitTestfinal'); // Emit Livewire event to handle final submission
        }
    }
</script>
<script>
    function validateAnswer() {
        var radioButtons = document.getElementsByName('answer');
        var atLeastOneChecked = false;
        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked) {
                atLeastOneChecked = true;
                break;
            }
        }
        if (!atLeastOneChecked) {
            alert('Please select an option before submitting.');
            return false;
        }
        return true;
    }
</script>

<script>
    function startTimer(duration) {

        const app = this;
        app.timeLeft = duration;
        app.timeLeft = 1000;

        app.timer = setInterval(function () {
            app.timeLeft--;

            // Send time left value to Livewire function every 50 seconds
            if (app.timeLeft % 50 === 0) {
                Livewire.emit('updateTimeLeft', app.timeLeft);
            }

            if (app.timeLeft <= 0) {
                clearInterval(app.timer);
                // Handle the end of the timer here
            }
        }, 1000);
    }

    Livewire.on('updateTimer', (timeLeft) => {
        // Update the timer on the user's screen
        app.timeLeft = timeLeft;
    });
</script>
