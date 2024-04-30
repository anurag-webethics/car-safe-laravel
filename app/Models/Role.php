<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\permission;

class Role extends Model
{
    use HasFactory;
    public $table = 'role';

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(permission::class, 'permission_user');
    }
}
