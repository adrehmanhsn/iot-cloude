<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Device extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'device_type',
        'device_identifier'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Sensor(): HasMany
    {
        return $this->hasMany(Sensor::class);
    }

}
