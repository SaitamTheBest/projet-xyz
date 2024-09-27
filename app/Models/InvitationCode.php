<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvitationCode extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'user_id', 'is_used'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}