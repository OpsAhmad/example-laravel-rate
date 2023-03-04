<?php

use App\Http\Controllers\RateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get("/get-rate", [RateController::class, "get"]);
