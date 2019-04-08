<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key','value'
    ];

    static function getSignUpValidators() {
        $result = [];
        foreach (Configuration::all() as $conf) {
            if (strpos($conf->key,"signup_first_name") !== false ) {
                if ($conf->value == "required") {
                    $validator = "required";
                } else {
                    $validator = "nullable";
                }
                $result["firstName"] = $validator . "|min:2";
            }
            if (strpos($conf->key,"signup_last_name") !== false ) {
                if ($conf->value == "required") {
                    $validator = "required";
                } else {
                    $validator = "nullable";
                }
                $result["lastName"] = $validator . "|min:2";
            }
            if (strpos($conf->key,"signup_email") !== false ) {
                if ($conf->value == "required") {
                    $validator = "required";
                } else {
                    $validator = "nullable";
                }
                $result["email"] = $validator . "|email|unique:users";
            }
            if (strpos($conf->key,"signup_mobile") !== false ) {
                if ($conf->value == "required") {
                    $validator = "required";
                } else {
                    $validator = "nullable";
                }
                $result["mobile"] = $validator . "|min:10|max:10|unique:users";   //TODO: Only numbers here
            }
            if (strpos($conf->key,"signup_phone") !== false ) {
                if ($conf->value == "required") {
                    $validator = "required";
                } else {
                    $validator = "nullable";
                }
                $result["phone"] = $validator . "|min:10|max:10|unique:users";   //TODO: Only numbers here
            }
        }
        //Add password as is mandatory
        $result["password"] = "required|min:4"; //TODO add validation 
        return $result;
    }
}
