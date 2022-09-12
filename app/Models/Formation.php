<?php

namespace App\Models;

use App\Enums\FormationLevel;
use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Formation extends Model
{
    use HasFactory, HasUUID;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        // 'level' => FormationLevel::class,
    ];

    public function getLevel(){
        return strlen($this->level) > 3 ? "Bac +" . $this->level[-1] : "Baccalauréat";
        // return Str::contains($this->level, ['1', '2', "3", '4', '5', '6', '7', '8',]) ? "Bac +" . $this->level[-1] : "Baccalauréat";
    }

    public function getDuration(){
        return Carbon::createFromFormat('Y-m-d H:m:s', $this->end_date)->longAbsoluteDiffForHumans(Carbon::createFromFormat('Y-m-d H:m:s', $this->start_date));
    }

    /**
     * Get the user that owns the Formation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
