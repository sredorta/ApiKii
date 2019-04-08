<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuration;

//The configuration contains all programable parts of the Kii Interface
//This configuration can only be modified through phpmyadmin with carefull
class ConfigurationController extends Controller
{
    public function get(Request $request) {
        return response()->json(Configuration::all(),200);
    }

}
