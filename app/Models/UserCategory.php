<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserCategory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name'];

    public function savings(): HasMany
    {
        return $this->hasMany(UserSaving::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, '');
    }

    


}
