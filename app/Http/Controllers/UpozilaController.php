<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Upozila;
use Illuminate\Http\Request;

class UpozilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upozilas = Upozila::with(['district','division'])->paginate(20);
        return view('upozila.index', compact('upozilas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::pluck('name', 'id');
        $districts = District::pluck('name', 'id');
        return view('upozila.create')->with(compact('divisions'))->with(compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'district_id' => 'required',
            'division_id' => 'required',
        ]);

        $upozila = new Upozila();
        $upozila->name = $request->name;
        $upozila->district_id = $request->district_id;
        $upozila->division_id = $request->division_id;
        $upozila->save();

        return redirect()->route('upozila.index')->with('success', 'Upozila created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Upozila  $upozila
     * @return \Illuminate\Http\Response
     */
    public function show(Upozila $upozila)
    {
        return view('upozila.show', compact('upozila'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Upozila  $upozila
     * @return \Illuminate\Http\Response
     */
    public function edit(Upozila $upozila)
    {
        $divisions = Division::pluck('name', 'id');
        $districts = District::pluck('name','id');
        return view('upozila.edit',compact('upozila'))->with(compact('divisions'))->with(compact('districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Upozila  $upozila
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upozila $upozila)
    {
        $request->validate([
            'name' => 'required',
            'district_id' => 'required',
            'division_id' => 'required',
        ]);

        $upozila->name = $request->name;
        $upozila->district_id = $request->district_id;
        $upozila->division_id = $request->division_id;
        $upozila->save();

        return redirect()->route('upozila.index')->with('success', 'Upozila updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upozila  $upozila
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upozila $upozila)
    {
        $upozila->delete();

        return redirect()->route('upozila.index')->with('success', 'Upozila deleted successfully');
    }
}
