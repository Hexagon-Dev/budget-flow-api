<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int id
 * @property string name
 * @property string email
 * @property string password
 * @property string created_at
 * @property string updated_at
 * @property Collection<Budget> budgets
 * @property Collection<Operation> operations
 */
class User extends AuthUser
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];
    public $hidden = ['password'];

    /**
     * Returns all the budgets associated with this user
     */
    public function budgets(): BelongsToMany
    {
        return $this->belongsToMany(Budget::class);
    }

    /**
     * Returns all the operations created by this user
     */
    public function operations(): HasMany
    {
        return $this->hasMany(Operation::class);
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value,
            set: fn (string $value) => bcrypt($value),
        );
    }
}
