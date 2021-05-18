<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;
    protected $table = 'teachers';
    protected $guarded = [];

    public function subjects()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }
}
