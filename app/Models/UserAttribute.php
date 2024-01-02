<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAttribute extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'current_level',
        'max_level',
        'current_exp',
        'exp_next_level',
        'current_money',
        'rebirth_level',
        'max_bag_slots',
        'max_powerups_at_time',
        'max_powerups_a_day',
        'overdue_debuff_value',
        'sub_task_debuff_value',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
