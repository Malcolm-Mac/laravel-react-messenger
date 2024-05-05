<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'owner_id',
        'last_message_id'
    ];

    /**
     * The users that belong to the group.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the messages for the group.
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class,'last_message_id');
    }

    /**
     * The owner that belong to the group.
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class,'owner_id');
    }
}
