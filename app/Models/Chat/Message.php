<?php

namespace App\Models\Chat;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['body', 'user_id'];
    protected $appends = ['owner'];
    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i',
    ];


    public function getOwnerAttribute()
    {
        return $this->user_id == auth()->user()->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
