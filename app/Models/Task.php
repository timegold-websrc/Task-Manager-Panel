<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'head', 'description', 'status', 'date_due', 'site_id', 'priority',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_task', 'task_id', 'user_id');
    }

    // public function site()
    // {
    //     return $this->belongsTo(Site::class);
    // }
}
