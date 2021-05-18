<?php

namespace App\Http\Controllers;

use App\Models\Auditory;
use App\Models\Group;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $time_tables = TimeTable::query()->with('groups', 'schedules')->get();
//        dd($time_tables);
        return view('pages.index', compact('time_tables'));
    }
}
