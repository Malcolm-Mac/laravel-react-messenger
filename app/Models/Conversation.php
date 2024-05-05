<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id1',
        'user_id2',
        'last_message_id'
    ];

    /**
     * Get the messages for the conversation.
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'last_message_id');
    }

    /**
     * The user1 that belong to the conversation.
     */
    public function user1(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id1');
    }

    /**
     * The user2 that belong to the conversation.
     */
    public function user2(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id2');
    }
}
