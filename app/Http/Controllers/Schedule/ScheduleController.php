<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Auditory;
use App\Models\Group;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TimeTable;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $schedules = Schedule::query()->get();
        $teachers = Teacher::query()->with('subjects')->get();
        $subjects = Subject::query()->get();
        $auditories = Auditory::query()->get();
        $groups = Group::query()->get();
        $days = ["Dushanba", "Seshanba", "Chorshanba", "Payshanba", "Juma"];
        return view('pages.index', compact('subjects', 'teachers', 'auditories', 'groups', 'days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::query()->with('subjects')->get();
        $subjects = Subject::query()->get();
        $auditories = Auditory::query()->get();
        $groups = Group::query()->get();
        $days = ["Dushanba", "Seshanba", "Chorshanba", "Payshanba", "Juma"];
        return view('schedule.create', compact('subjects', 'teachers', 'auditories', 'groups', 'days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'group_id' => 'required'
            ]
        );
        $timeTable = TimeTable::query()->create(
            [
                'group_id' => $request->group_id
            ]
        );
        foreach ($request->days as $key => $day) {
            $item = new Schedule;
            $item->time_table_id = $timeTable->id;
            $item->day = $key;

            $item->teacher_first = $day['1']['teacher'];
            $item->room_first = $day["1"]['auditory'];

            $item->teacher_second = $day["2"]['teacher'];
            $item->room_second = $day["2"]['auditory'];

            $item->teacher_third = $day["3"]['teacher'];
            $item->room_third = $day["3"]['auditory'];

            $item->teacher_fourth = $day["4"]['teacher'];
            $item->room_fourth = $day["4"]['auditory'];

            $item->teacher_fifth = $day["5"]['teacher'];
            $item->room_fifth = $day["5"]['auditory'];

            $item->save();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
