<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'amount'];


    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function userSaving(): BelongsTo
    {
        return $this->belongsTo(UserSaving::class, 'saving_id');
    }
}
