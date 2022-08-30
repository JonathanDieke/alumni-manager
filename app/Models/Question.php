<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory, HasUUID, SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    public function getStatus(){
        return $this->status == "open" ? "Ouvert" : ($this->status == "resolved" ? "Résolu" : "Fermé") ;
    }

    public function getStatusColor(){
        return $this->status == "open" ? "amber" : ($this->status == "resolved" ? "green" : "rose") ;
    }

    public function getKeywords(){
        $keywords = explode(",", $this->keywords) ;
        foreach($keywords as $keyword){
            $result[]  = trim($keyword);
        }
        return $result ;
    }

    /**
     * Get the user that owns the Offer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the answers for the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
