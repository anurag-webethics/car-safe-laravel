<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Permission;

class Role extends Model
{
    use HasFactory;
    public $table = 'role';

    public function permission(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'permission_user');
    }
}
