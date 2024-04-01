<div x-data="setup()">
    <style>
        /* Style the scrollbar */
        ::-webkit-scrollbar {
            width: 6px; /* Width of the scrollbar */
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1; /* Color of the track */
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888; /* Color of the handle */
            border-radius: 4px; /* Border radius of the handle */
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555; /* Color of the handle on hover */
        }
    </style>
    <div class="container-fluid">
        <div class="row">
{{--            <div class="form-group col-lg-12 text-center p-0 m-0" wire:loading>--}}
{{--                <img src="https://iqdigit.s3.ap-south-1.amazonaws.com/iqdigitdev/banners/2024-03/1709887110667.webp" width="50px" height="5px">--}}
{{--            </div>--}}

            <div class="col-md-9">
                <div class="card shadow-0 bg-gray-100 my-5 h-5/6 ">

                    <div class="p-5">

                        @if($question_text)
                            @if($instructionsShown[$question_text->udf_2] == false && $instructionContent)
                                <div class="card-body p-2 pb-2">
                                     {!! $instructionContent !!}
                                </div>
                                <div class="card-footer h-lg-40 mt-1 p-2">
                                    @if($SampleQuestionDisplay)
                                    <button class="btn btn-sm p-2 btn-danger button float-end finish  ps-5 pe-5 mb-1 mt-1"
                                            type="submit"
                                            wire:click="instructionsOver({{$question_text->udf_2}})">
                                        Show Sample Questions
                                    </button>
                                    @else
                                        <button class="btn btn-sm p-2 btn-danger button float-end finish  ps-5 pe-5 mb-1 mt-1"
                                                type="submit"
                                                wire:click="sampleQuestionsOver({{$question_text->udf_2}})">
                                            Start Test
                                        </button>
                                    @endif
                                </div>
                            @elseif($sampleQuestionsShown[$question_text->udf_2] == false && $SampleQuestionDisplay)
                            <div class="card-body p-2 pb-20">
                                Sample Questions {{$question_text->udf_2}}
                            </div>
                            <div>

                                    <h4 class="mb-2">
                                        {!! $SampleQuestionDisplay->question_text??"" !!}
                                    </h4>
                                    <div class="form-check">
                                        @foreach($SampleQuestionDisplay->question_image as $key => $image)
                                            <img src="{{ $image }}" alt="">
                                        @endforeach
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="{{ $SampleQuestionDisplay->choice_1??''}}"
                                               wire:model.defer='answer' name="answer" id="answer">
                                        <label class="form-check-label mt-1" for="flexRadioDefault1">
                                            {{ $SampleQuestionDisplay->choice_1??''}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value=" {{ $SampleQuestionDisplay->choice_2??''}}"
                                               wire:model.defer='answer' name="answer" id="answer">
                                        <label class="form-check-label mt-1" for="flexRadioDefault2">
                                            {{ $SampleQuestionDisplay->choice_2??''}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value=" {{ $SampleQuestionDisplay->choice_3??''}}"
                                               wire:model.defer='answer' name="answer" id="answer">
                                        <label class="form-check-label mt-1" for="flexRadioDefault3">
                                            {{ $SampleQuestionDisplay->choice_3??''}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value=" {{ $SampleQuestionDisplay->choice_4??''}}"
                                               wire:model.defer='answer' name="answer" id="answer">
                                        <label class="form-check-label mt-1" for="flexRadioDefault4">
                                            {{ $SampleQuestionDisplay->choice_4??""}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value=" {{ $SampleQuestionDisplay->choice_5??''}}"
                                               wire:model.defer='answer' name="answer" id="answer">
                                        <label class="form-check-label mt-1" for="flexRadioDefault4">
                                            {{ $SampleQuestionDisplay->choice_5??''}}
                                        </label>
                                    </div>


                            <!-- Next Button -->
                                <div class="card-footer mt-2 h-lg-40 p-2">
                                    @if($SampleQuestionDisplay->id==$lastSampleQuestion->id)
                                        <button class="btn btn-sm p-2 btn-danger text-white button float-end finish  ps-5 pe-5 mb-1 mt-1" wire:click="sampleQuestionsOver({{$question_text->udf_2}},{{$SampleQuestionDisplay}})">Next & Start Test</button>
                                    @else
                                        <button class="btn btn-sm p-2 btn-success text-white button float-end finish  ps-5 pe-5 mb-1 mt-1" wire:click="nextStep({{$question_text->udf_2}},{{$SampleQuestionDisplay}})">Next</button>
                                    @endif
                                </div>

                            </div>
                            @else
                            <div class="card-body p-2 pb-2">


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
                            <div class="card-footer h-lg-40 mt-2 p-2">

{{--                                <button class="btn btn-sm p-2 bg-warning text-white button next  ps-5 pe-5 mb-1 mt-1" id="markbtn"--}}
{{--                                        type="button"--}}
{{--                                        wire:click="markForreview({{$question_text->relatedQuestionBank->id}})">--}}
{{--                                    Mark For Review &amp; Next--}}
{{--                                </button>--}}

{{--                                <button class="btn btn-sm p-2 bg-primary button  text-white finish  ps-5 pe-5 mb-1 mt-1"--}}
{{--                                        type="submit"--}}
{{--                                        wire:click="saveAnswerMarked({{$question_text->relatedQuestionBank->id}})">--}}
{{--                                    Submit & Mark For Review--}}
{{--                                </button>--}}

                                <button class="btn btn-sm p-2 bg-danger text-white button clear-answer  ps-5 pe-5 mb-1 mt-1"
                                        type="button"
                                        wire:click="clearResponse({{$question_text->relatedQuestionBank->id}})">
                                    Clear Response
                                </button>
                                    <button class="btn btn-sm p-2 btn-success text-white button float-end finish  ps-5 pe-5 mb-1 mt-1"
                                            type="submit"
                                            wire:click="markAnswer({{$question_text->relatedQuestionBank->id}})">
                                        Submit & Next
                                    </button>
                            </div>
                            @endif

                        @endif
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-0 bg-gray-100 my-5  h-5/6">
                    <div class="panel-body">
                        <div class="text-center sub-heading d-flex pt-2 pb-2">

                                <div class="container d-flex justify-content-center align-items-center text-dark font-bold">
                                    @if($intial_time_zero != 1)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                    </svg>

                                    <span class="ps-1">Time Left</span>
                                    <span id="timeLeft" class="ms-2 text-danger">{{ gmdate("H:i:s", $timeLeft) }}</span>
                                        @endif
                                </div>



                        </div>
                        <div class="bg-blue-100 p-0 pt-1">

                            <div class="d-flex align-items-center mb-1 mt-2 px-3">
                                <h5 class="card-title text-heading mb-0">Total Questions </h5>
                                <div class="ms-auto text-end">
                                    <span class="badge bg-primary text-white px-5 py-1  text-sm rounded-pill">{{$allQuestionsList->count()}}</span>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-12 my-0 py-0 d-flex">

                                    <div class="col-6 h-12  my-0 py-0 position-relative">
                                        <div class="p-3 d-flex align-items-center">
                                            <div class="me-1">
                                                <div class="rounded-10 icon icon-shape h-8 w-8 p-4 bg-danger text-sm text-white">
                                                    {{$allQuestionsList->where('answer_status','1')->count()}}
                                                </div>
                                            </div>
                                            <div class="flex-fill">
                                                <span class="d-block text-xs">Pending</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6  my-0 py-0 position-relative ">
                                        <div class="p-3 d-flex align-items-center">
                                            <div class="me-1">
                                                <div class="bg-success rounded-top-circle icon icon-shape h-8 w-8 p-4  text-sm text-white">
                                                    {{$allQuestionsList->where('answer_status','3')->count()}}
                                                </div>
                                            </div>
                                            <div class="flex-fill">
                                                <span class="d-block text-xs">Answered</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
{{--                                <div class="col-12 my-0 py-0 d-flex">--}}

{{--                                    <div class="col-6 h-12 my-0 py-0 position-relative">--}}
{{--                                        <div class="p-3 d-flex align-items-center">--}}
{{--                                            <div class="me-1">--}}
{{--                                                <div class=" bg-warning rounded-bottom-circle icon icon-shape h-8 w-8 p-4  text-sm text-white">--}}
{{--                                                    {{$allQuestionsList->where('answer_status','2')->count()}}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-fill">--}}
{{--                                                <span class="d-block text-xs">Not Answered & Marked for Review</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-6  my-0 py-0 position-relative">--}}
{{--                                        <div class="p-3 d-flex align-items-center">--}}
{{--                                            <div class="me-1">--}}
{{--                                                <div class="bg-primary icon icon-shape h-8 w-8 p-4  text-sm text-white">--}}
{{--                                                    {{$allQuestionsList->where('answer_status','4')->count()}}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-fill">--}}
{{--                                                <span class="d-block text-xs">Answered & Marked for Review</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>

                            <div class="card card-progress p-0 m-0 h-1/2 overflow-auto">
                                @foreach($allQuestionsList->groupBy("relatedAbility.ability_name") as $ability_name => $ability_name_items)
                                <div>
                                    <button class="d-block text-xs bg-transparent text-dark ps-2 m-0" wire:click="instructionsReplay({{$ability_name_items->first()->udf_2}})">{{ $ability_name }}</button>
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
                                                        @php
                                                        if($question_text->relatedQuestionBank->id==$question->related_question_bank_id)
                                                        $bounceeffect='animation-bounce';
                                                        else
                                                        $bounceeffect='';
                                                        @endphp
                                                        <button wire:click="showSpecificquestion({{$question->relatedQuestionBank->id}})"
                                                              class=" {{$bounceeffect}}
                                                                @if($question->answer_status == 3) bg-success rounded-top-circle
                                                                @elseif($question->answer_status == 4) bg-primary rounded-bottom-circle
                                                                 @elseif($question->answer_status == 2) bg-warning
                                                                @elseif($question->answer_status == 1) bg-danger rounded-10
                                                                @endif
                                                                icon icon-shape h-8 w-8 p-2 mb-1 text-sm text-white">{{$i}}
                                                        </button>
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


                            <div class="card-footer flex-wrap d-flex justify-content-center bg-blue-100 pt-1 pb-1">

                                <button class="bg-danger btn mt-2 mb-2 p-2 pe-1 ps-1 w-md-32  text-white"
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

        };
    }

    document.addEventListener('DOMContentLoaded', function () {
        setup().init();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Disable cut, copy, and paste actions
        document.addEventListener('cut', function (e) {
            e.preventDefault();
        });

        document.addEventListener('copy', function (e) {
            e.preventDefault();
        });

        document.addEventListener('paste', function (e) {
            e.preventDefault();
        });

        // Disable right-click context menu
        document.addEventListener('contextmenu', function (e) {
            e.preventDefault();
        });
    });
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
@push('scripts')
    <script>
        // Update the displayed time every second
        setInterval(function() {
            // Get the current time left
            var timeLeft = convertTimeToSeconds(document.getElementById('timeLeft').textContent);
            // Decrease the time by 1 second
            timeLeft--;
            if (timeLeft <= 0) {
             @this.call('updateTimeLeft');
             // come out of setInterval loop
                timeLeft = 0;
                clearInterval();
            }
            // Update the displayed time
            document.getElementById('timeLeft').textContent = convertSecondsToTime(timeLeft);

            // If 20 seconds have elapsed, trigger Livewire to update the database
            if (timeLeft % 60 == 0) {
            @this.call('updateTimeLeft');
            }
        }, 1000); // Update every second

        // Function to convert time in HH:MM:SS format to seconds
        function convertTimeToSeconds(time) {
            var parts = time.split(':');
            var seconds = parseInt(parts[0]) * 3600 + parseInt(parts[1]) * 60 + parseInt(parts[2]);
            return seconds;
        }

        // Function to convert seconds to time in HH:MM:SS format
        function convertSecondsToTime(seconds) {
            var hours = Math.floor(seconds / 3600);
            var minutes = Math.floor((seconds % 3600) / 60);
            var remainingSeconds = seconds % 60;

            // Add leading zeros if needed
            hours = (hours < 10) ? "0" + hours : hours;
            minutes = (minutes < 10) ? "0" + minutes : minutes;
            remainingSeconds = (remainingSeconds < 10) ? "0" + remainingSeconds : remainingSeconds;

            return hours + ":" + minutes + ":" + remainingSeconds;
        }
    </script>
@endpush
