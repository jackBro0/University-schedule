<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function timeTables()
    {
        return $this->hasOne(TimeTable::class, 'id', 'time_table_id');
    }

    public function teachers_first()
    {
        return $this->hasOne(Teacher::class, 'id', 'teacher_first');
    }

    public function rooms_first()
    {
        return $this->hasOne(Auditory::class, 'id', 'room_first');
    }

    public function teachers_second()
    {
        return $this->hasOne(Teacher::class, 'id', 'teacher_second');
    }

    public function rooms_second()
    {
        return $this->hasOne(Auditory::class, 'id', 'room_second');
    }

    public function teachers_third()
    {
        return $this->hasOne(Teacher::class, 'id', 'teacher_third');
    }

    public function rooms_third()
    {
        return $this->hasOne(Auditory::class, 'id', 'room_third');
    }

    public function teachers_fourth()
    {
        return $this->hasOne(Teacher::class, 'id', 'teacher_fourth');
    }

    public function rooms_fourth()
    {
        return $this->hasOne(Auditory::class, 'id', 'room_fourth');
    }

    public function teachers_fifth()
    {
        return $this->hasOne(Teacher::class, 'id', 'teacher_fifth');
    }

    public function rooms_fifth()
    {
        return $this->hasOne(Auditory::class, 'id', 'room_fifth');
    }
}
