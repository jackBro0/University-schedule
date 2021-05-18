<?php

namespace App\Http\Controllers\Auditory;

use App\Http\Controllers\Controller;
use App\Models\Auditory;
use Illuminate\Http\Request;

class AuditoryController extends Controller
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
        $auditories=Auditory::query()->get();
        return view('auditory.create', compact('auditories'));
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
            'auditory'=>'required'
        ]);

        $auditory = Auditory::create([
            'number'=>$request->auditory
        ]);

        return redirect()->route('auditory.create');
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
        $auditories=Auditory::query()->findOrFail($id);
        return view('auditory.edit', compact('auditories'));
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
        $auditories=Auditory::query()->findOrFail($id);
        $request->validate([
            'auditory'=>'required'
        ]);

        $auditories->update([
            'number'=>$request->auditory
        ]);

        return redirect()->route('auditory.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auditory=Auditory::query()->findOrFail($id);

        $auditory->delete();
        return redirect()->route('auditory.create');
    }
}
