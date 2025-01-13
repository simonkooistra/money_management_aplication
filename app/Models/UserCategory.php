<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserCategory extends Model
{
    use HasFactory;

    public int $user_id;
    public string $name;

    protected $fillable = ['user_id', 'name'];

    public function usersaving(): HasMany
    {
        return $this->hasMany(UserSaving::class);
    }
}
