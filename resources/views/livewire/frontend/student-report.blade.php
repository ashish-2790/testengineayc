<div>
    <style>
        @media print {

            .hide-on-print {
                display: none !important; /* Hide elements with this class when printing */
            }

            td {
                border: solid 1px #fab;
                width: 100%; /* Set width to auto for better responsiveness */
                word-wrap: break-word;
            }

            table {
                width: 100%; /* Ensure tables take full width of the page */
                table-layout: auto; /* Allow tables to adjust column width automatically */
            }
            .print-brake {
                page-break-before: always;
            }

            .add-margin-top {
                margin-top: 20px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="container print-brake">

        <div class="row">
            <div>
                <button onclick="window.print()" class="btn btn-primary mb-3 hide-on-print">Print Report</button>
            </div>

            <div class="col-md-12 border print-brake" id="printMe">
                <img src="{{$prefix_image1->option_value}}" alt="logo" class="h-xxl-auto img-fluid">
                <div class="card print-brake">

                    <div class="card-header">
                        <h1 class="text-center mb-3 text-underline"> {{$student_test_taken->relatedCreateTest->relatedTestType->test_name}}</h1>
                    </div>
                    <div class="card-body">
                        <div class="py-4 px-3">
                            <div class="p-6 bg-primary-light rounded-end border-4 border-start border-primary">
                                <div class="row justify-content-center">
                                    <div class="col-lg-5">
                                        <div class="p-6 bg-primary-light rounded-end border-4 border-top border-primary h-100">
                                            <div class="bg-primary-light">
                                                <div class="d-flex mb-2 align-items-center justify-content-between">
                                                    <h3 class="h5 mb-0 fw-bold text-primary-dark text-center">
                                                        Personal Details</h3>
                                                </div>
                                                <div>

                                                    <table class="table">
                                                        <tbody>
                                                        <tr>
                                                            <th>Name</th>
                                                            <td class="text-capitalize">{{$this->student_details->name??''}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Date of Birth</th>
                                                            <td>{{date("d-m-Y", strtotime($this->student_details->date_of_birth??''))}}</td>
                                                        </tr>
                                                        @if($this->student_details->age != null )
                                                            <tr>
                                                                <th>Age</th>
                                                                <td>{{$this->student_details->age??''}}</td>
                                                            </tr>
                                                        @endif
                                                        <tr>
                                                            <th>Gender</th>
                                                            <td>{{$this->student_details->gender==1?'Male':'Female'}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Class</th>
                                                            <td class="text-capitalize">{{$this->student_details->relatedClassName->class_name??''}}</td>
                                                        <tr>
                                                            <th>School</th>
                                                            <td class="text-capitalize">{{$this->student_details->relatedSchoolName->name??''}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Qualification Status</th>
                                                            <td class="text-capitalize">{{$this->student_details->qualification_status??''}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Physical Status</th>
                                                            <td class="text-capitalize">{{$this->student_details->disability_status??''}}</td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="p-6 bg-primary-light rounded-end border-4 border-bottom border-primary">
                                            <div class="bg-primary-light">
                                                <div class="d-flex mb-2 align-items-center justify-content-between">
                                                    <h3 class="h5 mb-0 fw-bold text-primary-dark text-center">
                                                        Qualification Details</h3>
                                                </div>
                                                <div>
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Class</th>
                                                            <th>Aggregate</th>
                                                            <th>Science</th>
                                                            <th>Maths</th>
                                                            <th>English</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if($this->student_details->marks_aggregate_8 != null)
                                                            <tr>
                                                                <th scope="row">8th</th>
                                                                <td>
                                                                    {{$this->student_details->marks_aggregate_8??''}}
                                                                </td>
                                                                <td>
                                                                    {{$this->student_details->marks_science_8??''}}
                                                                </td>
                                                                <td>
                                                                    {{$this->student_details->marks_math_8??''}}
                                                                </td>
                                                                <td>
                                                                    {{$this->student_details->marks_english_8??''}}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if($this->student_details->marks_aggregate_9 != null)
                                                            <tr>
                                                                <th scope="row">9th</th>
                                                                <td>

                                                                    {{$this->student_details->marks_aggregate_9??''}}
                                                                </td>
                                                                <td>
                                                                    {{$this->student_details->marks_science_9??''}}
                                                                </td>
                                                                <td>
                                                                    {{$this->student_details->marks_math_9??''}}
                                                                </td>
                                                                <td>
                                                                    {{$this->student_details->marks_english_9??''}}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if($this->student_details->marks_aggregate_10 != null)
                                                            <tr>
                                                                <th scope="row">10th</th>
                                                                <td>

                                                                    {{$this->student_details->marks_aggregate_10??''}}
                                                                </td>
                                                                <td>
                                                                    {{$this->student_details->marks_science_10??''}}
                                                                </td>
                                                                <td>
                                                                    {{$this->student_details->marks_math_10??''}}
                                                                </td>
                                                                <td>
                                                                    {{$this->student_details->marks_english_10??''}}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if($this->student_details->marks_aggregate_11 != null)
                                                            <tr>
                                                                <th scope="row">11th</th>
                                                                <td>

                                                                    {{$this->student_details->marks_aggregate_11??''}}
                                                                </td>
                                                                <td>
                                                                    {{$this->student_details->marks_science_11??''}}
                                                                </td>
                                                                <td>
                                                                    {{$this->student_details->marks_math_11??''}}
                                                                </td>
                                                                <td>
                                                                    {{$this->student_details->marks_english_11??''}}
                                                                </td>
                                                            </tr>
                                                        @endif

                                                        </tbody>
                                                    </table>
                                                    <div class="mt-5">
                                                        <p>Aspired Career 1: {{$this->student_details->aspired_career_1??''}} </p>
                                                        <p>Aspired Career 2: {{$this->student_details->aspired_career_2??''}} </p>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="justify-content-evenly row print-brake add-margin-top">
                            <h4 class="text-center mb-3 text-underline">Your Test Report : Graphical Representation</h4>
                            <div class="w-xxl-screen-md h-96 mt-5">
                                <canvas id="examChart" width="200" height="200"></canvas>
                            </div>
                        </div>

                        <div class="table-responsive mt-5">
                            <h4 class="text-center text-underline mb-5">Your Test Report : Tabular Representation</h4>

                            <table class="table table-bordered mt-5">
                                <thead>
                                <tr>
                                    <th>Section</th>
                                    <th>Sten Score</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($updatedScores as $section => $score)
                                    <tr>
                                        <td>{{ $section }}</td>
                                        <td>{{ $score }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <hr>
                        @foreach ($student_abilitywise_report as $ability_report)
                            <section class="py-4 px-3 print-brake">
                                <div class="container-fluid p-6 bg-primary-light rounded-end border-4 border-end border-primary">
                                    <div class="ps-md-12 bg-primary-light rounded">
                                        <div class="row">
                                            <div class="col-12 col-md-12 py-2 mb-1 mb-md-0">
                                                <b> Your Test Report : {{$ability_report->ability->ability_name??''}}</b>
                                                <ul>
                                                    <li>{{ $ability_report->short_description??'' }}</li>
                                                </ul>
                                                <b>Sten Score: </b> {{ $ability_report->ability_sten_score ??''}}
                                                <div class="justify-content-evenly row ">
                                                <div class="w-xxl-screen-md h-96 ">
                                                    <!-- Canvas for individual ability chart -->
                                                    <canvas id="{{$ability_report->ability->ability_name??''}}"
                                                            class="ability-chart"
                                                            width="200" height="200"></canvas>
                                                </div>
                                                </div>
                                                <section class="py-4 px-3">
                                                    <div class="container-fluid">
                                                        <div class="ps-md-12 bg-primary-light rounded">
                                                            <div class="row">

                                                                <div class="col-12 col-md-6  p-2 bg-primary-light rounded-end border-4 border-end border-primary mb-1 mb-md-0">

                                                                    <p class=" text-dark">  {!! $ability_report->report_1??'' !!}</p>
                                                                </div>
                                                                <div class="col-12 col-md-6  p-3 bg-primary-light mb-1 mb-md-0">

                                                                    <p class=" text-dark"> {!! $ability_report->report_2??'' !!}</p>
                                                                </div>
                                                                <div class="col-12 col-md-6  p-3 bg-primary-light mb-1 mb-md-0">

                                                                    <p class=" text-dark">  {!! $ability_report->report_3??'' !!}</p>
                                                                </div>
                                                                <div class="col-12 col-md-6  p-3 bg-primary-light mb-1 mb-md-0">

                                                                    <p class=" text-dark">  {!! $ability_report->report_4??'' !!}</p>
                                                                </div>
                                                                <div class="col-12 col-md-6  p-3 bg-primary-light mb-1 mb-md-0">

                                                                    <p class=" text-dark">  {!! $ability_report->report_5??'' !!}</p>
                                                                </div>
                                                                <div class="col-12 col-md-6  p-3 bg-primary-light mb-1 mb-md-0">

                                                                    <p class=" text-dark">  {!! $ability_report->report_6??'' !!}</p>
                                                                </div>

                                                                <div class="col-12 col-md-6  p-3 bg-primary-light mb-1 mb-md-0">

                                                                    <p class=" text-dark"></p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            @push('scripts')
                                <script>
                                    const abilityCtx{{$ability_report->ability->id}} = document.getElementById('{{$ability_report->ability->ability_name}}').getContext('2d');

                                    new Chart(abilityCtx{{$ability_report->ability->id}}, {
                                        type: 'bar',
                                        data: {
                                            labels: ['{{$ability_report->ability->ability_name}}'],
                                            datasets: [{
                                                label: 'Sten Score',
                                                data: [{{$ability_report->ability_sten_score}}],
                                                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                                                borderColor: 'rgba(255, 99, 132, 1)',
                                                barThickness: 50, // Set the width of the bars here (in pixels)
                                                borderWidth: 1,
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true,
                                                    max: 10 // Set the maximum value of the y-axis to 10
                                                }
                                            }
                                        }
                                    });
                                </script>
                            @endpush
                        @endforeach
                    </div>

                </div>
                <img src="{{$postfix_image1->option_value}}" alt="Ability" class="h-xxl-auto img-fluid">
            </div>
        </div>

    </div>

    <script>
        // Variable to track if the code has been executed
        let executed = false;
        document.addEventListener('livewire:load', function () {
            // Use setTimeout to delay execution by 5 seconds
            setTimeout(() => {
                // Check if the code has been executed
                if (!executed) {
                    Livewire.emit('updateScores');
                    executed = true; // Set executed to true to prevent further execution
                }
            }, 1000); // Delay of 2 seconds

            Livewire.on('updateChart', (sectionScores) => {
                const ctx = document.getElementById('examChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: Object.keys(sectionScores),
                        datasets: [{
                            label: 'Sten Score',
                            data: Object.values(sectionScores),
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 10 // Set the maximum value of the y-axis to 10
                            }
                        }
                    }
                });
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            var mywindow = window.open();
            mywindow.document.write('<html><head>');
            mywindow.document.write('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.css">')
            mywindow.document.write("<link href=\"https://testengineayc.iqwing.in/css/style.css\" rel=\"stylesheet\"><link href=\"https://hptu.iqwing.in/public/css/webpixelcss.css\" rel=\"stylesheet\">")
            mywindow.document.write('<style>td { overflow-wrap: break-word; }</style>');
            mywindow.document.write('</head><body >');

            mywindow.document.body.innerHTML = printContents;
            mywindow.document.write('</body></html>');
            // window.print();
            mywindow.document.close(); // necessary for IE >= 10
            focus(); // necessary for IE >= 10*/
            setTimeout(function () {
                mywindow.window.print();
                mywindow.window.close();
            }, 1000)

            //   document.body.innerHTML = originalContents;

        }
    </script>
    <script>
        function printWindow() {
            window.print();
        }
    </script>

</div>



