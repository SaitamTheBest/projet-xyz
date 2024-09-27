<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitationCode extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'user_id', 'is_used'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}