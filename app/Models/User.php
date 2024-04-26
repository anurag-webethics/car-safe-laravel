<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'hobbies' => 'json'
        ];
    }

    protected function Name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => explode(' ', $value),
        );
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    protected function Hobbies(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => (!empty($value)) ? implode(',', json_decode($value, true)) : null,
        );
    }

    public function permission()
    {
        return $this->belongsToMany(permission::class, 'permission_user');
    }

    public function role(): BelongsTo {
        return $this->belongsTo(Role::class);
    }
}
