<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\District;
use App\Models\Division;
use App\Models\Education;
use App\Models\Upozila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::with('division', 'district', 'upozila')->paginate(10);
        return view('applicant.index', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::pluck('name', 'id');
        $districts = [];
        $upozilas = [];
        return view('applicant.create')->with(compact('divisions', 'districts', 'upozilas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'division_id' => 'required',
        //     'district_id' => 'required',
        //     'upozila_id' => 'required',
        //     'address' => 'required',
        //     'language' => 'required',
        //     'exam' => 'required',
        //     'university' => 'required',
        //     'board' => 'required',
        //     'gpa' => 'required',
        //     'photo' => 'required',
        //     'cv' => 'required',
        //     'training' => 'required',
        // ]);

        // image
        // $path = $request->file('photo')->store('public/applicants');
        // $storagepath = Storage::path($path);
        // $img = Image::make($storagepath);

        // resize image instance
        // $img->resize(400, 400);

        // insert a watermark
        // $img->insert('public/watermark.png');

        // save image in desired format
        // $img->save($storagepath);

        // cv
        // $cvpath = $request->file('cv')->store('public/applicants');
        // $storecvpath = Storage::path($cvpath);
        // $cv = Image::make($storecvpath);
        // $cv->save($storecvpath);


        // $applicant = new Applicant([
        //     'name' => $request->get('name'),
        //     'email' => $request->get('email'),
        //     'division_id' => $request->get('division_id'),
        //     'district_id' => $request->get('district_id'),
        //     'upozila_id' => $request->get('upozila_id'),
        //     'address' => $request->get('address'),
        //     'language' => $request->get('language'),
        //     'exam' => $request->get('exam'),
        //     'university' => $request->get('university'),
        //     'board' => $request->get('board'),
        //     'gpa' => $request->get('gpa'),
        //     'photo' => $path,
        //     'cv' => $cvpath,
        //     'training' => $request->get('training'),
        // ]);
        // $applicant->save();
        // return redirect('/applicant/create')->with('success', 'Applicanttion submitted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }

    public function getDistricts($id)
    {
        $districts = District::where('division_id', $id)->pluck('name', 'id');
        return json_encode($districts);
    }

    public function getUpozilas($id)
    {
        $upozilas = Upozila::where('district_id', $id)->pluck('name', 'id');
        return json_encode($upozilas);
    }

    public function education(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'upozila_id' => 'required',
            'address' => 'required',
            'language' => 'required',
            'exam' => 'required',
            'university' => 'required',
            'board' => 'required',
            'gpa' => 'required',
            // 'photo' => 'required',
            // 'cv' => 'required',
            'training' => 'required',
        ]);

        // image
        // $path = $request->file('photo')->store('public/applicants');
        // $storagepath = Storage::path($path);
        // $img = Image::make($storagepath);

        // resize image instance
        // $img->resize(400, 400);

        // $img->save($storagepath);

        // cv
        // $cvpath = $request->file('cv')->store('public/applicants');
        // $storecvpath = Storage::path($cvpath);
        // $cv = Image::make($storecvpath);
        // $cv->save($storecvpath);

        $applicant = new Applicant();
        $applicant->name = $request->name;
        $applicant->email = $request->email;
        $applicant->division_id = $request->division;
        $applicant->district_id = $request->district;
        $applicant->upozila_id = $request->upozila;
        $applicant->address = $request->address;
        $applicant->language = $request->language;
        // $applicant->photo = $path;
        // $applicant->cv = $cvpath;
        $applicant->training = $request->training;
        $applicant->save();
        if ($applicant->save()) {
            return response()->json(['success' => 'Applicanttion submitted successfully!']);
        } else {
            return response()->json(['error' => 'Something went wrong!']);
        }
        $applicant_id = $applicant->id;

        $exam = $request->exam;
        $university = $request->university;
        $board = $request->board;
        $gpa = $request->gpa;

        foreach($exam as $key => $value){
            $edata = new Education([
                'applicant_id' => $applicant_id,
                'exam' => $exam[$key],
                'university' => $university[$key],
                'board' => $board[$key],
                'gpa' => $gpa[$key],
            ]);
            Education::create($edata);
        }

        return response()->json(['success' => 'Applicanttion submitted successfully!']);

    }

}
