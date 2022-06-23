<?php

namespace App\Http\Controllers;

use App\Models\Comparison;
use App\Http\Requests\StoreComparisonRequest;
use App\Http\Requests\UpdateComparisonRequest;

class ComparisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Comparison::class);
        $comparison = new Comparison;
        return view('',compact('comparison'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreComparisonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComparisonRequest $request)
    {
        $this->authorize('create',Comparison::class);
        $comparison = Comparison::create($request->all());
        return redirect()->route('');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comparison  $comparison
     * @return \Illuminate\Http\Response
     */
    public function show(Comparison $comparison)
    {
        $this->authorize('show',$comparison);
        return view('',compact('comparison'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comparison  $comparison
     * @return \Illuminate\Http\Response
     */
    public function edit(Comparison $comparison)
    {
        $this->authorize('update',$comparison);
        return view('',compact('comparison'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComparisonRequest  $request
     * @param  \App\Models\Comparison  $comparison
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComparisonRequest $request, Comparison $comparison)
    {
        $this->authorize('update',$comparison);
        $comparison->update($request->all());
        return redirect()->route('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comparison  $comparison
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comparison $comparison)
    {
        $this->authorize('delete',$comparison);
        $comparison->delete();
        return redirect()->route('');
    }
}
