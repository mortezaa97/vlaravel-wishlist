<?php

declare(strict_types=1);

namespace Mortezaa97\Wishlist\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mortezaa97\Stories\Models\Story;

class Wishlist extends Model
{
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected $appends = [];

    protected $with = ['story'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderByDesc('created_at');
        });
    }

    /*
     * Attributes
     */

    /*
     * Relations
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'update_by');
    }

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class, 'story_id');
    }
}
