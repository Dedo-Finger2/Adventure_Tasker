<?php

namespace App\Models;

use App\Models\Difficulty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    public function difficulty()
    {
        return $this->belongsTo(Difficulty::class);
    }
}
