<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Source\CreateRequest;
use App\Http\Requests\Source\EditRequest;
use App\Models\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.sources.index', [
            'sourceList' => Source::paginate(5)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
        public function store(CreateRequest $request)
    {
        $source = Source::create($request->validated());
        if($source){
            return redirect()->route('admin.sources.index')
                ->with('success', __('messages.admin.sources.create.success'));
        }
        return back()->with('error', __('messages.admin.sources.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param Source $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Source $source)
    {
        return view('admin.sources.edit', [
            'source'=>$source
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Source $source
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, Source $source)
    {
        $status = $source->fill($request->validated())->save();

        if($status){
            return redirect()->route('admin.sources.index')
                ->with('success', __('messages.admin.sources.edit.success'));
        }
        return back()->with('error', __('messages.admin.sources.edit.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Source $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        //
    }
}
