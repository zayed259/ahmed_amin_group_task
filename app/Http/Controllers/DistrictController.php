<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::with('division')->paginate(10);
        return view('district.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::pluck('name', 'id');
        return view('district.create')->with('divisions', $divisions);
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
            'division_id' => 'required',
        ]);

        $district = new District();
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();

        return redirect()->route('district.index')->with('success', 'District created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        return view('district.show', compact('district'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        $divisions = Division::pluck('name', 'id');
        return view('district.edit', compact('district'))->with('divisions', $divisions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        $request->validate([
            'name' => 'required',
            'division_id' => 'required',
        ]);

        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();

        return redirect()->route('district.index')->with('success', 'District updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        $district->delete();

        return redirect()->route('district.index')->with('success', 'District deleted successfully.');
    }
}
