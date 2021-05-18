<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;
    protected $table = 'groups';
    protected $guarded = [];

    public function schedules()
    {
        return $this->belongsTo(Schedule::class, 'group_id', 'id');
    }
}
