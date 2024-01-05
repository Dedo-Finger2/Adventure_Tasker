<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'cover_image',
        'cost',
        'benefit',
        'user_id',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userItems()
    {
        return $this->belongsToMany(User::class, 'user_items');
    }

}
