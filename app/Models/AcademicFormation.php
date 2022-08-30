<?php

namespace App\Models;

use App\Enums\FormationLevel;
use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class AcademicFormation extends Model
{
    use HasFactory, HasUUID, SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'level' => FormationLevel::class,
    ];

    public function getLevel(){
        return strlen($this->level) > 3 ? "Bac +" . $this->level[-1] : "Baccalauréat";
        // return Str::contains($this->level, ['1', '2', "3", '4', '5', '6', '7', '8',]) ? "Bac +" . $this->level[-1] : "Baccalauréat";
    }

    /**
     * Get the user that owns the AcademicFormation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
