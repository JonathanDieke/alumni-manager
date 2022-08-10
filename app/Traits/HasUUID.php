<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait HasUUID{
    
    public static function bootHasUUId(){
        static::saving(function($model){
            $model->id = (string) Str::uuid() ;
        });
    }
}
