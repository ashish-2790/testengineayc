<div>
    <div class="container-fluid py-4">

        <div class="row g-6 mb-6">
            @foreach($get_exam_list as $exam_alloted)

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Exam Name</span>
                                    <span class="h3 font-bold mb-0">{{$exam_alloted->relatedCreateTest->relatedQuestionPaper->question_paper_name}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                        <i class="bi bi-credit-card"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 mb-0 text-sm">
                              <span class="badge badge-pill bg-opacity-30 bg-success text-success me-2">
                                <i class="bi bi-arrow-up me-1"></i>
                              </span>

                                @if($exam_alloted->stage == '2')
                                    <span class=" text-white">
                                    InProgress
                                    </span>
                                @elseif($exam_alloted->stage == '3')
                                    <a class="btn btn-sm bg-primary" href="{{ route('admin.student-report',"examid=".$exam_alloted->id) }}" >
                                        <span class=" text-white">
                                    View Report
                                        </span></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
