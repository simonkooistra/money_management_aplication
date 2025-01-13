<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['name','min_amount','plus_amount'];

    public int $user_id;
    public int $saving_id;

    public string $name;
    public int $min_amount;
    public int $plus_amount;


    public function user(): HasMany
    {
        return $this->HasMany(User::class);
    }

}
