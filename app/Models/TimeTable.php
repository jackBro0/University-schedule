<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function groups()
    {
        return $this->hasOne(Group::class, 'id', 'group_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'time_table_id', 'id')
            ->with(
                'teachers_first',
                'rooms_first',
                'teachers_second',
                'rooms_second',
                'teachers_third',
                'rooms_third',
                'teachers_fourth',
                'rooms_fourth',
                'teachers_fifth',
                'rooms_fifth',
            );
    }
}
