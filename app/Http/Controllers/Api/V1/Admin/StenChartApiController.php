<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStenChartRequest;
use App\Http\Requests\UpdateStenChartRequest;
use App\Http\Resources\Admin\StenChartResource;
use App\Models\StenChart;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StenChartApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sten_chart_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StenChartResource(StenChart::with(['relatedTestName', 'relatedAbilityName', 'relatedClass'])->get());
    }

    public function store(StoreStenChartRequest $request)
    {
        $stenChart = StenChart::create($request->validated());

        return (new StenChartResource($stenChart))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StenChart $stenChart)
    {
        abort_if(Gate::denies('sten_chart_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StenChartResource($stenChart->load(['relatedTestName', 'relatedAbilityName', 'relatedClass']));
    }

    public function update(UpdateStenChartRequest $request, StenChart $stenChart)
    {
        $stenChart->update($request->validated());

        return (new StenChartResource($stenChart))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StenChart $stenChart)
    {
        abort_if(Gate::denies('sten_chart_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stenChart->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
