<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Auth;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'Student Registered',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\User',
            'group_by_field'        => 'email_verified_at',
            'group_by_period'       => 'month',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'year',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'w-full',
            'entries_number'        => '5',
            'translation_key'       => 'user',
        ];

        $chart1 = new LaravelChart($settings1);

        if (Auth::user()->is_admin == true) {
            return view('admin.home', compact('chart1'));
        }elseif(Auth::user()->is_school == 1){
            return view('admin.home', compact('chart1'));
        }
        else{
            return view('frontend.student-examlist');
        }


    }

    public function home()
    {
        return view('frontend.webhome');
    }
    public function testScreen()
    {
        return view('frontend.testscreen');
    }
    public function examList()
    {
        return view('frontend.student-examlist');
    }

    public function studentReport()
    {
        return view('frontend.student-report');
    }

    public function studentExamlist()
    {
        return view('frontend.student-testtaken-list');
    }

    public function studentList()
    {
        return view('admin.user.studentlist');
    }

    public function studentDetail()
    {
        return view('frontend.student-details');
    }

}
