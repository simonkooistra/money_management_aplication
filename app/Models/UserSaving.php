<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserSaving extends Model
{
    use HasFactory;


    public $fillable = ['name', 'description', 'total_amount'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function user_category(): BelongsTo
    {
        return $this->belongsTo(UserCategory::class, 'user_id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'saving_id');
    }

}
