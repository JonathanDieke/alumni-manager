<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
// use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUUID;


    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'birthdate' => 'date',
        // 'created_at' => 'date',
    ];

    public function getPromotion(){
        return strtoupper(substr($this->promotion, 0, 2)) . ' ' . $this->promotion[-1] ;
    }

    /**
     * Get the user's birthdate.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function birthdate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::createFromFormat('Y-m-d H:m:s', $value)->isoFormat('LL'),
        );
    }

    /**
     * Get the user's gender.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function gender(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value == "male" ? "Masculin" : "Féminin",
        );
    }

    /**
     * Get all of the academic formations for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function academicFormations(): HasMany
    {
        return $this->hasMany(AcademicFormation::class);
    }

    /**
     * Get all of the experiences for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    /**
     * Get all of the offers for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    /**
     * Get all of the questions for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get all of the asnwers for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asnwers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
