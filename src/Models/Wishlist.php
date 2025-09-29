<?php

declare(strict_types=1);

namespace Mortezaa97\Wishlist\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Mortezaa97\Stories\Models\Story;

class Wishlist extends Model
{
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected $appends = [];

    protected $with = ['model'];

    protected static function boot()
    {
        parent::boot();
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
    public function model(): MorphTo
    {
        return $this->morphTo('model');
    }
}
