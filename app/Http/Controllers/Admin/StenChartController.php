<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StenChart;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StenChartController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sten_chart_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sten-chart.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sten_chart_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sten-chart.create');
    }

    public function edit(StenChart $stenChart)
    {
        abort_if(Gate::denies('sten_chart_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sten-chart.edit', compact('stenChart'));
    }

    public function show(StenChart $stenChart)
    {
        abort_if(Gate::denies('sten_chart_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stenChart->load('relatedTestName', 'relatedAbilityName', 'relatedClass');

        return view('admin.sten-chart.show', compact('stenChart'));
    }
}
