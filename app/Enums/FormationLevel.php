<?php
namespace App\Enums ;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Str;

class FormationLevel implements CastsAttributes {
    // public static $bac = "Baccalauréat";
    // public static $bac1 = "Bac +1";
    // public static $bac2 = "Bac +2";
    // public static $bac3 = "Bac +3";
    // public static $bac4 = "Bac +4";
    // public static $bac5 = "Bac +5";
    // public static $bac6 = "Bac +6";
    // public static $bac7 = "Bac +7";
    // public static $bac8 = "Bac +8";

	/**
	 * Transform the attribute from the underlying model values.
	 *
	 * @param \Illuminate\Database\Eloquent\Model $model
	 * @param string $key
	 * @param mixed $value
	 * @param array $attributes
	 *
	 * @return mixed
	 */
	function get($model, string $key, $value, array $attributes) {
        $attributes["level"] = Str::contains($attributes["level"], ['1', '2', "3", '4', '5', '6', '7', '8',]) ? "Bac +" . $attributes["level"][-1] : "Baccalauréat";
        return $attributes["level"];
        // $attributes["start_year"] = explode("-", $attributes["start_year"])[0];
        // $attributes["end_year"] = explode("-", $attributes["end_year"])[0];
        // dd($attributes);
	}

	/**
	 * Transform the attribute to its underlying model values.
	 *
	 * @param \Illuminate\Database\Eloquent\Model $model
	 * @param string $key
	 * @param mixed $value
	 * @param array $attributes
	 *
	 * @return mixed
	 */
	function set($model, string $key, $value, array $attributes) {
        return $value ;
    }
}
