<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'group_img','description','total_amount'];

    public string $name;
    public string $group_img;
    public string $description;

    public int $total_amount;

    public function users(): HasMany
    {
        return $this->HasMany(User::class);
    }

    public  function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
