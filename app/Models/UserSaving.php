<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSaving extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function usercategory(): BelongsTo
    {
        return $this->belongsTo(UserCategory::class);
    }

}
