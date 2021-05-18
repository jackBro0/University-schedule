<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
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
        $teachers = Teacher::query()->with('subjects')->get();
        $subjects=Subject::query()->get();
        return view('teachers.index', compact('subjects', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject=Subject::query()->get();

//        dd($request);

        $request->validate(
            [
                'name'=>'required',
                'surname'=>'required',
                'subject'=>'required',
            ]
        );
        $teacher = Teacher::create([
                'name'=>$request->name,
                'surname'=>$request->surname,
                'subject_id'=>$request->subject
        ]);

        return redirect()->route('teacher.create')->with('success', 'Successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::query()->findOrFail($id);
        $subjects=Subject::query()->get();
        return view('teachers.edit', compact( 'teacher','subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::query()->findOrFail($id);

        $teacher->update([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'subject_id'=>$request->subject
        ]);

        return redirect()->route('teacher.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
