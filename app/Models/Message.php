<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message',
        'sender_id',
        'group_id',
        'receiver_id'
    ];

    /**
     * Get the sender that owns the message.
     */
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class,'sender_id');
    }

    /**
     * Get the receiver that owns the message.
     */
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class,'receiver_id');
    }

    /**
     * Get the group that owns the message.
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Get attachements for the message.
     */
    public function attachements(): HasMany
    {
        return $this->hasMany(MessageAttachement::class);
    }

    /**
     * Get the conversation that owns the message.
     */
    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }
}
