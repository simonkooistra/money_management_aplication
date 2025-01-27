<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserSaving extends Model
{
    use HasFactory;

//    public int $category_id;
//    //public string $name;
//    public string $description;
//    public int $total_amount;

    public $fillable = ['category_id', 'name', 'description', 'total_amount'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function user_Category(): BelongsTo
    {
        return $this->belongsTo(UserCategory::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'saving_id');
    }

}
