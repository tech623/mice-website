<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoOptimization;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SeoOptimizationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('seo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seo_opt = SeoOptimization::select('seo_optimizations.*', 'services.service_name')
        ->leftjoin('services', 'services.id', '=', 'seo_optimizations.page_id')->orderBy('id','desc')->get();
        return view('admin.seo-optimization.index', compact('seo_opt'));
    }

    public function create()
    {
        abort_if(Gate::denies('seo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Services::get();
        return view('admin.seo-optimization.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_id' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required'
        ]);

        $seodata = SeoOptimization::where('page_id', $request->page_id)->value('id');
        if (!$seodata) 
        {
            $submit = $request->all();
            $save = SeoOptimization::create($submit);
            return back()->with('success', 'SEO Metas submitted successfully.');
        }
        else
        {
            return back()->with('error', 'SEO Metas already exists !!');
        }
    }

    public function edit(SeoOptimization $seoOptimization)
    {
        abort_if(Gate::denies('seo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Services::get();
        return view('admin.seo-optimization.edit', compact('seoOptimization','services'));
    }

    public function update(Request $request, SeoOptimization $seoOptimization)
    {
        $request->validate([
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required'
        ]);

        $seoOptimization->fill($request->post())->save();
        return redirect()->route('panel.seo-optimization.index')->with('success','SEO Has Been updated successfully.');
    }
}
