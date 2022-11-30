<?php

namespace Vinelab\NeoEloquent\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class User extends Model
{
    protected $table = 'Individual';
    protected $fillable = ['name', 'alias', 'logins', 'points', 'email', 'uuid', 'calls', 'dob'];
    protected $primaryKey = 'name';
    public $incrementing = false;

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function profile(): HasOne
    {
        return $this->hasOne(\Vinelab\NeoEloquent\Tests\Fixtures\Profile::class);
    }

    public function facebookAccount(): HasOne
    {
        return $this->hasOne(\Vinelab\NeoEloquent\Tests\Fixtures\FacebookAccount::class);
    }

    public function posts(): MorphToMany
    {
        return $this->morphToMany(\Vinelab\NeoEloquent\Tests\Fixtures\Post::class, 'postable');
    }

    public function videos(): MorphToMany
    {
        return $this->morphToMany(\Vinelab\NeoEloquent\Tests\Fixtures\Video::class, 'videoable');
    }

    public function account(): HasOne
    {
        return $this->hasOne(Account::class);
    }

    public function colleagues(): HasMany
    {
        return $this->hasMany(\Vinelab\NeoEloquent\Tests\Functional\User::class);
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}