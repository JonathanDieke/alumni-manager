<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait HasUUID{

    public static function bootHasUUId(){
        static::saving(function($model){
            if(!Str::contains($model->id, "-") && empty($model->id)){
                $model->id = (string) Str::uuid() ;
            }
        });
    }
}
