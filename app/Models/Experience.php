<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Experience extends Model
{
    use HasFactory, HasUUID;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    public function getDuration(){
        return Carbon::createFromFormat('Y-m-d H:m:s', $this->end_date)->longAbsoluteDiffForHumans(Carbon::createFromFormat('Y-m-d H:m:s', $this->start_date));
    }

    /**
     * Get the user that owns the experience
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'alumnus_id');
    }
}
