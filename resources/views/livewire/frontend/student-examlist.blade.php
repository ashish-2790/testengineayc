<div>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>--}}
@if(!empty($get_exam_list))
    <div class="py-12">
        <div class="container">
            <div class="row">
                <h3 class="text-center display-6 mb-6 text-underline">Student Test Selection: See What's Available</h3>

                @foreach($get_exam_list as $exam)

                    <div class="col-md-4 mt-5">
                        <div class="card mb-5">
                            <img src="https://iqwing.s3.ap-south-1.amazonaws.com/cms/results/2024-03/1710390689101.png" class="rounded-top-3" alt="">
                            <div class=" ribbon ribbon-hot"><span> </span></div>
                            <div class="card-footer">
                                <h4 href="" class="cs-product-title text-center h4">{{$exam->relatedQuestionPaper->question_paper_name??''}}</h4>
                                <ul class="cs-card-actions unsttyled mt-2 d-flex flex-wrap justify-content-between list-group-numbered ps-0">
                                    <li >
                                        <a href="#" class="font-bold text-dark"><i class="fa-brands fa-teamspeak me-2"></i>Marks :
                                            {{$exam->maximum_score}}</a>
                                    </li>


                                    <li class="float-right">
                                        @php
                                        $timeString = $exam->valid_to;
                                            $dateTime = new DateTime($timeString);
                                            $formattedTime = $dateTime->format('d F Y h:i A');
                                            @endphp
                                        <a href="#" class="font-bold text-dark"><i class="fa-regular fa-clock me-2"></i>Valid Till - {{$formattedTime??''}}</a>
                                    </li>
                                </ul>
                                <div class="text-center mt-2">

                                    <a href="#" class="mb-3 btn btn-lg p-2 bg-danger btn-radius text-white" data-bs-toggle="modal" data-bs-target="#disclaimertext" data-bs-whatever="@mdo">Instructions</a>

                                    @if($exam->test_taken == true)
                                        @if($exam->stage == 2)
                                        <a href="{{ route('testscreen',"tid=".$exam->id) }}" class="mb-3 btn btn-lg p-2 bg-primary btn-radius text-white">Continue Exam</a>
                                            @elseif($exam->stage == 3 && $exam->report == null)
                                         <a href="" class="mb-3 btn btn-lg p-2 bg-primary btn-radius text-white">Exam Already Submitted</a>
                                        @elseif($exam->stage == 3 && $exam->report == 1)
                                        <a  href="{{ route('admin.student-report',"examid=".$exam->report_id) }}" class="mb-3 btn btn-lg p-2 bg-success btn-radius text-white">View Report</a>
                                        @endif
                                    @else
                                    <a href="{{ route('testscreen',"tid=".$exam->id) }}" class="mb-3 btn btn-lg p-2 bg-danger btn-radius text-white">Start Exam</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Instuction Modal -->


                    <div class="modal fade" id="disclaimertext" tabindex="-1" aria-labelledby="exampleModalLabels" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5" id="exampleModalLabel">Instructions</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Display Exam Instructions Here -->
                                    <div class="m-1">
                                        {!! $exam->instruction??"" !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>




    @else
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger text-center">
                    No Exam Found
                </div>
            </div>
        </div>
    </div>
        @endif

</div>
