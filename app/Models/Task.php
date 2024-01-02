<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'exp',
        'money',
        'due_date',
        'overdue',
        'recurring',
        'recurring_type',
        'task_id',
        'user_id',
        'difficulty_id',
        'priority_id',
        'deleted_at',
        'completed_at',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
