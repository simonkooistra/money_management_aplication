<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSaving extends Model
{
    use HasFactory;

//    public int category_id
//    public string $name;
//    public string $description;
//    public int $total_amount;


    public static function create(array $array)
    {
    }

    public static function get(array $array)
    {
    }

    public function UserCategory(): BelongsTo
    {
        return $this->belongsTo(UserCategory::class);
    }

}
